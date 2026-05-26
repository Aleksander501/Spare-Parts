<?php
    session_start();

    // EJEMPLO:
    // ADMINISTRADOR = 1
    // EMPLEADO = 2

    $tipo_usuario = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Navbar Sistema</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f7fc;
            padding:20px;
        }

        /* ================= NAVBAR ================= */

        .custom-navbar{

            background: linear-gradient(135deg,#1e3c72,#2a5298);
            border-radius:18px;
            padding:12px 25px;
            box-shadow:0 8px 20px rgba(0,0,0,0.15);

        }

        /* LOGO */

        .navbar-brand{

            display:flex;
            align-items:center;
            gap:12px;
            color:white !important;
            font-size:22px;
            font-weight:600;

        }

        .navbar-brand img{

            width:50px;
            height:50px;
            object-fit:cover;
            border-radius:12px;
            background:white;
            padding:4px;

        }

        /* LINKS */

        .navbar-nav{

            gap:10px;

        }

        .navbar-nav .nav-link{

            color:white !important;
            padding:10px 18px !important;
            border-radius:12px;
            transition:0.3s;
            font-weight:500;

        }

        .navbar-nav .nav-link:hover{

            background:rgba(255,255,255,0.15);
            transform:translateY(-2px);

        }

        .navbar-nav .nav-link i{

            margin-right:8px;

        }

        /* USER AREA */

        .user-area{

            display:flex;
            align-items:center;
            gap:15px;
            color:white;

        }

        .user-avatar{

            width:42px;
            height:42px;
            border-radius:50%;
            background:white;
            color:#1e3c72;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:20px;
            font-weight:bold;

        }

        .logout-btn{

            width:42px;
            height:42px;
            border-radius:12px;
            background:#dc3545;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
            transition:0.3s;

        }

        .logout-btn:hover{

            background:#bb2d3b;
            transform:scale(1.05);

        }

        /* RESPONSIVE */

        @media(max-width:991px){

            .navbar-nav{

                margin-top:15px;

            }

            .user-area{

                margin-top:15px;

            }

        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg custom-navbar">

    <!-- LOGO -->
    <a class="navbar-brand" href="#">

        <img src="./public/img/logo.png" alt="Logo">

        <span>
            Spare Parts
        </span>

    </a>

    <!-- BUTTON MOBILE -->
    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
    >

        <span class="navbar-toggler-icon"></span>

    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarNav">

        <div class="navbar-nav mx-auto">

            <!-- INVENTARIO -->
            <a class="nav-link panel-inventario" href="#">

                <i class="fa-solid fa-box-open"></i>

                Inventario

            </a>

            <!-- CATEGORIAS -->
            <a class="nav-link panel-categorias" href="#">

                <i class="fa-solid fa-layer-group"></i>

                Categorías

            </a>

            <!-- MARCAS -->
            <a class="nav-link panel-marca" href="#">

                <i class="fa-solid fa-tags"></i>

                Marcas

            </a>

            <!-- SOLO ADMINISTRADOR -->
            <?php if($tipo_usuario == 1): ?>

            <a class="nav-link panel-usuarios" href="#">

                <i class="fa-solid fa-users"></i>

                Usuarios

            </a>

            <?php endif; ?>

        </div>

        <!-- USER -->
        <div class="user-area">

            <div class="user-avatar">

                <i class="fa-solid fa-user"></i>

            </div>

            <span>

                <?php echo $_SESSION['user']; ?>

            </span>

            <a href="" class="logout-btn salir">

                <i class="fa-solid fa-right-from-bracket"></i>

            </a>

        </div>

    </div>

</nav>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

    $(document).ready(function(){

        // Inventario
        $(".panel-inventario").click(function(e){

            $("#contenido").load("views/inventario/principal.php");

            e.preventDefault();

        });

        // Categorías
        $(".panel-categorias").click(function(e){

            $("#contenido").load("views/categorias/principal.php");

            e.preventDefault();

        });

        // Usuarios
        $(".panel-usuarios").click(function(e){

            $("#contenido").load("views/usuarios/principal.php");

            e.preventDefault();

        });

        // Marcas
        $(".panel-marca").click(function(e){

            $("#contenido").load("views/marca/principal.php");

            e.preventDefault();

        });

    });

</script>

</body>
</html>
