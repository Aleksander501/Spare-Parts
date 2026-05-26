<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$idmar = $_GET['idmar'];

/* ================= OBTENER IMAGEN ================= */
$data = CRUD(
    "SELECT imagen FROM marcas WHERE id_marca='$idmar'",
    "s"
);

$imagen = $data[0]['imagen'];

/* ================= BORRAR IMAGEN DE CARPETA ================= */
if(!empty($imagen) && file_exists("../../" . $imagen)){

    unlink("../../" . $imagen);

}

/* ================= ELIMINAR REGISTRO ================= */
$tabla = "marcas";
$condicion = "id_marca='$idmar'";

$delete = CRUD(
    "DELETE FROM $tabla WHERE $condicion",
    "d"
);
?>

<?php if($delete): ?>

<script>

    alertify.success(
        '<b style="color:black;">Marca eliminada correctamente...</b>'
    );

    $("#contenido").load("./views/marca/principal.php");

</script>

<?php else: ?>

<script>

    alertify.error(
        '<b style="color:black;">Error al eliminar marca...</b>'
    );

    $("#contenido").load("./views/marca/principal.php");

</script>

<?php endif ?>
