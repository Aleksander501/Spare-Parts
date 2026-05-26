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
        $registros = 2;
    }

    if (!$pagina){
        $inicio = 0;
        $pagina = 1;
    }else{
        $inicio = ($pagina-1)*$registros;
    }

    $query = "SELECT * FROM usuarios";

    if(isset($_GET['like'])){
        $valor = $_GET['valor'];
        $dataUsuarios = CRUD("SELECT * FROM usuarios WHERE usuario like '%$valor%' || correo like '%$valor%'","s");
    }
    else{
        $dataUsuarios = CRUD("SELECT * FROM usuarios ORDER BY usuario ASC LIMIT $inicio,$registros","s");
    }

    $num_registros = CountReg($query);
    $paginas = ceil($num_registros/$registros);

    $dataTipo = CRUD("SELECT * FROM tipo_usuario","s");

    $cont = 0;
?>
<script>
    /* Registrar Usuario */
    $(".reg-usuario").click(function(){
        $("#ModalRegUsuario").modal('show');
        return false;
    });

    /* Eliminar Usuario */
    $(".del-usuario").click(function(){
        let idusuario = $(this).attr("id-usuario");

        alertify.confirm('Eliminar Usuario', 'Seguro/a de eliminar usuario...', function(){
            $("#contenido").load("./views/usuarios/del.php?idusuario="+idusuario);
        },function(){
            alertify.error('Proceso cancelado...')
        });
        return false;
    });

    /* Editar Usuario */
    $(".edit-usuario").click(function(){
        let iduser = $(this).attr("id-usuario");

        $("#ModalUpdUsuario").modal('show');
        $("#DataUpdUsuario").load("./views/usuarios/form_update.php?iduser="+iduser);
        return false;
    });

    /* Paginado */
    $(".pagina").click(function(){
        let num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("views/usuarios/principal.php?num="+ num + "&num_reg="+ reg);
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
            $("#contenido").load("views/usuarios/principal.php?num_reg=" + valor);
        }
        return false;
    });

    /* BUscar por nombre o codigo */
    $("#like").on('change',function(){
        let valor;
        valor = $("#like").val();
        if(valor.trim() == ""){
            alertify.alert("Busca usuario","No ingreso el nombre, apellido, usuario o correo de usuario a buscar....");
        }
        else{
            $("#contenido").load("views/usuarios/principal.php?like=1&valor=" + valor);
        }
        return false;
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="background: transparent; border: none;">
            <div class="card-header" style="font-size: 30px;">
                Lista de Usuarios
                <a href="" style="float: right;" class="btn btn-success reg-usuario"><i class="fa-solid fa-plus"></i>  Agregar</a>
            </div>
            <div class="card-body">
                <div class="input-group col-md-6">
                    <input type="text" class="form-control" id="like"  placeholder="Buscar Usuario" autocomplete="off" style="background: #f4f4f4;">                       
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
    include '../../views/modals/registrar_usuario.php';
    include '../../views/modals/actualizar_usuario.php';
?>