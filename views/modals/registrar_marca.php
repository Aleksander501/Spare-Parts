<script>
$("#FormRegMarca").on('submit',function(e){
    e.preventDefault();

    var formData = new FormData(document.getElementById("FormRegMarca"));

    $.ajax({
        url: "./views/marca/insert.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false
    })
    .done(function(result){
        $("#ModalRegMarca").modal('hide');
        $("#contenido").html(result);
    });
});
</script>

<form id="FormRegMarca" enctype="multipart/form-data">

<div class="modal fade" id="ModalRegMarca" tabindex="-1">

<div class="modal-dialog modal-lg">

<div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title">Agregar Marca</h5>
</div>

<div class="modal-body">

    <div class="input-group mb-3">
        <span class="input-group-text">Nombre marca</span>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Imagen</span>
        <input type="file" name="imagen" class="form-control" accept="image/*" required>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
    <button class="btn btn-primary">Guardar</button>
</div>

</div>

</div>

</div>

</form>
