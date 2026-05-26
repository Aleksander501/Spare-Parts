<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];

/* ================= IMAGEN ACTUAL ================= */
$data = CRUD("SELECT imagen FROM productos WHERE id_producto='$id'","s");
$imgActual = $data[0]['imagen'];

/* ================= NUEVA IMAGEN ================= */
if(!empty($_FILES['imagen']['name'])){

    // borrar anterior
    if(file_exists("../../" . $imgActual)){
        unlink("../../" . $imgActual);
    }

    $img = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    $carpeta = "../../public/img/productos/";

    if(!file_exists($carpeta)){
        mkdir($carpeta, 0777, true);
    }

    $nombreFinal = time() . "_" . $img;
    $rutaFisica = $carpeta . $nombreFinal;

    move_uploaded_file($tmp, $rutaFisica);

    $rutaBD = "public/img/productos/" . $nombreFinal;

} else {
    $rutaBD = $imgActual;
}

/* ================= UPDATE ================= */
$tabla = "productos";
$campos = "codigo='$codigo',nombre='$nombre',descripcion='$descripcion',fecha_agregado='$fecha',stock='$cantidad',id_categoria='$categoria',imagen='$rutaBD',marca='$marca'";
$condicion = "id_producto='$id'";

$update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
?>

<?php if($update): ?>
<script>
alertify.success("Producto actualizado correctamente");
$("#contenido").load("./views/inventario/principal.php");
</script>
<?php else: ?>
<script>
alertify.error("Error al actualizar producto");
</script>
<?php endif ?>
