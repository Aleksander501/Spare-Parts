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

    $query = "SELECT * FROM productos";

    if(isset($_GET['like'])){
        $valor = $_GET['valor'];
        $dataProductos = CRUD("SELECT * FROM productos WHERE codigo like '%$valor%' OR nombre like '%$valor%' ","s");
    }elseif(isset($_GET['like1'])){
       $valor1 = $_GET['valor1'];
       $dataProductos = CRUD("SELECT * FROM productos WHERE id_categoria LIKE '%$valor1%'","s");
    }
    else{
        $dataProductos = CRUD("SELECT * FROM productos ORDER BY codigo ASC LIMIT $inicio,$registros","s");
    }

    $num_registros = CountReg($query);
    $paginas = ceil($num_registros/$registros);

    $dataMaxId = CRUD("SELECT MAX(id_producto) AS maxid FROM productos","s");

    foreach ($dataMaxId AS $result){
        $max_id_product = $result['maxid'] + 1;
    }

    $dataCategoria = CRUD("SELECT * FROM categorias","s");
    $dataMarca = CRUD("SELECT * FROM marcas","s");
?>

<script>

    $(".reg-producto").click(function(){

        $("#ModalRegProducto").modal('show');

        return false;

    });

    $(".ver-producto").click(function(){

        let idproducto = $(this).attr("id-producto");

        $("#info-producto").load("./views/inventario/info_producto.php?idproducto="+idproducto);

        return false;

    });

    $(".pagina").click(function(){

        let num, reg;

        num = $(this).attr("v-num");

        reg = $(this).attr("num-reg");

        $("#contenido").load("views/inventario/principal.php?num="+ num + "&num_reg="+ reg);

        return false;

    });

    $("#select-reg").click(function(){

        let valor;

        valor = $("#select-reg option:selected").val();

        if(valor == 0){

            alertify.success("<b style='color:black;'>Debe seleccionar un valor de registro a mostrar...</b>");

        }
        else{

            $("#contenido").load("views/inventario/principal.php?num_reg=" + valor);

        }

        return false;

    });

    $("#like").on('change',function(){

        let valor;

        valor = $("#like").val();

        if(valor.trim() == ""){

            alertify.alert("Busca producto","No ingreso el nombre o codigo del producto a buscar....");

        }
        else{

            $("#contenido").load("views/inventario/principal.php?like=1&valor=" + valor);

        }

        return false;

    });

    $("#id_categoria").on('change',function(){

        let valor1;

        valor1 = $("#id_categoria").val();

        if(valor1.trim() == ""){

            alertify.alert("Busca producto","Debe seleccionar la categoria....");

        }
        else{

            $("#contenido").load("views/inventario/principal.php?like1=1&valor1=" + valor1);

        }

        return false;

    });

</script>

<style>

    body{
        background:#eef2f7;
    }

    .inventario-container{
        width:100%;
        padding:15px;
    }

    .inventario-row{
        display:flex;
        gap:20px;
        align-items:flex-start;
    }

    .inventario-left{
        width:72%;
    }

    .inventario-right{
        width:28%;
    }

    .card{
        border:none !important;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
    }

    .card-header{
        background:linear-gradient(135deg,#0f172a,#1e3a8a) !important;
        color:white !important;
        padding:20px;
        font-size:24px;
        font-weight:600;
    }

    .card-body{
        padding:25px;
    }

    .reg-producto{
        background:linear-gradient(135deg,#16a34a,#22c55e) !important;
        border:none !important;
        border-radius:12px !important;
        padding:10px 18px !important;
        font-weight:600;
    }

    .form-control,
    .custom-select{
        height:50px !important;
        border-radius:12px !important;
        border:1px solid #dbe2ea !important;
        background:#f8fafc !important;
    }

    .table-responsive{
        margin-top:20px;
        border-radius:15px;
        overflow:hidden;
    }

    table thead{
        background:#1e293b;
        color:white;
    }

    table thead th{
        border:none !important;
        padding:15px !important;
    }

    table tbody tr:hover{
        background:#f8fbff;
    }

    #info-producto{
        min-height:650px;
    }

    @media(max-width:991px){

        .inventario-row{
            flex-direction:column;
        }

        .inventario-left,
        .inventario-right{
            width:100%;
        }

    }

</style>

<div class="inventario-container">

    <div class="inventario-row">

        <!-- INVENTARIO -->
        <div class="inventario-left">

            <div class="card">

                <div class="card-header">

                    <i class="fa-solid fa-boxes-stacked"></i>

                    Consultar Inventario

                    <a href=""
                       style="float:right;"
                       class="btn btn-success reg-producto">

                        <i class="fa-solid fa-plus"></i>

                        Agregar

                    </a>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="input-group col-md-6 mb-3">

                            <input type="text"
                                   class="form-control"
                                   id="like"
                                   placeholder="Buscar Producto"
                                   autocomplete="off">

                        </div>

                        <div class="input-group col-md-6 mb-3">

                            <select class="custom-select"
                                    id="id_categoria">

                                <option value="0" disabled selected>

                                    Buscar por categoria

                                </option>

                                <?php foreach($dataCategoria AS $result): ?>

                                    <option value="<?php echo $result['id_categoria']; ?>">

                                        <?php echo $result['nombre']; ?>

                                    </option>

                                <?php endforeach ?>

                            </select>

                        </div>

                    </div>

                    <div class="table-responsive">

                        <?php include 'tabla.php'; ?>

                    </div>

                </div>

            </div>

        </div>

        <?php include '../../views/modals/registrar_producto.php'; ?>

        <!-- INFORMACION -->
        <div class="inventario-right">

            <div class="card">

                <div class="card-header">

                    <i class="fa-solid fa-circle-info"></i>

                    Información Producto

                </div>

                <div class="card-body" id="info-producto">

                    <?php include 'info_producto.php'; ?>

                </div>

            </div>

        </div>

    </div>

</div>
