<?php 
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $tabla = "categorias";
    $condicion = "id_categoria='$id'";
    $campos = "nombre='$nombre',descripcion='$descripcion',fecha_agregado='$fecha'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
?>
<?php if($update) :?>
    <script>
        alertify.success('<b style="color:black;">Categoría actualizada...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php else :?>
    <script>
        alertify.success('<b style="color:black;">Error al actualizar categoría...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php endif ?>