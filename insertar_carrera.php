<?php
    include 'conexion.php';
    $name=$_POST['name'];
    //echo $name;
    if(empty($_POST['id'])){
        $con=mysqli_query($sql,"INSERT INTO carreras (id_carrera,nom_carrera) VALUES (null,'$name')");
        if(!$con){
            //Echo "Error en consulta";
        }else{
            header('location: conf_carreras.php');
        }

    }else{
        $id_car=$_POST['id'];
        //echo $id_car;
    //$consulta=mysqli_queri($sql,"SELECT id FROM carreras WHERE id_carrera=$_POST['id_car']");
    $consulta=mysqli_query($sql,"UPDATE carreras SET nom_carrera='$name' WHERE id_carrera=$id_car");
    if(!$consulta)
    {

    }
    else{
    
        header('location: conf_carreras.php');
    }

}
?>