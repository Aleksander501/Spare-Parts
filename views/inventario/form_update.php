<?php 
include '../../models/conexion.php';
include '../../models/procesos.php';
include '../../controllers/funciones.php';

$idpro = $_GET['idpro'];

$dataCat = CRUD("SELECT * FROM categorias","s");
$dataMarca = CRUD("SELECT * FROM marcas","s");    

$dataPro = CRUD("SELECT * FROM productos WHERE id_producto = '$idpro' ","s");

foreach ($dataPro as $result) {
    $nombre = $result['nombre'];
    $codigo = $result['codigo'];
    $descripcion = $result['descripcion'];
    $cantidad = $result['stock'];
    $imagen = $result['imagen'];
    $categoriaSel = $result['id_categoria'];
    $marcaSel = $result['marca'];
}
?>

<div class="row">

    <div class="col-md-6">

        <input type="hidden" name="id" value="<?php echo $idpro; ?>">
        <input type="hidden" name="fecha" value="<?php echo date('m-d-Y h:i:s a'); ?>">
        <input type="hidden" name="imagen_actual" value="<?php echo $imagen; ?>">

        <div class="input-group mb-3">
            <span class="input-group-text">Nombre</span>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Código</span>
            <input type="text" name="codigo" class="form-control" value="<?php echo $codigo; ?>">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Descripción</span>
            <textarea name="descripcion" class="form-control"><?php echo $descripcion; ?></textarea>
        </div>

    </div>

    <div class="col-md-6">

        <div class="input-group mb-3">
            <span class="input-group-text">Cantidad</span>
            <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>">
        </div>

        <div class="input-group mb-3">
            <select class="custom-select" name="categoria">
                <?php foreach($dataCat as $cat): ?>
                    <option value="<?php echo $cat['id_categoria']; ?>"
                        <?php if($cat['id_categoria'] == $categoriaSel) echo "selected"; ?>>
                        <?php echo $cat['nombre']; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <select class="custom-select" name="marca">
                <?php foreach($dataMarca as $mar): ?>
                    <option value="<?php echo $mar['id_marca']; ?>"
                        <?php if($mar['id_marca'] == $marcaSel) echo "selected"; ?>>
                        <?php echo $mar['nombre']; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- IMAGEN ACTUAL -->
        <div class="mb-2">
            <img src="../../<?php echo $imagen; ?>" width="90">
        </div>

        <!-- NUEVA IMAGEN -->
        <div class="input-group mb-3">
            <input type="file" name="imagen" class="form-control">
        </div>

    </div>

</div>
