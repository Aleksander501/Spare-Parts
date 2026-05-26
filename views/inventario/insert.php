<?php
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$fecha_agregado = $_POST['fecha'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];

// ================= IMAGEN =================
$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];

// carpeta correcta desde este archivo
$carpeta = "../../public/img/productos/";

if(!is_dir($carpeta)){
    mkdir($carpeta, 0777, true);
}

$nombreFinal = time() . "_" . $imagen;
$destino = $carpeta . $nombreFinal;

// subir archivo
if(move_uploaded_file($tmp, $destino)){

    // ruta que se guarda en BD
    $rutaBD = "public/img/productos/" . $nombreFinal;

} else {
    $rutaBD = ""; // fallback si falla
}

// ================= INSERT =================
$tabla = "productos";
$campos ="codigo,nombre,descripcion,fecha_agregado,stock,id_categoria,imagen,marca";
$valores = "'$codigo','$nombre','$descripcion','$fecha_agregado','$cantidad','$categoria','$rutaBD','$marca'";

$insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)","i");
?>

<?php if($insert): ?>
<script>
    alertify.success('Producto registrado correctamente');
    $("#contenido").load("./views/inventario/principal.php");
</script>
<?php else: ?>
<script>
    alertify.error('Error al registrar producto');
</script>
<?php endif ?>
