<?php
    include 'conexion.php';
    $name=$_POST['grupo'];
    //echo $name;
    if(empty($_POST['id'])){
        $con=mysqli_query($sql,"INSERT INTO grupos (id_grupo,des_grupo) VALUES (null,'$name')");
        if(!$con){
            //Echo "Error en consulta";
        }else{
            header('location: conf_grupos.php');
        }

    }else{
        $id_gr=$_POST['id'];
        //echo $id_car;
    //$consulta=mysqli_queri($sql,"SELECT id FROM carreras WHERE id_carrera=$_POST['id_car']");
    $consulta=mysqli_query($sql,"UPDATE grupos SET des_grupo='$name' WHERE id_grupo=$id_gr");
    if(!$consulta)
    {

    }
    else{
    
        header('location: conf_grupos.php');
    }

}
?>