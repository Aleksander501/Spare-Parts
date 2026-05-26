<script>
    $("#FormRegUsuario").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("FormRegUsuario"));
        formData.append("dato","valor");

        $.ajax({
            url: "./views/usuarios/insert.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(result){
            $("#ModalRegUsuario").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#contenido").html(result);
        });
    });
</script>

<style>

    /* ================= MODAL ================= */

    #ModalRegUsuario .modal-content{
        border:none;
        border-radius:25px;
        overflow:hidden;
        box-shadow:0 20px 45px rgba(15,23,42,0.20);
    }

    /* ================= HEADER ================= */

    #ModalRegUsuario .modal-header{
        background:linear-gradient(135deg,#0f172a,#2563eb) !important;
        border:none;
        padding:22px 28px;
    }

    #ModalRegUsuario .modal-title{
        font-size:24px;
        font-weight:700;
        color:#ffffff;
        letter-spacing:0.5px;
    }

    #ModalRegUsuario .close{
        color:#ffffff !important;
        opacity:1;
        font-size:28px;
        text-shadow:none;
    }

    /* ================= BODY ================= */

    #ModalRegUsuario .modal-body{
        padding:35px 30px;
        background:#f8fafc;
    }

    /* ================= INPUT GROUP ================= */

    #ModalRegUsuario .input-group{
        margin-bottom:22px !important;
        box-shadow:0 4px 12px rgba(15,23,42,0.06);
        border-radius:16px;
        overflow:hidden;
    }

    /* ================= LABELS ================= */

    #ModalRegUsuario .input-group-text{
        background:linear-gradient(135deg,#1e293b,#334155) !important;
        color:#ffffff !important;
        border:none !important;
        font-weight:600;
        min-width:160px;
        justify-content:center;
        font-size:14px;
    }

    /* ================= INPUTS ================= */

    #ModalRegUsuario .form-control,
    #ModalRegUsuario .custom-select{
        border:none !important;
        height:52px;
        font-size:15px;
        color:#334155;
        background:#ffffff;
        box-shadow:none !important;
    }

    #ModalRegUsuario .form-control:focus,
    #ModalRegUsuario .custom-select:focus{
        border:none !important;
        box-shadow:0 0 0 3px rgba(37,99,235,0.15) !important;
    }

    /* ================= FOOTER ================= */

    #ModalRegUsuario .modal-footer{
        border:none;
        padding:22px 28px;
        background:#ffffff;
    }

    /* ================= BOTONES ================= */

    .btn-cancelar{
        background:linear-gradient(135deg,#dc2626,#ef4444) !important;
        color:#ffffff !important;
        border:none !important;
        border-radius:14px !important;
        padding:12px 26px !important;
        font-weight:600;
        transition:0.3s;
    }

    .btn-guardar{
        background:linear-gradient(135deg,#2563eb,#1d4ed8) !important;
        color:#ffffff !important;
        border:none !important;
        border-radius:14px !important;
        padding:12px 30px !important;
        font-weight:600;
        transition:0.3s;
    }

    .btn-cancelar:hover,
    .btn-guardar:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 18px rgba(0,0,0,0.12);
    }

</style>

<form id="FormRegUsuario">

    <div class="modal fade"
         id="ModalRegUsuario"
         tabindex="-1"
         role="dialog"
         aria-labelledby="tituloVentana"
         aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered"
             role="document">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">

                    <h5 class="modal-title" id="tituloVentana">

                        <i class="fa-solid fa-user-plus"></i>

                        Agregar Usuario

                    </h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <!-- USUARIO -->
                            <div class="input-group">

                                <div class="input-group-prepend">

                                    <span class="input-group-text">

                                        <i class="fa-solid fa-user mr-2"></i>

                                        Usuario

                                    </span>

                                </div>

                                <input type="text"
                                       name="usuario"
                                       class="form-control"
                                       placeholder="Ingrese el usuario"
                                       required="ON">

                            </div>

                            <!-- PASSWORD -->
                            <div class="input-group">

                                <div class="input-group-prepend">

                                    <span class="input-group-text">

                                        <i class="fa-solid fa-lock mr-2"></i>

                                        Contraseña

                                    </span>

                                </div>

                                <input type="password"
                                       name="passw"
                                       class="form-control"
                                       placeholder="Ingrese la contraseña"
                                       required="ON">

                            </div>

                            <!-- CORREO -->
                            <div class="input-group">

                                <div class="input-group-prepend">

                                    <span class="input-group-text">

                                        <i class="fa-solid fa-envelope mr-2"></i>

                                        Correo

                                    </span>

                                </div>

                                <input type="text"
                                       name="correo"
                                       class="form-control"
                                       placeholder="Ingrese el correo"
                                       required="ON">

                            </div>

                            <!-- TIPO -->
                            <div class="input-group">

                                <div class="input-group-prepend">

                                    <span class="input-group-text">

                                        <i class="fa-solid fa-user-shield mr-2"></i>

                                        Tipo

                                    </span>

                                </div>

                                <select class="custom-select"
                                        name="tipo">

                                    <option value="0" disabled selected>

                                        Tipo Usuario

                                    </option>

                                    <?php foreach($dataTipo AS $result): ?>

                                        <option value="<?php echo $result['idtipo']; ?>">

                                            <?php echo $result['nombre']; ?>

                                        </option>

                                    <?php endforeach ?>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancelar"
                            data-dismiss="modal">

                        <i class="fa-solid fa-xmark"></i>

                        Cancelar

                    </button>

                    <button class="btn btn-guardar"
                            name="BtnRegProducto">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Guardar

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>
