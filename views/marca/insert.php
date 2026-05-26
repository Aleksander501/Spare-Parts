<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$nombre = $_POST['nombre'];

if(isset($_FILES['imagen'])) {

    $img = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    // carpeta REAL desde este archivo
    $carpeta = "../../public/img/marcas/";

    // crear carpeta si no existe
    if(!is_dir($carpeta)){
        mkdir($carpeta, 0777, true);
    }

    // nombre único
    $nombreFinal = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "", $img);

    $destino = $carpeta . $nombreFinal;

    // subir imagen
    if(move_uploaded_file($tmp, $destino)){

        // ESTA es la ruta que verá el navegador
        $rutaBD = "public/img/marcas/" . $nombreFinal;

        $insert = CRUD(
            "INSERT INTO marcas(nombre, imagen) VALUES('$nombre','$rutaBD')",
            "i"
        );

    } else {
        $insert = false;
    }

} else {
    $insert = false;
}
?>

<?php if($insert): ?>
<script>
    alertify.success("Marca registrada correctamente");
    $("#contenido").load("./views/marca/principal.php");
</script>
<?php else: ?>
<script>
    alertify.error("Error al subir imagen o guardar marca");
</script>
<?php endif ?>
