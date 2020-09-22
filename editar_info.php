<?php
    include 'conexion.php';
    $id=$_POST['id'];
    $tit=$_POST['tit'];
    $nom=$_POST['nom'];
    $desc=$_POST['desc'];
    if(empty($id))
    {

    }
    else{
        $con=mysqli_query($sql,"UPDATE datos_horario SET titulo='$tit',nombre_responsable='$nom',desc_puesto='$desc' WHERE id_dato=$id");
        if(!$con)
        {
            echo "Error en consulta";
        }else{
            header('location: conf_carreras.php');
        }

    }
    

?>