$(document).ready(function() {
    $("#docentes").on('click', function() {
        $.getJSON("view_index.php").done(function(datos) {
            console.log(datos);
            $.each(datos, function(items, valor) {
                $("#resultado ul").append("<li>" + valor.id + "</li>");
            });
        });
    });
});