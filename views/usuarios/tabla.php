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
        background:linear-gradient(135deg,#0f172a,#2563eb) !important;
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
        padding:20px 15px !important;
        border:none !important;
        text-transform:uppercase;
        letter-spacing:1px;
        vertical-align:middle !important;
    }

    /* ================= FILAS ================= */

    .table tbody tr{
        transition:0.3s;
        background:#ffffff;
    }

    .table tbody tr:nth-child(even){
        background:#f8fafc;
    }

    .table tbody tr:hover{
        background:#eff6ff !important;
        transform:scale(1.002);
    }

    .table tbody td{
        padding:18px 14px !important;
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

    /* ================= USUARIO ================= */

    .user-name{
        font-size:15px;
        font-weight:700;
        color:#0f172a !important;
    }

    /* ================= CORREO ================= */

    .user-email{
        color:#475569 !important;
        font-size:14px;
        font-weight:500;
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

                <th>Usuario</th>

                <th>Correo</th>

                <th colspan="2">Acciones</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($dataUsuarios as $result): ?>

            <tr>

                <!-- NUMERO -->
                <td class="row-number">

                    <?php echo $cont +=1; ?>

                </td>

                <!-- USUARIO -->
                <td class="user-name">

                    <i class="fa-solid fa-user"></i>

                    <?php echo $result['usuario']; ?>

                </td>

                <!-- CORREO -->
                <td class="user-email">

                    <i class="fa-solid fa-envelope"></i>

                    <?php echo $result['correo']; ?>

                </td>

                <!-- EDITAR -->
                <td>

                    <a href=""
                       class="btn btn-success btn-edit edit-usuario"
                       id-usuario="<?php echo $result['id_usuario']; ?>">

                        <i class="fa-solid fa-pen-to-square"></i>

                    </a>

                </td>

                <!-- ELIMINAR -->
                <td>

                    <a href=""
                       class="btn btn-danger btn-delete del-usuario"
                       id-usuario="<?php echo $result['id_usuario']; ?>">

                        <i class="fa-solid fa-trash-can"></i>

                    </a>

                </td>

            </tr>

            <?php endforeach ?>

        </tbody>

    </table>

</div>
