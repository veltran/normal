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
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_index.css">
	</head>
	<body>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 m-1">
                <div class="col-md-4 formulario">
                    <form action="validar.php ?>" method="POST"">
                        <div class="form-group text-center  pt-3">
                                <h1 class="text-light">
                                  INICIAR SESIÓN 
                                </h1>
                                <div class="form-group mx-sm-4 pt-3">
                                    <input type="text"  id="caja1" name="usuario" class=" text-white form-control" placeholder="Ingrese su usuario">
                                </div>
                                <div class="form-group mx-sm-4 pt-3">
                                    <input type="Password" type="password" name="password" class="form-control text-white" placeholder="Ingrese su password">
                                </div>
                                <div class="from-group mx-sm-4 pb-5">
                                    <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
                                </div>
                                
                        </div>
                    <form>
                </div>
            </div>
        </div>

	</body>
         <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="librerias/datatable/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
 	        function registrar(){
 		    window.location="login_registrar.php";
    	}
        </script>
</html>