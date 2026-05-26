<?php 
  include '../../models/conexion.php';
  include '../../models/procesos.php';
  include '../../controllers/funciones.php';

    $iduser = $_GET['iduser'];

    $dataMar = CRUD("SELECT * FROM usuarios WHERE id_usuario = '$iduser' " ,"s");
    foreach ($dataMar as $result) 
    {
        $usuario = $result['usuario'];
        $contraseña = $result['contraseña'];
        $correo = $result['correo'];
    }
    $dataTipo = CRUD("SELECT * FROM tipo_usuario","s");
?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?php echo $iduser ; ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Nombre Usuario</span>
                                </div>
                                <input type="text" name="usuario" class="form-control" required="ON" value="<?php echo $usuario ; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Contraseña</span>
                                </div>
                                <input type="password" name="passw" class="form-control" required="ON" value="<?php echo $contraseña ; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Correo</span>
                                </div>
                                <input type="text" name="correo" class="form-control" required="ON" value="<?php echo $correo ; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="tipo">
                                    <option value="0" disabled selected>Tipo Usuario</option>
                                    <?php foreach($dataTipo AS $result): ?>
                                        <option value="<?php echo $result['idtipo']; ?>"><?php echo $result['nombre']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div> 
                        </div>
                    </div>