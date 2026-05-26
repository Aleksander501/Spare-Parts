<?php
    include '../../models/conexion.php';
    include '../../models/procesos.php';
    include '../../controllers/funciones.php';

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_agregado = $_POST['fecha'];

    $tabla = "categorias";
    $campos ="nombre,descripcion,fecha_agregado";
    $valores = "'$nombre','$descripcion','$fecha_agregado'";

    $insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)","i");
?>
<?php if($insert): ?>
    <script>
        alertify.success('<b style="color: black;">Producto registrado...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php else: ?>
    <script>
    alertify.error('<b>Error al registrar producto...</b>');
        $("#contenido").load("./views/categorias/principal.php");
    </script>
<?php endif ?>