<?php 
    include 'conexion.php';
    $cat=$_POST['categoria'];

    if(empty($_POST['id'])){ 
        $con=mysqli_query($sql,"INSERT INTO categorias (id_cat,des_cat)VALUES(null,'$cat')");
                if(!$con){
                    echo "Error en consulta";
                }
                else{
                    header("location:conf_categorias.php");
            
                }
    }
    else{
        $id_cat=$_POST['id'];
        //echo $id_cat;
    //$consulta=mysqli_queri($sql,"SELECT id FROM carreras WHERE id_carrera=$_POST['id_car']");
    $consulta=mysqli_query($sql,"UPDATE categorias SET des_cat='$cat' WHERE id_cat=$id_cat");
    if(!$consulta)
    {

    }
    else{
    
        header('location: conf_categorias.php');
    }

    }

?>