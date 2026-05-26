<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        body{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container{
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0px 10px 35px rgba(0,0,0,0.25);
            max-width: 950px;
            width: 100%;
        }

        .login-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .login-form{
            padding: 50px;
        }

        .logo{
            font-size: 38px;
            font-weight: bold;
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .welcome{
            color: #555;
            margin-bottom: 30px;
        }

        .form-control{
            border-radius: 12px;
            padding: 14px;
            border: 1px solid #ccc;
        }

        .form-control:focus{
            border-color: #2a5298;
            box-shadow: 0 0 10px rgba(42,82,152,0.2);
        }

        .btn-login{
            width: 100%;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-size: 18px;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #16325c;
            transform: translateY(-2px);
        }

        .forgot{
            text-decoration: none;
            color: #2a5298;
            font-size: 14px;
        }

        .forgot:hover{
            text-decoration: underline;
        }

        .input-group-text{
            border-radius: 12px 0 0 12px;
            background: #f1f1f1;
        }

        @media(max-width: 991px){

            .login-image{
                display: none;
            }

            .login-form{
                padding: 35px;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="row login-container">

                <!-- Imagen -->
                <div class="col-lg-5 login-image p-0">
                    <img src="./public/img/coche.jpg" alt="Imagen Login">
                </div>

                <!-- Formulario -->
                <div class="col-lg-7">

                    <div class="login-form">

                        <?php if(isset($_GET['msj'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_GET['msj']; ?>
                            </div>
                        <?php endif ?>

                        <div class="logo">
                            <i class="fa-solid fa-car-side"></i> LOGO
                        </div>

                        <p class="welcome">
                            Bienvenido nuevamente 👋
                        </p>

                        <form action="./controllers/login.php" method="POST">

                            <!-- Usuario -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Usuario
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="user"
                                        class="form-control"
                                        placeholder="Ingrese su usuario"
                                        autocomplete="off"
                                        required
                                    >

                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-4">

                                <label class="form-label">
                                    Contraseña
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>

                                    <input
                                        type="password"
                                        name="passw"
                                        class="form-control"
                                        placeholder="Ingrese su contraseña"
                                        required
                                    >

                                </div>

                            </div>

                            <input type="hidden" name="acclogin" value="1">

                            <!-- Botón -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn-login">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Ingresar
                                </button>
                            </div>

                            <!-- Recuperar -->
                            <div class="text-end">
                                <a class="forgot olvide-clave" href="">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

    $(document).ready(function(){

        $("a.olvide-clave").click(function(e){

            $("#data").load("./views/olvide_clave.php");

            e.preventDefault();

        });

    });

</script>

</body>
</html>
