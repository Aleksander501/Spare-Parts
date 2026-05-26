<?php
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $idusuario = $_GET['idusuario'];

    $tabla = "usuarios";
    $condicion = "id_usuario='$idusuario'";

    $delete = CRUD("DELETE FROM $tabla WHERE $condicion","d");
?>
<?php if($delete):?>
    <script>
        alertify.success('<b style="color:black;">Usuario Eliminado...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php else:?>
    <script>
         alertify.success('<b style="color:black;">Error al eliminar usuario...</b>');
        $("#contenido").load("./views/usuarios/principal.php");
    </script>
<?php endif ?>