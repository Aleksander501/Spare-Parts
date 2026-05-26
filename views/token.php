<?php
    @session_start();
    include '../models/conexion.php';
    include '../models/login.php';
    include '../models/procesos.php';
    include '../controllers/funciones.php';

    $modeloBD = new ConexionBD();
    $conexionBD = $modeloBD->get_conexion();
    $correo = $_GET['correo'];
    $buscaCorreo = buscarvalor("usuarios","COUNT(usuario)","correo='$correo'");

    if($buscaCorreo != 0)
    {
        $usuario = buscarvalor("usuarios","usuario","correo='$correo'");
        $token = Token(8);
        Email($correo,$token);

        $update = $conexionBD->query("UPDATE usuarios SET token='$token' WHERE usuario='$usuario'");
        if($update)
        {
            include 'cambio_clave.php';
        }
        else
        {
            echo '<script>
            $("#data").load("./views/olvide_clave.php");
            </script>';
        }
    }
    else
    {
        echo "El correo enviado no se encuentra en la base de datos.....";
    }
?>