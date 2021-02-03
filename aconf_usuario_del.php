<?php 
     if(isset($_POST['id'])){
        $id=$_POST['id'];
        include "conexion.php";
        $con=mysqli_query($sql,"DELETE FROM usuarios WHERE usuarios.id_usu=$id");
        if(!$con){
            echo "Error de query";

        }
        else{
            
            header('location:conf_usuarios.php');
        }
     }



?>