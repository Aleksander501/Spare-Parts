<script>
    $("#FormUpdCat").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("FormUpdCat"));
        formData.append("dato","valor");
        $.ajax({
            url: "./views/categorias/update.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(result){
            $("#ModalUpdCat").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#contenido").html(result);
        });
    });
    
</script>
<form id="FormUpdCat" enctype="multipart/form-data">
    <div class="modal fade" id="ModalUpdCat" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: -webkit-linear-gradient(right, #6717cd, #296ff9); color: white;">
                    <h5 class="modal-title" id="tituloVentana">Actualizar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="DataUpdCat">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: #b51f1a; color: white; border: none;">Cancelar</button>
                    <button class="btn" name="BtnRegProducto" style="background: #1813a2; color: white; border: none;">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>