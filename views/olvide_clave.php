<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recuperar Contraseña</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Segoe UI', sans-serif;
        }

        .recover-card{
            width: 100%;
            max-width: 500px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        .recover-header{
            background: #1e3c72;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .recover-header i{
            font-size: 50px;
            margin-bottom: 15px;
        }

        .recover-body{
            padding: 40px;
        }

        .form-control{
            height: 55px;
            border-radius: 12px;
            border: 1px solid #ccc;
            padding-left: 15px;
        }

        .form-control:focus{
            border-color: #2a5298;
            box-shadow: 0 0 10px rgba(42,82,152,0.2);
        }

        .btn-send{
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 12px;
            background: #1e3c72;
            color: white;
            font-size: 17px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-send:hover{
            background: #16325c;
            transform: translateY(-2px);
        }

        .description{
            color: #666;
            font-size: 15px;
            margin-bottom: 25px;
            text-align: center;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-8">

            <div class="recover-card">

                <!-- Encabezado -->
                <div class="recover-header">

                    <i class="fa-solid fa-envelope-circle-check"></i>

                    <h3>
                        Recuperar Contraseña
                    </h3>

                </div>

                <!-- Contenido -->
                <div class="recover-body">

                    <p class="description">
                        Ingresa tu correo electrónico para enviarte instrucciones de recuperación.
                    </p>

                    <div class="mb-4">

                        <label class="form-label">
                            Correo Electrónico
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <input
                                type="email"
                                name="correo"
                                id="correo"
                                class="form-control"
                                placeholder="ejemplo@correo.com"
                            >

                        </div>

                    </div>

                    <button class="btn-send" id="busca-correo">

                        <i class="fa-solid fa-paper-plane"></i>

                        Enviar Recuperación

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

    $(document).ready(function(){

        $("#busca-correo").click(function(e){

            let correo = $("#correo").val();

            $("#data").load("./views/token.php?correo="+correo);

            e.preventDefault();

        });

    });

</script>

</body>
</html>
