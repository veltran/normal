<div class="row">
	<div class="col-sm-12">

		
		<table class="table table-hover table-condensed table-bordered">
			
			
			<thead style="background-color: #007bff; color:white; font-weight: bold;">
			<tr>
				<td>#</td>
				<td>Semestre 1</td>
				<td>Semestre 2</td>
				<td>Semestre 3 </td>
				<td>Semestre 4 </td>
				<td>Semestre 5 </td>
				<td>Semestre 6 </td>
				<td>Semestre 7 </td>
				<td>Semestre 8 </td>
			</tr>
						
			</thead>
			
			<?php
				include('conexion.php');
				$result=mysqli_query($sql,"select * from docentes");
				
				
			
			?>
			
			<?php foreach ($result as $key => $row) : ?>
			<tr>
				<td><?php echo $row['id_docente'];?></td>
				<td><?php echo $row['nom_docente'];?></td>
				<td><?php echo $row['ap_paterno'];?></td>
				<td><?php echo $row['ap_materno'];?></td>
				<td><?php echo $row['id_perfil'];?></td>
				<td><?php echo $row['id_categoria'];?></td>
				<td><?php echo $row['nombramiento'];?></td>
				<td style="text-align:center;">
					<button type="button" class="btn btn-warning btn-xm" 
					data-toggle="modal" 
					data-target="#ModalEditar" 

						data-id="<?php echo $row['id_docente']; ?>" 
						data-nombre="<?php echo $row['nom_docente']; ?>" 
						data-ap="<?php echo $row['ap_paterno']; ?>" 
						data-materno="<?php echo $row['ap_materno']; ?>" 
						data-perfil="<?php echo $row['id_perfil']; ?>" 
						data-cat="<?php echo $row['id_categoria']; ?>" 
						data-nombra="<?php echo $row['nombramiento'];  ?>">
						<span class="">
							<i class="far fa-edit  text-white"></i>
						</span>
					</button>
				</td>
				<td style="text-align:  center;">
					<form action="eliminardoc.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $row['id_docente']; ?>">
						<button id="eliminar" class="btn btn-danger btn-xm" >
							<span class="fa fa-trash"></span>
						</button>	
					</form>
					
				</td>
				
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>