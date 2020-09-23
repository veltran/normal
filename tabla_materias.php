<?php 
    $id_car=$_POST['Car'];
    $id_sem=$_POST['Sem'];

?>
<table class="table table-hover table-striped mr-4">
    <thead class="bg-success text-white">
        <tr>
            <td>Nombre de materia</td>
            <td>Editar</td>                                
        </tr>
    </thead>
    <tbody>
        <?php include 'conexion.php';
            $cueri=mysqli_query($sql,"SELECT `id_materia`, `nom_materia` FROM `materias` WHERE `id_semestre`=$id_sem AND `id_carrera`=$id_car");
            while($row=mysqli_fetch_array($cueri)){
                    $id_mat=$row['id_materia'];
                    $nom_mat=$row['nom_materia'];
                ?>
                <tr>
                    <td id="<?php echo $id_mat; ?>">
                        <?php echo $nom_mat;?>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary" 
                        data-toggle="modal"
                        data-target="#ModalEditarMateria"
                        data-id="<?php echo $id_mat; ?>"
                        data-nombre="<?php echo $nom_mat; ?>"
                        >
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                </tr>      
                <?php     
            }
        ?>
    </tbody>
</table>