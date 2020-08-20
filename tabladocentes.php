<div class="row">
	<div class="col-sm-12">

		
		<table id="tDocentes"class="table table-hover table-condensed table-bordered">
			
			
			<thead style="background-color: #007bff; color:white; font-weight: bold;">
			<tr>
				<td>#</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Apellido m</td>
				<td>Perfil</td>
				<td>Categoria</td>
						
				<td>Editar</td>
				<td>Eliminar</td>
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
				<td><?php echo $row['des_perfil'];?></td>
				<td><?php echo $row['id_cat'];?></td>
				
				<td style="text-align:center;">
					<button type="button" class="btn btn-warning btn-xm" 
					data-toggle="modal" 
					data-target="#ModalEditar" 

						data-id="<?php echo $row['id_docente']; ?>" 
						data-nombre="<?php echo $row['nom_docente']; ?>" 
						data-ap="<?php echo $row['ap_paterno']; ?>" 
						data-materno="<?php echo $row['ap_materno']; ?>" 
						data-perfil="<?php echo $row['id_perfil']; ?>" 
						data-cat="<?php echo $row['id_cat']; ?>"  >
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

