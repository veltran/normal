<?php 
    include 'conexion.php';
    $per=$_POST['perfil'];

    if(empty($_POST['id'])){ 
         $con=mysqli_query($sql,"INSERT INTO perfiles (id_perfil,des_perfil)VALUES(null,'$per')");
        if(!$con){
            echo "Error en consulta";
        }
        else{
            header("location:conf_perfil.php");
    
        }
    }
    else{
        $id_per=$_POST['id'];
            //echo $id_per;
        //$consulta=mysqli_queri($sql,"SELECT id FROM carreras WHERE id_carrera=$_POST['id_car']");
        $consulta=mysqli_query($sql,"UPDATE perfiles SET des_perfil='$per' WHERE id_perfil=$id_per");
        if(!$consulta)
        {

        }
        else{
        
            header('location: conf_perfil.php');
        }
    }
?>