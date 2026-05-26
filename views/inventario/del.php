<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$id = $_GET['idpro'];

/* obtener imagen */
$data = CRUD("SELECT imagen FROM productos WHERE id_producto='$id'","s");
$img = $data[0]['imagen'];

/* borrar archivo */
if(!empty($img) && file_exists("../../" . $img)){
    unlink("../../" . $img);
}

/* borrar BD */
$delete = CRUD("DELETE FROM productos WHERE id_producto='$id'","d");
?>

<?php if($delete): ?>
<script>
alertify.success("Producto eliminado");
$("#contenido").load("./views/inventario/principal.php");
</script>
<?php else: ?>
<script>
alertify.error("Error al eliminar");
</script>
<?php endif ?>
