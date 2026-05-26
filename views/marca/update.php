<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];

// 1. Obtener imagen actual de la BD
$imgActual = buscarvalor("marcas", "imagen", "id_marca='$id'");

// 2. Verificar si subió nueva imagen
if(!empty($_FILES['imagen']['name'])){

    $img = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    $carpeta = "../../public/img/marcas/";

    if(!is_dir($carpeta)){
        mkdir($carpeta, 0777, true);
    }

    $nombreFinal = time() . "_" . $img;
    $destino = $carpeta . $nombreFinal;

    if(move_uploaded_file($tmp, $destino)){

        // eliminar imagen anterior si existe
        if(file_exists("../../" . $imgActual)){
            unlink("../../" . $imgActual);
        }

        // nueva ruta
        $ruta = "public/img/marcas/" . $nombreFinal;

    } else {
        $ruta = $imgActual; // si falla subida, conserva la anterior
    }

} else {
    $ruta = $imgActual; // si no sube nueva imagen
}

// 3. UPDATE BD
$update = CRUD(
    "UPDATE marcas SET nombre='$nombre', imagen='$ruta' WHERE id_marca='$id'",
    "u"
);
?>

<?php if($update): ?>
<script>
    alertify.success("Marca actualizada correctamente");
    $("#contenido").load("./views/marca/principal.php");
</script>
<?php else: ?>
<script>
    alertify.error("Error al actualizar marca");
</script>
<?php endif ?>
