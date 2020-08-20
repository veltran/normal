<div class="row">
	<div class="col-sm-12">
		<table id="tDocentes" class="table table-hover table-condensed table-bordered">
			<thead style="background-color: #a1c207; color:white; font-weight: bold;">
			<tr>
				<!-- <td>#</td> -->
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Apellido</td>
				<td>Perfil</td>
				<td>Categorias</td>
			</tr>
			</thead>
			<?php
				include('conexion.php');
				$result=mysqli_query($sql," SELECT id_docente,nom_docente,ap_paterno,ap_materno,des_perfil,des_cat from docentes,perfiles,categorias where docentes.id_perfil=perfiles.id_perfil and docentes.id_cat=categorias.id_cat ;");
			?>
			<?php foreach ($result as $key => $row) : ?>
			<tr 
				draggable="true" id="<?php
				 	echo $row['nom_docente'],
				 		 $row['ap_paterno'], 
				 		 $row['ap_materno']; 
				 		?>"
			  	class="arrastrar" 	>

				<td class="u"  > <?php echo $row['nom_docente']; ?>
						
					</td>
				<!-- <td ><?php //echo $row['nom_docente'];?></td> -->
				<td ><?php echo $row['ap_paterno'];?></td>
				<td ><?php echo $row['ap_materno'];?></td>
				<td ><?php echo $row['des_perfil'];?></td>
				<td ><?php echo $row['des_cat'];?></td>
				
				
			</tr>
			<?php endforeach; ?>
		</table>
	</div>

</div>

<script>
	$(document).ready(function(){
		$('#tdocentes').DataTable();
	});
	$(document).ready(function(){
		$('#tDocentes').DataTable();
	});
</script>