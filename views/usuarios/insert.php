<?php

include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$passw = $_POST['passw'];
$tipo = $_POST['tipo'];   

$tabla = "usuarios";
$campos = "usuario,contraseña,correo,estado,tipo";
$valores = "'$usuario','$passw','$correo',1,'$tipo'";

$insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)","i");
?>
<?php if($insert): ?>
    <script>
        alertify.success('<b style="color: black;">Usuario registrado...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php else: ?>
    <script>
    alertify.error('<b>Error al registrar usuario...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php endif ?>