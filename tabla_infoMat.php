<?php include('conexion.php');?>
<table class="table table-hover thead-dark">
    <thead class=" ">
        <tr>
            <td>
                ASIGNATURA O CURSO
            </td>
            <td>
                NO. DE HORAS
            </td>
            <td>DOCENTE</td>
            <td>NOMBRAMIENTO B-S-I</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $consulta=mysqli_query($sql,"SELECT materias.nom_materia as materia,docentes.tot_horas_clase as horas,
            docentes.nom_docente as docente,categorias.des_cat as cat from asigna_materias,docentes,materias,carreras,semestres,categorias
            where asigna_materias.id_materia=materias.id_materia and asigna_materias.id_docente=docentes.id_docente AND
            docentes.id_cat=categorias.id_cat AND materias.id_carrera=carreras.id_carrera AND
            materias.id_semestre=semestres.id_semestre AND asigna_materias.id_asigna_h=$id_as ");
            while($row=mysqli_fetch_array($consulta)){
                $nombre=$row["materia"];
                $hora=$row["horas"];
                $docente=$row["docente"];
                $categoria=$row["cat"];
        ?>
        <tr>
            <td><?php echo $nombre?></td>
            <td><?php echo $hora?></td>
            <td><?php echo $docente?></td>
            <td><?php echo $categoria?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>