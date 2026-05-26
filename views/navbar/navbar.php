<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

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
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f4f7fc;
            overflow-x:hidden;
        }

        /* ===================== SIDEBAR ===================== */

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:260px;
            height:100vh;
            background:linear-gradient(180deg,#1e3c72,#2a5298);
            padding-top:20px;
            transition:0.4s;
            z-index:1000;
            box-shadow:5px 0 20px rgba(0,0,0,0.15);
        }

        .sidebar.close{
            width:85px;
        }

        .logo-details{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 20px;
            margin-bottom:30px;
            color:white;
        }

        .logo-details .logo_name{
            font-size:24px;
            font-weight:600;
            white-space:nowrap;
        }

        .sidebar.close .logo_name{
            display:none;
        }

        #boton{
            cursor:pointer;
            font-size:22px;
        }

        .nav-list{
            padding-left:0;
        }

        .nav-list li{
            list-style:none;
            margin:8px 15px;
        }

        .nav-list li a{
            display:flex;
            align-items:center;
            text-decoration:none;
            color:white;
            padding:14px 18px;
            border-radius:12px;
            transition:0.3s;
        }

        .nav-list li a:hover{
            background:rgba(255,255,255,0.15);
            transform:translateX(5px);
        }

        .nav-list li a i{
            font-size:20px;
            min-width:35px;
            text-align:center;
        }

        .links_name{
            font-size:16px;
            font-weight:500;
        }

        .sidebar.close .links_name{
            display:none;
        }

        /* ===================== PROFILE ===================== */

        .profile{
            position:absolute;
            bottom:20px;
            width:100%;
            padding:0 15px;
        }

        .profile a{
            display:flex;
            align-items:center;
            justify-content:center;
            background:#dc3545;
            color:white;
            padding:14px;
            border-radius:12px;
            text-decoration:none;
            transition:0.3s;
        }

        .profile a:hover{
            background:#bb2d3b;
        }

        /* ===================== MAIN CONTENT ===================== */

        .home-section{
            position:relative;
            min-height:100vh;
            left:260px;
            width:calc(100% - 260px);
            transition:0.4s;
            padding:25px;
        }

        .sidebar.close ~ .home-section{
            left:85px;
            width:calc(100% - 85px);
        }

        /* ===================== TOPBAR ===================== */

        .topbar{
            background:white;
            padding:20px 25px;
            border-radius:18px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
            margin-bottom:25px;
        }

        .topbar h4{
            margin:0;
            font-weight:600;
            color:#1e3c72;
        }

        .user-info{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .user-info i{
            font-size:28px;
            color:#2a5298;
        }

        /* ===================== CONTENT ===================== */

        .content-box{
            background:white;
            border-radius:18px;
            padding:25px;
            min-height:500px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        /* ===================== RESPONSIVE ===================== */

        @media(max-width:991px){

            .sidebar{
                width:85px;
            }

            .sidebar .logo_name,
            .sidebar .links_name{
                display:none;
            }

            .home-section{
                left:85px;
                width:calc(100% - 85px);
            }

        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo-details">

            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-gears"></i>
                <span class="logo_name">Spare Parts</span>
            </div>

            <i class="fa-solid fa-bars" id="boton"></i>

        </div>

        <ul class="nav-list">

            <li>
                <a href="#" class="panel-inventario">

                    <i class="fa-solid fa-boxes-stacked"></i>

                    <span class="links_name">
                        Inventario
                    </span>

                </a>
            </li>

            <li>
                <a href="#" class="panel-categorias">

                    <i class="fa-solid fa-layer-group"></i>

                    <span class="links_name">
                        Categorías
                    </span>

                </a>
            </li>

            <li>
                <a href="#">

                    <i class="fa-solid fa-users"></i>

                    <span class="links_name">
                        Usuarios
                    </span>

                </a>
            </li>

            <li>
                <a href="#">

                    <i class="fa-solid fa-chart-line"></i>

                    <span class="links_name">
                        Reportes
                    </span>

                </a>
            </li>

            <!-- Logout -->
            <li class="profile">
                <a href="" class="salir">

                    <i class="fa-solid fa-right-from-bracket"></i>

                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN -->
    <section class="home-section">

        <!-- TOPBAR -->
        <div class="topbar">

            <h4>
                Panel Administrativo
            </h4>

            <div class="user-info">

                <i class="fa-solid fa-circle-user"></i>

                <span>
                    Administrador
                </span>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="content-box" id="contenido">

            <h3 class="mb-3">
                Bienvenido al Sistema
            </h3>

            <p class="text-muted">
                Selecciona una opción del menú lateral para comenzar.
            </p>

        </div>

    </section>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>

        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#boton");

        closeBtn.addEventListener("click", ()=>{

            sidebar.classList.toggle("close");

            if(sidebar.classList.contains("close")){
                closeBtn.classList.replace("fa-xmark", "fa-bars");
            }else{
                closeBtn.classList.replace("fa-bars", "fa-xmark");
            }

        });

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

        });

    </script>

</body>
</html>
