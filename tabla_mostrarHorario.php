<!-- Funcion apara llenar el horario -->
<?php 	
include ("conexion.php");
$Periodo=$_POST['Per'];
$Carrera=$_POST['Car'];
$Semestre=$_POST['Sem'];
$id_gr=$_POST['Gr'];					$arreglo= array();

    $c=mysqli_query($sql,"SELECT asigna_horario.id_asigna_h as asignah FROM asigna_horario WHERE
     asigna_horario.id_periodo=$Periodo AND asigna_horario.id_carrera=$Carrera And
      asigna_horario.id_semestre=$Semestre ");
   if(mysqli_num_rows($c)==0){
    //echo "llego aqui";
    }else{	
       while($row=mysqli_fetch_array($c)){
													
        $id_as=$row["asignah"];
        
        }
}
	function consulta($v,$as,$gr ){
			$queri="  SELECT horarios.id_asigna_m as
			id_as,asigna_materias.id_asigna_h, materias.nom_materia as materia FROM
			horarios,asigna_materias,materias,asigna_bloque_h,bloques_h WHERE 
			horarios.id_asigna_m=asigna_materias.id_asigna_m and
			asigna_materias.id_materia=materias.id_materia and 
			horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and 
			asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h 
			and horarios.id_asigna_bh=$v and asigna_materias.id_asigna_h=$as AND asigna_materias.id_grupo=$gr";
			return $queri;
	}
	?>
	<table id="right" class="table table-striped table-bordered ">
			<colgroup>
				<col width="100"/>
				<col width="180"/>
				<col width="180"/>
				<col width="180"/>
				<col width="180"/>
				<col width="180"/>
				<col width="180"/>
			</colgroup>
		<thead class="table-primary" style="background-color: #007bff; color:white; font-weight: bold;">
			<tr>
				<td class="redips-mark">hora</td>
				<td class="redips-mark">Lunes</td>
				<td class="redips-mark">Martes</td>
				<td class="redips-mark">Miercoles</td>
				<td class="redips-mark">Jueves</td>
				<td class="redips-mark">Viernes</td>
				<td class="redips-mark text-center">Eliminar</td>
			</tr>
		</thead>
		<tbody >
			<tr>
				<td class="redips-mark " id="hora">7:00-8:00</td>
				<td>
				<?php
				$val=200;
				$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
				// var_dump($ver);
				if(mysqli_num_rows($ver)==0){
				}else{	
				while($row=mysqli_fetch_array($ver)){
				
					$id_asm=$row["id_as"];
					$des_mat=$row["materia"];
					}
				?>
				<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
				<?php
				echo $des_mat;
					}	
			?>
				</div>
			</td>
				<td>
				<?php
				$val=210;
				$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
				// var_dump($ver);
				if(mysqli_num_rows($ver)==0){
					//echo "llego aqui";
				}else{	
				while($row=mysqli_fetch_array($ver)){
					$id_asm=$row["id_as"];
					$des_mat=$row["materia"];
					}
				?>
				<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
				<?php
				echo $des_mat;
					}	
			?>
				</div>
				</td>
				<td>
				<?php
				
				$val=220;
				$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
				// var_dump($ver);
				if(mysqli_num_rows($ver)==0){
					//echo "llego aqui";
				}else{	
				while($row=mysqli_fetch_array($ver)){
					$id_asm=$row["id_as"];
					$des_mat=$row["materia"];
					}
				?>
				<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
				<?php
				echo $des_mat;
					}	
			?>
				</div>
				</td>
					<td>
						<?php
							$val=230;
							$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
							if(mysqli_num_rows($ver)==0){
							}else{	
							while($row=mysqli_fetch_array($ver)){
								$id_asm=$row["id_as"];
								$des_mat=$row["materia"];
								}
							?>
							<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
							<?php
							echo $des_mat;
								}	
						?>
					</div>
				</td>
				<td>
				<?php
							$val=240;
							$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
							if(mysqli_num_rows($ver)==0){
							}else{	
							while($row=mysqli_fetch_array($ver)){
								$id_asm=$row["id_as"];
								$des_mat=$row["materia"];
								}
							?>
							<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
							<?php
							echo $des_mat;
								}	
						?>
					</div>
				</td>
				<td rowspan="10"  class="redips-trash " title="Trash" style="text-align:center;"><i  class="far fa-trash-alt" style="color:red; font-size: 40px;padding-top:200px;"></i>
				</td>
				
			</tr> 
			<tr>
				<td class="redips-mark dark">8:00-9:00</td>
				<td>
					<?php
							$val=201;
							$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
							if(mysqli_num_rows($ver)==0){
							}else{	
							while($row=mysqli_fetch_array($ver)){
								$id_asm=$row["id_as"];
								$des_mat=$row["materia"];
								}
							?>
							<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
							<?php
							echo $des_mat;
								}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=211;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=221;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=231;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=241;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="redips-mark dark">9:00-10:00</td>
				<td>
					<?php
						$val=202;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=212;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=222;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=232;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=242;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
						<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="redips-mark dark">10:00-11:00</td>
				<td>
					<?php
						$val=203;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=213;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=223;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=233;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=243;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="redips-mark dark">11:00-12:00</td>
				<td>
					<?php
						$val=204;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=214;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=224;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=234;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>													
				</td>
				<td>
					<?php
						$val=244;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
			<td class="redips-mark dark">12:00-13:00</td>
				<td>
					<?php
						$val=205;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
				<?php
						$val=215;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=225;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=235;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=245;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="redips-mark dark">13:00-14:00</td>
				<td>
					<?php
						$val=206;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
				<?php
						$val=216;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=226;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
				<?php
						$val=236;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=246;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			
			</tr>
			<tr>
				<td class="redips-mark dark">14:00-15:00</td>
				<td>
					<?php
						$val=207;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=217;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=227;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=237;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=247;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
			<td class="redips-mark dark">15:00-16:00</td>
				<td>
					<?php
						$val=208;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=218;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=228;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=238;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=248;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="redips-mark dark">16:00-17:00</td>
				<td>
					<?php
						$val=209;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=219;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=229;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
				<?php
						$val=239;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
				<td>
					<?php
						$val=249;
						$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
						if(mysqli_num_rows($ver)==0){
						}else{	
						while($row=mysqli_fetch_array($ver)){
							$id_asm=$row["id_as"];
							$des_mat=$row["materia"];
							}
						?>
					<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
						<?php
						echo $des_mat;
							}	
						?>
					</div>
				</td>
			</tr>
			<?php 
			?>
		</tbody>
		<tfoot>
			<tr></tr>
		</tfoot>
	</table>
	<div id="tabla_info">
		<?php include('tabla_infoMAt.php'); ?>
	</div>
