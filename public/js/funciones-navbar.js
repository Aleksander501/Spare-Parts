$(document).ready(function() {
    /* Botón Salir*/
    $("a.salir").click(function(e) {
        alertify.confirm('Cerrar Sesión', 'Seguro/a en cerrar sesión', 
        function()
        { 
            $("#data").load("./index.php?off=1");
            setTimeout(function(){window.location.href = "./index.php";}); 
        }
        , function(){ 
            alertify.error('Cierre Cancelado...');
        });
       e.preventDefault();
    });
});