<script>
    $("#FormRegProducto").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("FormRegProducto"));
        formData.append("dato","valor");
        $.ajax({
            url: "./views/inventario/insert.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(result){
            $("#ModalRegProducto").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#contenido").html(result);
        });
    });
    
</script>
<form id="FormRegProducto" enctype="multipart/form-data">
    <div class="modal fade" id="ModalRegProducto" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: -webkit-linear-gradient(right, #6717cd, #296ff9); color: white;">
                    <h5 class="modal-title" id="tituloVentana">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="fecha" value="<?php echo date('m-d-Y h:i:s a', time()); ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Nombre Producto</span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control" required="ON">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Codigo</span>
                                </div>
                                <input type="text" name="codigo" id="codigo" class="form-control" required="ON">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Descripción</span>
                                </div>
                                <textarea class="form-control" name="descripcion" id="descripcion" required="ON"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Cantidad</span>
                                </div>
                                <input type="text" name="cantidad" id="cantidad" class="form-control" required="ON">
                            </div>  
                            <div class="input-group mb-3">
                                <select class="custom-select" name="categoria" id="id_categoria" >
                                    <option value="0" disabled selected>Buscar categoria</option>
                                    <?php foreach($dataCategoria AS $result): ?>
                                        <option value="<?php echo $result['id_categoria']; ?>"><?php echo $result['nombre']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div> 
                            <div class="input-group mb-3">
                                <select class="custom-select" name="marca" id="id_marca" >
                                    <option value="0" disabled selected>Buscar marca</option>
                                    <?php foreach($dataMarca AS $result): ?>
                                        <option value="<?php echo $result['id_marca']; ?>"><?php echo $result['nombre']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>   
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background: #82a1b1; color: white;">Subir Imagen</span>
                                </div>
                                <input type="file" name="imagen" class="form-control" accept="image/*" required>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: #b51f1a; color: white; border: none;">Cancelar</button>
                    <button class="btn" name="BtnRegProducto" style="background: #1813a2; color: white; border: none;">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
