<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	if($nombre== null || $nombre==''){
		header("location:index.php");
	}
 ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configuración</title>
	
</head>
<style>
    .conf{
        font-size:70px;
    }
    #us{
        color:#b10e09;
    }
    #car{
 color:#62a714;
    }
    #mat{
 color:#ff7900;
    }
    #gr{
 color:#712066;
    }
    #in{

    }
    #doc{
 color:#b10e09;
    }
    .conf:hover { color: white; } /* CSS link hover (green) */
</style>
<body>
	<?php
		include ('header.php');
	?>
		
	<div id="contenido" class=" container mt-2">
			<!-- contenido -->
				<div class="bg-light  m-2">
					<div class="justify-content-center text-center">
                        <h4>Ajustes</h4>
                        <br>
				        <table class="table ml-2 mr-2 " >
                            <tbody class="border border-0">
                                <tr class="border border-0">
                                    <td class="border border-0">
                                        <div class="conf" >
                                            <a href="" id="us"> 
                                            <i class="fas fa-user " > </i>
                                            </a>
                                        </div>Usuario
                                    </td>
                                    <td class="border border-0">
                                        <div class="conf">
                                        <a href="conf_carreras.php" id="car"> 
                                                <i class="fas fa-graduation-cap " style="">
                                                </i>
                                            </a>
                                        </div>
                                        Carreras
                                    </td>
                                    
                                    <td class="border border-0">
                                        <div class="conf">
                                        <a href="" id="mat">
                                            <i class="fas fa-book-open"></i>
                                        </a>
                                        </div>
                                        Materias 
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="conf">
                                    <a href="" id="gr">
                                        <i class="fas fa-users"></i>
                                    </a></div>    Grupos</td>
                                    <td>
                                    <div class="conf">
                                        <a href="conf_info.php" id="in">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        </div>Info
                                    </td>
                                    <td>
                                    <div class="conf">
                                    <a href="view_docentes.php" id="doc">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </a></div>    Docentes</td>
                                </tr>
                            </tbody>        
                        </table>
					</div>
				</div>
		</div>
	</div>
		
	<!-- <?php
		include('view_footer.php');
	?> -->
</body>
	
</html>

