

<?php 
  include 'conexion.php';

  // echo "CARRERA:". $_SESSION["carrera"]."<br>";
  // echo "SEMESTRE:".$_SESSION["semestre"]."<br>";
  if ($_SESSION["idperiodo"]=="") {
    $per="";
     // $_SESSION["periodo"]="Septiembre 2020-Febrero 2021";
    $per= "Septiembre 2020-Febrero 2021";
  }else{
    $p="";
    $per="";
    $p=$_SESSION["idperiodo"];
    
    
          $consulta=mysqli_query($sql, "SELECT des_periodo from periodos WHERE periodos.id_periodo=$p");
          while($roow=mysqli_fetch_array($consulta)){
            $per=$roow['des_periodo'];
            
          } 
          if(!$consulta)
          {
              $_SESSION["periodo"]="";
            $_SESSION["periodo"]=$per;
          }else
          {

          }
  }            
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
  </head>
  
  <div class="row ">
    <div class="col-12">
      <div class="row">
        <div class="col-4">
          <img src="img/logo.png">
        </div>
        <div class="col-8">
          <h1>ESCUELA NORMAL DE VALLE DE BRAVO</h1>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="home.php"><img id=""src="img/indice.jpg " width="30px" height="30px" class="" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php"><i class="fas fa-home"></i>Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown " role="button" data-toggle="dropdown" aria_haspopup="true" aria-expanded="false" >
            Malla curricular
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">     
            <a class="dropdown-item" href="view_mallaP.php">Licenciatura en Educación Primaria-2018</a>
             <a class="dropdown-item" href="view_mallaQ.php">Licenciatura en Enseñanza y Aprendizaje de la Química en Educación Secundaria-2018</a>
            <a class="dropdown-item" href="view_mallaB.php">Licenciatura en Educación secundaria enfacis en Biologia  </a>
          </div>
          
        </li>
       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Horarios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Carrera</a>
            <a class="dropdown-item" href="#">Segundo</a>
            <a class="dropdown-item" href="#">Tercero</a>
                  <a class="dropdown-item" href="#">Cuarto</a>
            <a class="dropdown-item" href="#">Quinto</a>
            <a class="dropdown-item" href="#">Sexto</a>
                  <a class="dropdown-item" href="#">Septimo</a>
            <a class="dropdown-item" href="#">Octavo</a>
            <a class="dropdown-item" href="#">Noveno</a>

          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="view_docentes.php">Docentes</a>
        </li>
    <!--     <li class="nav-item">
          <a  class="nav-link" href="">Ciclo escolar</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="view_agregarMaterias.php">Materias</a>
        </li>
        <li clas="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" id="navbarDropdown " role="button" data-toggle="dropdown" aria_haspopup="false" aria-expanded="false" >
            Periodos
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">     
            <a class="dropdown-item" name="formulario" method="post" action="home.php"id="80" href="home.php">Marzo 2020-Agosto2020</a>
             <a class="dropdown-item" id="81"href="home.php">Septiembre 2020-Febrero2021</a>
            <a class="dropdown-item" id="82" href="home.php"> Marzo 2021-Agosto2021 </a>
          </div>
        </li>
        
        </ul>

        <div class="">
          <a class="" ><?php echo $per; ?></a>
        </div>
       
    </div>
     <div clas="nav-item ml-4" >
          <a  class="nav-link text-success" href="logout.php">Salir</a>
        </div>
  </nav>
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>