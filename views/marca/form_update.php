<?php 
  include '../../models/conexion.php';
  include '../../models/procesos.php';
  include '../../controllers/funciones.php';

    $idmar = $_GET['idmar'];

    $dataMar = CRUD("SELECT * FROM marcas WHERE id_marca = '$idmar' " ,"s");
    foreach ($dataMar as $result) 
    {
        $nombre = $result['nombre'];
        $imagen = $result['imagen'];
    }
?>
<div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?php echo $idmar ; ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Nombre marca</span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control" required="ON" value="<?php echo $nombre ; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Subir imagen</span>
                                </div>
                                <input type="file" name="imagen" id="imagen" class="form-control" required="ON" value="<?php echo $imagen ; ?>">
                            </div>
                        </div>
                    </div>
