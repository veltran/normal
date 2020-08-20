<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login  </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
        <link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="alertify/css/themes/bootstrap.css">
    
</head>

<body>
    <!-- Se va a procesar en
login.php y se enviará por POST, no por GET-->
    <form class="form">
        <!-- Nota: el atributo name es importante, pues lo vamos a recibir de esa manera en PHP --> 
     <input name="usuario" id="usuario" type="text" placeholder="Escribe tu nombre de usuario"> <br><br> <input name="palabra_secreta" id="contra"      type="password" placeholder="Contraseña"> <br><br>
        <!--Lo siguiente envía el formulario--> <input type="button" id="Enviar" value="Iniciar sesión"> 
</form>
</body>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script>
            
                $('#Enviar').click(function(){
            var nombre=document.getElementById('usuario').value;
            var pass=document.getElementById('contra').value;

            var ruta="Nom="+nombre+"&Pass="+pass;
            console.log("mensaje"+ruta);
            $.ajax({
                url:'datos_log.php',
                type:'POST',
                data: ruta,
            })
            .done(function(res){
                location('index.php');
            });
        

        });


        </script>

</html>