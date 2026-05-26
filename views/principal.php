<style>

    /* ================= BODY ================= */

    body{
        background:linear-gradient(135deg,#e2e8f0,#f8fafc);
        font-family:'Segoe UI',sans-serif;
        min-height:100vh;
    }

    /* ================= CONTENEDOR ================= */

    .main-container{
        padding:25px;
    }

    /* ================= PANEL PRINCIPAL ================= */

    .home-section{
        width:100%;
        min-height:88vh;
        border-radius:30px;
        background:#ffffff;
        box-shadow:0 20px 45px rgba(15,23,42,0.08);
        border:1px solid #e2e8f0;
        overflow:hidden;
        position:relative;
    }

    /* ================= HEADER ================= */

    .dashboard-header{
        background:linear-gradient(135deg,#0f172a,#2563eb);
        padding:45px;
        color:white;
        position:relative;
        overflow:hidden;
    }

    .dashboard-header::before{
        content:'';
        position:absolute;
        width:300px;
        height:300px;
        background:rgba(255,255,255,0.08);
        border-radius:50%;
        top:-120px;
        right:-100px;
    }

    .dashboard-header h1{
        font-size:38px;
        font-weight:700;
        margin-bottom:10px;
        position:relative;
        z-index:2;
    }

    .dashboard-header p{
        font-size:16px;
        opacity:0.9;
        position:relative;
        z-index:2;
    }

    /* ================= CONTENIDO ================= */

    .dashboard-content{
        padding:35px;
    }

    /* ================= TARJETAS ================= */

    .dashboard-card{
        background:#ffffff;
        border:none;
        border-radius:25px;
        padding:30px;
        text-align:center;
        box-shadow:0 10px 25px rgba(15,23,42,0.06);
        transition:0.3s;
        border:1px solid #e2e8f0;
        height:100%;
    }

    .dashboard-card:hover{
        transform:translateY(-6px);
        box-shadow:0 20px 35px rgba(15,23,42,0.10);
    }

    /* ================= ICONOS ================= */

    .dashboard-icon{
        width:80px;
        height:80px;
        margin:auto;
        border-radius:20px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:32px;
        color:white;
        margin-bottom:20px;
    }

    .icon-blue{
        background:linear-gradient(135deg,#2563eb,#3b82f6);
    }

    .icon-green{
        background:linear-gradient(135deg,#16a34a,#22c55e);
    }

    .icon-orange{
        background:linear-gradient(135deg,#ea580c,#f97316);
    }

    .icon-purple{
        background:linear-gradient(135deg,#7c3aed,#8b5cf6);
    }

    /* ================= TEXTOS ================= */

    .dashboard-card h4{
        font-size:22px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:10px;
    }

    .dashboard-card p{
        color:#64748b;
        font-size:15px;
        margin-bottom:0;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:768px){

        .dashboard-header{
            padding:30px 20px;
        }

        .dashboard-header h1{
            font-size:28px;
        }

        .dashboard-content{
            padding:20px;
        }

    }

</style>

<?php include './views/navbar/navbar2.php'; ?>

<div class="container-fluid main-container">

    <div id="contenido" class="home-section" style="margin-top:20px;">

        <!-- HEADER -->
        <div class="dashboard-header">

            <h1>

                <i class="fa-solid fa-boxes-stacked"></i>

                Sistema de Inventario

            </h1>

            <p>

                Panel administrativo para la gestión de productos,
                categorías, marcas y usuarios.

            </p>

        </div>

        <!-- CONTENIDO -->
        <div class="dashboard-content">

            <div class="row">

                <!-- INVENTARIO -->
                <div class="col-md-3 mb-4">

                    <div class="dashboard-card">

                        <div class="dashboard-icon icon-blue">

                            <i class="fa-solid fa-box-open"></i>

                        </div>

                        <h4>Inventario</h4>

                        <p>

                            Administra y controla todos los productos
                            registrados en el sistema.

                        </p>

                    </div>

                </div>

                <!-- CATEGORIAS -->
                <div class="col-md-3 mb-4">

                    <div class="dashboard-card">

                        <div class="dashboard-icon icon-green">

                            <i class="fa-solid fa-layer-group"></i>

                        </div>

                        <h4>Categorías</h4>

                        <p>

                            Organiza los productos por categorías
                            para un mejor control.

                        </p>

                    </div>

                </div>

                <!-- MARCAS -->
                <div class="col-md-3 mb-4">

                    <div class="dashboard-card">

                        <div class="dashboard-icon icon-purple">

                            <i class="fa-solid fa-tags"></i>

                        </div>

                        <h4>Marcas</h4>

                        <p>

                            Administra las diferentes marcas
                            asociadas a los productos.

                        </p>

                    </div>

                </div>

                <!-- USUARIOS -->
                <div class="col-md-3 mb-4">

                    <div class="dashboard-card">

                        <div class="dashboard-icon icon-orange">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <h4>Usuarios</h4>

                        <p>

                            Gestiona usuarios y accesos
                            dentro del sistema.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
