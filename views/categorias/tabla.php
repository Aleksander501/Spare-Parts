<style>

    /* ================= CONTENEDOR ================= */

    .table-responsive{
        margin-top:30px;
        border-radius:24px;
        overflow:hidden;
        background:#ffffff;
        border:1px solid #e2e8f0;
        box-shadow:0 15px 35px rgba(15,23,42,0.08);
    }

    .table{
        margin-bottom:0 !important;
        border-collapse:separate;
        border-spacing:0;
    }

    /* ================= ENCABEZADO ================= */

    .table thead{
        background:linear-gradient(135deg,#1e293b,#2563eb) !important;
    }

    .table thead tr{
        background:transparent !important;
    }

    .table thead tr th{
        background:transparent !important;
        color:#ffffff !important;
        font-size:15px !important;
        font-weight:700 !important;
        text-align:center !important;
        padding:22px 18px !important;
        border:none !important;
        text-transform:uppercase;
        letter-spacing:1px;
        vertical-align:middle !important;
        opacity:1 !important;
    }

    /* ================= FILAS ================= */

    .table tbody tr{
        transition:all .25s ease;
        background:#ffffff;
    }

    .table tbody tr:nth-child(even){
        background:#f8fafc;
    }

    .table tbody tr:hover{
        background:#eaf3ff !important;
        transform:scale(1.002);
    }

    .table tbody td{
        padding:20px 15px !important;
        text-align:center;
        vertical-align:middle !important;
        border-top:1px solid #edf2f7 !important;
        color:#334155 !important;
        font-size:14px;
        font-weight:500;
    }

    /* ================= NUMERO ================= */

    .row-number{
        font-size:16px;
        font-weight:700;
        color:#2563eb !important;
    }

    /* ================= NOMBRE ================= */

    .categoria-name{
        font-weight:700;
        color:#0f172a !important;
        font-size:15px;
    }

    /* ================= DESCRIPCION ================= */

    .categoria-desc{
        max-width:280px;
        margin:auto;
        color:#64748b;
        font-size:14px;
        line-height:1.5;
    }

    /* ================= FECHA ================= */

    .badge-date{
        background:#dbeafe;
        color:#1d4ed8;
        padding:9px 16px;
        border-radius:30px;
        font-size:13px;
        font-weight:700;
        display:inline-block;
    }

    /* ================= BOTONES ================= */

    .btn-edit{
        width:45px;
        height:45px;
        border:none !important;
        border-radius:14px !important;
        background:linear-gradient(135deg,#16a34a,#22c55e) !important;
        color:white !important;
        transition:0.3s;
    }

    .btn-delete{
        width:45px;
        height:45px;
        border:none !important;
        border-radius:14px !important;
        background:linear-gradient(135deg,#dc2626,#ef4444) !important;
        color:white !important;
        transition:0.3s;
    }

    .btn-edit:hover,
    .btn-delete:hover{
        transform:translateY(-3px);
        box-shadow:0 10px 20px rgba(0,0,0,0.15);
    }

</style>

<div class="table-responsive">

    <table class="table align-middle">

        <thead>

            <tr>

                <th>N°</th>

                <th>Nombre</th>

                <th>Descripción</th>

                <th>Fecha agregada</th>

                <th colspan="2">Acciones</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($dataCategorias as $result): ?>

            <tr>

                <!-- NUMERO -->
                <td class="row-number">

                    <?php echo $cont +=1; ?>

                </td>

                <!-- NOMBRE -->
                <td class="categoria-name">

                    <?php echo $result['nombre']; ?>

                </td>

                <!-- DESCRIPCION -->
                <td>

                    <div class="categoria-desc">

                        <?php echo $result['descripcion']; ?>

                    </div>

                </td>

                <!-- FECHA -->
                <td>

                    <span class="badge-date">

                        <i class="fa-solid fa-calendar-days"></i>

                        <?php echo $result['fecha_agregado']; ?>

                    </span>

                </td>

                <!-- EDITAR -->
                <td>

                    <a href=""
                       class="btn btn-success btn-edit edit-categoria"
                       id-categoria="<?php echo $result['id_categoria']; ?>">

                        <i class="fa-solid fa-pen-to-square"></i>

                    </a>

                </td>

                <!-- ELIMINAR -->
                <td>

                    <a href=""
                       class="btn btn-danger btn-delete del-categoria"
                       id-categoria="<?php echo $result['id_categoria']; ?>">

                        <i class="fa-solid fa-trash-can"></i>

                    </a>

                </td>

            </tr>

            <?php endforeach ?>

        </tbody>

    </table>

</div>
