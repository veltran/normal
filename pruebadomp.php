<?php 
session_start();
	$nombre=$_SESSION["usuario"];
	if($nombre== null || $nombre==''){
	//header("location:index.php");
	}
	echo "asigna_horario :". $_SESSION["asigna_h"]."<br>";
	echo "PERIODO :". $_SESSION["idperiodo"]."<br>";
	echo "CARRERA:". $_SESSION["carrera"]."<br>";
	echo "SEMESTRE:".$_SESSION["semestre"]."<br>";
			$carr=0;
			$sem=0;
			$carr=$_SESSION["carrera"];
			$sem=$_SESSION["semestre"];
			$id_as=$_SESSION["asigna_h"];
?>
<style>
.tab_h{
    width:98%;
    text-align: center;  
    border-collapse: collapse;
    font-family: arial;
    font-size:11px;
}
.tab_h,  {
    border: 0px solid white;
}
    .estilo_t{
        text-align:left;
    }
    .fuente{
        
        font-weight:bold;
    }
.table
{
    width:98%;
    border-collapse: collapse;
    font-family: arial;
    text-transform: uppercase;
 
}
#table2,.borderf {
    border: 1px solid black;
    font-size:11px;
}


</style> 
<?php //Fucnion para mostrar materias
    function mostrar_mat($v,$as){
       
        include 'conexion.php';
            $ver=mysqli_query($sql,"  SELECT horarios.id_asigna_m as
            id_as,asigna_materias.id_asigna_h, materias.nom_materia as materia FROM
             horarios,asigna_materias,materias,asigna_bloque_h,bloques_h WHERE 
             horarios.id_asigna_m=asigna_materias.id_asigna_m and
            asigna_materias.id_materia=materias.id_materia and 
              horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and 
              asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h 
           and horarios.id_asigna_bh=$v and asigna_materias.id_asigna_h=$as");

        if(mysqli_num_rows($ver)==0){
        return $mensaje="";
        }else{
            while($row=mysqli_fetch_array($ver)){
                $id_asm=$row["id_as"];
                $des_mat=$row["materia"];
                }
            return $des_mat;
        }
    }
?>

    <div id="head">
       
        
        <table class="tab_h">
            <tr>
                <td style="margin:0px;"> 
                    <div id="logo" style="text-align:left">
                        <img src="img/gob_edomex.png" width="230px" heigt="10px">
                    </div>
                </td>
                <td>
                <div class="estilo_t" >
                    <a>ESCUELA NORMAL DE VALLE DE BRAVO </a></br>
                    <a style="margin-top:1px;"> CLAVE DE CENTRO DE TRABAJO: 15ENL0036U</a></br>
                    <a style="margin-top:1px;"> TURNO DISCONTINUO  </a>    </br>
                    <a style="margin-top:1px;">TELEFONO: 017262623378 </a>  
                </div>
            </td>
                <td >
                    <div>
                        <img src="img/edomex1.png " alt="" style="width:200px; "> 
                    </div>
                </td>
            </tr>
            <tr>
                <td class="estilo_t fuente">
                    <div><a> CICLO ESCOLAR:2020-2021</a>  </div>
                </td>
                <td class="fuente">
                    <div><a> HORARIO POR GRUPO DE ASIGNATURAS O CURSOS CURRICULARES</a></div>
                </td>
                <td>
                    <div></div>
                </td>
            </tr>
            <tr >
                <td class="estilo_t fuente">
                    <div><a >LICENCIATURA EN EZEÑANZA Y APRENDIZAJE </br> DE LA QUIMICA EN EDUCACION SECUNDARIA </a></div>
                </td>
                <td >
                    <div row>
                        <a style="text-align:left;">GRADO: PRIMERO</a> 
                                
                        <a style="text-align:right;">GRUPO:U</a>
                    </div>
                </td>
                <td >
                    
                    <div ><a > SEMESTRE: PRIMERO</a></div>
                </td>
            </tr>
        </table>
    </div>
    
    <div>
        <table class="table" id="table2" >
            <thead class="borderf" >
                <tr class="borderf fuente" style="text-align:center;">
                    <td  class="borderf">HORA</td>
                    <td  class="borderf">LUNES</td>
                    <td  class="borderf">MARTES</td>
                    <td  class="borderf">MIERCOLES</td>
                    <td  class="borderf">JUEVES</td>
                    <td  class="borderf">VIERNES</td>
                </tr>
            </thead>
            <tbody class="borderf" >
                <tr class="borderf">
                    <td  class="borderf">7:00-8:00</td>
                    <td class="borderf">
                        <div>	
                        <?php   
                        $val=200;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=210;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=220;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=230;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=240;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="borderf">8:00-9:00</td>
                    <td>
                        <div>	
                        <?php   
                        $val=201;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=211;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=221;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=231;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=241;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                        <td  class="borderf">9:00-10:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=202;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=212;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=222;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=232;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=242;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                <td  class="borderf">10:00-11:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=203;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=213;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=223;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=233;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=243;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="borderf">11:00-12:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=204;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=214;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=224;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=234;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=244;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="borderf">12:00-13:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=205;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=215;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=225;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=235;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=245;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                    <tr>
                    <td  class="borderf">13:00-14:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=206;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=216;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=226;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=236;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=246;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr><tr>
                <td  class="borderf">14:00 15:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=207;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=217;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=227;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=237;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=247;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="borderf">15:00 16:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=208;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=218;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=228;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=238;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=248;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="borderf">16:00 17:00</td>
                    <td  class="borderf">
                        <div>	
                        <?php   
                        $val=209;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=219;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=229;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                    <div>	
                        <?php   
                        $val=239;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                    <td  class="borderf">
                        <?php   
                        $val=249;
                            echo( mostrar_mat($val,$id_as));
                        ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </br>
    <div>
    <table class="table" id=" table2">
    <thead class=" borderf fuente" style="text-align:center;">
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
        include ('conexion.php');
            $consulta=mysqli_query($sql,"SELECT materias.nom_materia as materia,docentes.tot_horas_clase as horas,
            docentes.nom_docente as docente,categorias.des_cat as cat from asigna_materias,docentes,materias,carreras,semestres,categorias
            where asigna_materias.id_materia=materias.id_materia and asigna_materias.id_docente=docentes.id_docente AND
            docentes.id_cat=categorias.id_cat AND materias.id_carrera=carreras.id_carrera AND
            materias.id_semestre=semestres.id_semestre AND asigna_materias.id_asigna_h=135");
            while($row=mysqli_fetch_array($consulta)){
                $nombre=$row["materia"];
                $hora=$row["horas"];
                $docente=$row["docente"];
                $categoria=$row["cat"];
        ?>
        <tr>
            <td  class="borderf "><?php echo $nombre?></td>
            <td class="borderf "><?php echo $hora?></td>
            <td class="borderf"><?php echo $docente?></td>
            <td class="borderf"><?php echo $categoria?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
    </div>
