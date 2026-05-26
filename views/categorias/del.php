<?php
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $idcat = $_GET['idcat'];

    $tabla = "categorias";
    $condicion = "id_categoria='$idcat'";

    $delete = CRUD("DELETE FROM $tabla WHERE $condicion","d");
?>
<?php if($delete):?>
    <script>
        alertify.success('<b style="color:black;">Categoría Eliminada...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php else:?>
    <script>
         alertify.success('<b style="color:black;">Error al eliminar categoría...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php endif ?>