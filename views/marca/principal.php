<?php
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    if (isset($_GET['num'])) {
        $pagina = $_GET['num'];
    }else{
        $pagina = 0;
    }

    if (isset($_GET['num_reg'])){
        $registros = $_GET['num_reg'];
    }else{
        $registros = 3;
    }

    if (!$pagina){
        $inicio = 0;
        $pagina = 1;
    }else{
        $inicio = ($pagina-1)*$registros;
    }

    $query = "SELECT * FROM marcas";

    if(isset($_GET['like'])){
        $valor = $_GET['valor'];
        $dataMarca = CRUD("SELECT * FROM marcas WHERE nombre like '%$valor%' ","s");
    }
    else{
        $dataMarca = CRUD("SELECT * FROM marcas ORDER BY nombre ASC LIMIT $inicio,$registros","s");
    }

    $num_registros = CountReg($query);
    $paginas = ceil($num_registros/$registros);
    $cont = 0;
?>
<script>
    /* Registrar categoria */
    $(".reg-marca").click(function(){
        $("#ModalRegMarca").modal('show');
        return false;
    });

    /* Eliminar categoria */
    $(".del-marca").click(function(){
        let idmar = $(this).attr("id-marca");

        alertify.confirm('Eliminar Categoria', 'Seguro/a de eliminar marca...', function(){
            $("#contenido").load("./views/marca/del.php?idmar="+idmar);
        },function(){
            alertify.error('Proceso cancelado...')
        });
        return false;
    });

    /* Editar categoría */
    $(".edit-marca").click(function(){
        let idmar = $(this).attr("id-marca");

        $("#ModalUpdMarca").modal('show');
        $("#DataUpdMarca").load("./views/marca/form_update.php?idmar="+idmar);
        return false;
    });

    /* Paginado */
    $(".pagina").click(function(){
        let num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("views/marca/principal.php?num="+ num + "&num_reg="+ reg);
        return false;
    });

    /* Aumento numero de registros */
    $("#select-reg").click(function(){
        let valor;
        valor = $("#select-reg option:selected").val();
        if(valor == 0){
            alertify.success("<b style='color:black;'>Debe seleccionar un valor de registro a mostrar...</b>");
        }
        else{
            $("#contenido").load("views/marca/principal.php?num_reg=" + valor);
        }
        return false;
    });

    /* BUscar por nombre o codigo */
    $("#like").on('change',function(){
        let valor;
        valor = $("#like").val();
        if(valor.trim() == ""){
            alertify.alert("Busca marca","No ingreso el nombre de la marca a buscar....");
        }
        else{
            $("#contenido").load("views/marca/principal.php?like=1&valor=" + valor);
        }
        return false;
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="background: transparent; border: none;">
            <div class="card-header" style="font-size: 30px;">
                Lista de Marcas
                <a href="" style="float: right;" class="btn btn-success reg-marca"><i class="fa-solid fa-plus"></i>  Agregar</a>
            </div>
            <div class="card-body">
                <div class="input-group col-md-6">
                    <input type="text" class="form-control" id="like"  placeholder="Buscar Marca" autocomplete="off" style="background: #f4f4f4;">                       
                </div>
                <?php include 'tabla.php'; ?>
                <div class="row">
                    <div class="col-md-2">
                        <select id="select-reg" class="custom-select" style="opacity: 0.8;">
                            <option value="0" disabled selected>Cantidad a mostrar</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <?php if($num_registros > $registros): ?>
                            <?php if($pagina == 1): ?>
                                <div style="text-align: end;" >
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"><i style="color: #1E47DE;" class="fa-solid fa-circle-right fa-2x"></i></a>
                                </div>
                            <?php elseif($pagina == $paginas):?>
                                <div style="text-align: end;" >
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"><i style="color: #1E47DE;" class="fa-solid fa-circle-left fa-2x"></i></a>
                                </div>
                            <?php else: ?>
                                <div style="text-align: end;" >
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"><i style="color: #1E47DE;" class="fa-solid fa-circle-left fa-2x"></i></a>
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"><i style="color: #1E47DE;" class="fa-solid fa-circle-right fa-2x"></i></a>
                                </div>
                            <?php endif?>
                        <?php endif ?>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<?php
    include '../../views/modals/registrar_marca.php';
    include '../../views/modals/actualizar_marca.php';
?>
