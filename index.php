<?php 
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_index.css">
		<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
        
	</head>
	<body>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 m-1">
                <div class="col-md-4 formulario">
                    <form method="POST">
                        <div class="form-group text-center  pt-3">
                                <h1 class="text-light"> 
                                  INICIAR SESIÓN
                                </h1>
                                <div class="form-group mx-sm-4 pt-3">
                                    <input type="text"  id="caja1" name="usuario" class=" text-white form-control" placeholder="Ingrese su usuario" required>
                                </div> 
                                <div class="form-group mx-sm-4 pt-3 ">

                                    <input type="Password" id="caja2" type="password" name="password" class="form-control text-white" placeholder="Ingrese su password" required>
                                </div>
                                <div class="from-group mx-sm-4 pb-5">
                                    <input id="enviar" type="button" class="btn btn-block ingresar" value="INGRESAR" >
                                </div>
                                
                        </div>
                    <form>
                </div>
            </div>n
        </div>

	</body>
         <script type="text/javascript" src="js/jquery.js"></script>
         <script type="text/javascript" src="librerias/alertify/alertify.js"></script>
        <script type="text/javascript">
            $('#enviar').click(function(){
                var nombre=document.getElementById('caja1').value;
                var password=document.getElementById('caja2').value;

                var ruta="usuario="+nombre+"&password="+password;
                $.ajax({
                    url:'validar.php',
                    type:'POST',
                    data:ruta,
                }).done(function(res){console.log(res);
                    if(res=="exito"){

                       // window.location.replace('normal/home.php');
                        $(location).attr('href','home.php');
                    }
                    else{
                        alertify.error(""+" "+res);
                    }
                });

            });
        </script>
</html>