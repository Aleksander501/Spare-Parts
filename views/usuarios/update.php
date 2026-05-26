<?php 
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $contraseña= password_hash($_POST['passw'],PASSWORD_DEFAULT);
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    $tabla = "usuarios";
    $condicion = "id_usuario='$id'";
    $campos = "usuario='$usuario',contraseña='$contraseña',correo='$correo',tipo='$tipo'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
?>
<?php if($update) :?>
    <script>
        alertify.success('<b style="color:black;">Usuario actualizada/o...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php else :?>
    <script>
        alertify.success('<b style="color:black;">Error al actualizar usuario...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php endif ?>