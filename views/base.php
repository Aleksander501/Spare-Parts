<?php 
  if(isset($_GET['off']))
  {
    session_start();
    $_SESSION = array();
    session_destroy();
  }
  else
  { 
    session_start();
  } 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./public/img/login/ET.png"> 
        <?php if(isset($_SESSION['login_ok'])):?>
            <title>Spare Parts</title>
        <?php  else: ?>
            <title>Login</title>
        <?php endif ?>
        <link rel="stylesheet" href="./public/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/bootstrap-theme.css">
        <link rel="stylesheet" href="./public/css/alertify.min.css">
        <link rel="stylesheet" href="./public/css/default.min.css">
        <link rel="stylesheet" href="./public/css/style.css">
        <link rel="stylesheet" href="./public/css/login.css">
        <!-- <link rel="stylesheet" href="./public/css/navbar.css"> -->
        <link rel="stylesheet" href="./public/css/olvide_clave.css">
        <!-- <link rel="stylesheet" href="./public/css/info_producto.css"> -->
         <!--JS -->
        <script src="./public/js/alertify.min.js"></script>
        <script src="./public/js/jquery-3.5.1.slim.min.js"></script>
        <script src="./public/js/jquery-1.9.1.min.js"></script>
        <script src="./public/js/bootstrap.min.js"></script>
        <script src="./public/js/fontawesome.js"></script>
        <script src="https://kit.fontawesome.com/bfc7c963fc.js" crossorigin="anonymous"></script>
    	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
        <!-- Funciones JS-->
        <script src="./public/js/funciones-navbar.js"></script>
        <script src="./public/js/funciones-login.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="data">
        <?php if(isset($_SESSION['login_ok'])):?>
        <?php include './views/principal.php';?>
        <?php else:?>
          <?php  if(isset($_SESSION["msj"])):?>
            <script>
              var msj = '<?php echo $_SESSION["msj"]; ?>'
              alertify.alert("Login",msj);
            </script>
          <?php endif?>
          <?php 
            include './views/login.php';
          ?>
        <?php endif?>
        </div>
    </body>
</html>
