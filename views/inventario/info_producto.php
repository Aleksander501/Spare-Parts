<?php
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $idproducto = $_GET['idproducto'];

    $dataProductos2 = CRUD("SELECT * FROM productos WHERE id_producto = '$idproducto'","s");
?>

<script>

    $(".edit-producto").click(function(){

        let idpro = $(this).attr("id-producto");

        $("#ModalUpdProducto").modal('show');

        $("#DataUpdProducto").load("./views/inventario/form_update.php?idpro="+idpro);

        return false;

    });

    $(".del-producto").click(function(){

        let idpro = $(this).attr("id-producto");

        alertify.confirm(
            'Eliminar Producto',
            'Seguro/a de eliminar producto...',
            function(){

                $("#contenido").load("./views/inventario/del.php?idpro="+idpro);

            },
            function(){

                alertify.error('Proceso cancelado...')

            }
        );

        return false;

    });

</script>

<style>

    .product-card{
        border:none !important;
        border-radius:20px;
        overflow:hidden;
        background:white;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
    }

    .product-img{
        width:100%;
        height:280px;
        object-fit:cover;
    }

    .product-body{
        padding:25px;
    }

    .product-title{
        font-size:26px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:10px;
    }

    .brand-section{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:20px;
    }

    .brand-logo{
        width:45px;
        height:45px;
        object-fit:contain;
        background:#f8fafc;
        padding:5px;
        border-radius:10px;
        border:1px solid #e2e8f0;
    }

    .brand-name{
        font-size:15px;
        font-weight:600;
        color:#334155;
    }

    .product-code{
        background:#eff6ff;
        color:#1d4ed8;
        padding:10px 15px;
        border-radius:12px;
        font-weight:600;
        margin-bottom:15px;
        display:inline-block;
    }

    .product-stock{
        padding:10px 18px;
        border-radius:12px;
        font-weight:700;
        display:inline-block;
        margin-bottom:20px;
        font-size:15px;
    }

    .product-description{
        background:#f8fafc;
        border-radius:15px;
        padding:18px;
        color:#475569;
        line-height:1.8;
        font-size:14px;
        border:1px solid #e2e8f0;
    }

    .product-actions{
        display:flex;
        justify-content:center;
        gap:15px;
        margin-top:25px;
    }

    .btn-edit{
        background:linear-gradient(135deg,#2563eb,#3b82f6) !important;
        border:none !important;
        border-radius:12px !important;
        padding:10px 20px !important;
        font-weight:600 !important;
    }

    .btn-edit:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(37,99,235,0.25);
    }

    .btn-delete{
        background:linear-gradient(135deg,#dc2626,#ef4444) !important;
        border:none !important;
        border-radius:12px !important;
        padding:10px 20px !important;
        font-weight:600 !important;
    }

    .btn-delete:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(239,68,68,0.25);
    }

</style>

<div class="card product-card">

    <?php foreach($dataProductos2 AS $result) : ?>

        <?php

            $stock = $result['stock'];

            if($stock <= 3){

                $colorStock = "
                    background:#fee2e2;
                    color:#b91c1c;
                    border:1px solid #fecaca;
                ";

            }
            elseif($stock <= 7){

                $colorStock = "
                    background:#fef3c7;
                    color:#92400e;
                    border:1px solid #fde68a;
                ";

            }
            else{

                $colorStock = "
                    background:#dcfce7;
                    color:#166534;
                    border:1px solid #bbf7d0;
                ";

            }

        ?>

        <!-- IMAGEN -->
        <img
            src="<?php echo $result['imagen'];?>"
            class="product-img"
        >

        <div class="card-body product-body">

            <!-- NOMBRE -->
            <h4 class="product-title">

                <?php echo $result['nombre']; ?>

            </h4>

            <!-- MARCA -->
            <div class="brand-section">

                <img
                    class="brand-logo"
                    src="<?php
                        $marca = $result['marca'];
                        echo buscarvalor(
                            "marcas",
                            "imagen",
                            "id_marca='$marca'"
                        );
                    ?>"
                >

                <span class="brand-name">

                    <?php
                        $marca = $result['marca'];

                        echo buscarvalor(
                            "marcas",
                            "nombre",
                            "id_marca='$marca'"
                        );
                    ?>

                </span>

            </div>

            <!-- CODIGO -->
            <div class="product-code">

                <i class="fa-solid fa-barcode"></i>

                Código:
                <?php echo $result['codigo']; ?>

            </div>

            <br>

            <!-- STOCK -->
            <div
                class="product-stock"
                style="<?php echo $colorStock; ?>"
            >

                <i class="fa-solid fa-boxes-stacked"></i>

                Stock:
                <?php echo $stock; ?>

            </div>

            <!-- DESCRIPCION -->
            <div class="product-description">

                <strong>

                    <i class="fa-solid fa-align-left"></i>

                    Descripción

                </strong>

                <hr>

                <?php echo $result['descripcion']; ?>

            </div>

            <!-- BOTONES -->
            <div class="product-actions">

                <a
                    href=""
                    class="btn btn-primary btn-edit edit-producto"
                    id-producto="<?php echo $result['id_producto']; ?>"
                >

                    <i class="fa-solid fa-pen-to-square"></i>

                    Editar

                </a>

                <a
                    href=""
                    class="btn btn-danger btn-delete del-producto"
                    id-producto="<?php echo $result['id_producto']; ?>"
                >

                    <i class="fa-solid fa-trash-can"></i>

                    Eliminar

                </a>

            </div>

        </div>

    <?php endforeach ?>

</div>

<?php include '../modals/actualizar_producto.php'; ?>
