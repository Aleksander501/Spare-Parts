<?php 
  include '../../models/conexion.php';
  include '../../models/procesos.php';
  include '../../controllers/funciones.php';

    $idcat = $_GET['idcat'];

    $dataCat = CRUD("SELECT * FROM categorias WHERE id_categoria = '$idcat' " ,"s");
    foreach ($dataCat as $result) 
    {
        $nombre = $result['nombre'];
        $descripcion = $result['descripcion'];
    }
?>
                    <div class="row">
                        <div class="col-md-12">
                        <input type="hidden" name="id" value="<?php echo $idcat ; ?>">
                            <input type="hidden" name="fecha" value="<?php echo date('m-d-Y h:i:s a', time()); ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Nombre</span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control" required="ON" value="<?php echo $nombre ; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Descripción</span>
                                </div>
                                <textarea class="form-control" name="descripcion" id="descripcion" required="ON" placeholder="<?php echo $descripcion ; ?>"></textarea>
                            </div>
                        </div>
                    </div>