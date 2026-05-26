<style>

    .table-responsive{
        margin-top:25px;
        border-radius:18px;
        overflow:hidden;
        background:white;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
    }

    .table{
        margin-bottom:0 !important;
    }

    /* ================= HEADER ================= */

    .table thead{
        background:linear-gradient(135deg,#0f172a,#1e3a8a) !important;
    }

    .table thead tr{
        background:transparent !important;
    }

    .table thead tr th{
        color:#f8fafc !important;
        background:none !important;
        font-weight:700;
        text-align:center;
        padding:18px 15px !important;
        border:none !important;
        font-size:15px;
        letter-spacing:0.5px;
        vertical-align:middle;
    }

    /* ================= BODY ================= */

    .table tbody tr{
        transition:0.3s;
    }

    .table tbody tr:hover{
        background:#f8fbff;
    }

    .table tbody td{
        padding:18px 12px !important;
        vertical-align:middle !important;
        text-align:center;
        border-top:1px solid #eef2f7 !important;
        color:#334155;
        font-size:14px;
        font-weight:500;
    }

    /* ================= STOCK BADGE ================= */

    .stock-badge{

        padding:7px 14px;
        border-radius:30px;
        font-size:13px;
        font-weight:700;
        display:inline-block;
        min-width:70px;
        text-align:center;

    }

    /* ================= BOTON ================= */

    .btn-view{
        background:linear-gradient(135deg,#2563eb,#3b82f6) !important;
        border:none !important;
        border-radius:12px !important;
        padding:8px 18px !important;
        font-size:14px !important;
        font-weight:600 !important;
        transition:0.3s;
    }

    .btn-view:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(37,99,235,0.25);
    }

    /* ================= NUMERO ================= */

    .row-number{
        font-weight:bold;
        color:#0f172a;
    }

</style>

<div class="table-responsive">

    <table class="table table-hover align-middle">

        <thead>

            <tr>

                <th>N°</th>

                <th>Codigo</th>

                <th>Nombre</th>

                <th>Cantidad</th>

                <th>Categoria</th>

                <th>Marca</th>

                <th>Accion</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($dataProductos as $result): ?>

            <tr>

                <!-- NUMERO -->
                <td class="row-number">

                    <?php echo $cont +=1; ?>

                </td>

                <!-- CODIGO -->
                <td>

                    <?php echo $result['codigo']; ?>

                </td>

                <!-- NOMBRE -->
                <td>

                    <?php echo $result['nombre']; ?>

                </td>

                <!-- STOCK DINAMICO -->
                <td>

                    <?php

                        $stock = $result['stock'];

                        if($stock <= 3){

                            $colorStock = "background:#fee2e2;color:#b91c1c;";

                        }
                        elseif($stock <= 7){

                            $colorStock = "background:#fef3c7;color:#92400e;";

                        }
                        else{

                            $colorStock = "background:#dcfce7;color:#166534;";

                        }

                    ?>

                    <span class="stock-badge"
                          style="<?php echo $colorStock; ?>">

                        <?php echo $stock; ?>

                    </span>

                </td>

                <!-- CATEGORIA -->
                <td>

                    <?php

                        $id_categoria = $result['id_categoria'];

                        echo buscarvalor(
                            "categorias",
                            "nombre",
                            "id_categoria='$id_categoria'"
                        );

                    ?>

                </td>

                <!-- MARCA -->
                <td>

                    <?php

                        $marca = $result['marca'];

                        echo buscarvalor(
                            "marcas",
                            "nombre",
                            "id_marca='$marca'"
                        );

                    ?>

                </td>

                <!-- BOTON -->
                <td>

                    <a href=""
                       class="btn btn-primary btn-view ver-producto"
                       id-producto="<?php echo $result['id_producto']; ?>">

                        <i class="fa-solid fa-eye"></i>

                        Ver

                    </a>

                </td>

            </tr>

            <?php endforeach ?>

        </tbody>

    </table>

</div>
