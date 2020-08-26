
<style>
table
{
    width:98%;
    border-collapse: collapse;
}
tr, td /* Asigna un borde a las etiquetas td Y th */
{
   
    border: 2px solid black;
}
thead{
    text-aling:center;
}

</style>
<?php
    function mostrar_mat($v){
       
        include 'conexion.php';
            $ver=mysqli_query($sql," SELECT  horarios.id_asigna_m as id_as,horarios.id_horario,
        bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia 
        FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE
        horarios.id_asigna_m=asigna_materias.id_asigna_m and
        asigna_materias.id_materia=materias.id_materia and 
        horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and 
        asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h
        and horarios.id_asigna_bh=$v");

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
<table class="table" id="table2" >
        <thead class="" >
            <tr>
                <td>HORA</td>
                <td>LUNES</td>
                <td>MARTES</td>
                <td>MIERCOLES</td>
                <td>JUEVES</td>
                <td>VIERNES</td>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td>7:00-8:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=200;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=210;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=220;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=230;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=240;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                 <td>8:00-9:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=201;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=211;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=221;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=231;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=241;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                    <td>9:00-10:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=202;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=212;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=222;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=232;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=242;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
            <td>10:00-11:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=203;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=213;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=223;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=233;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=243;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>11:00-12:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=204;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=214;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=224;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=234;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=244;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>12:00-13:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=205;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=215;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=225;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=235;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=245;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
                <tr>
                <td>13:00-14:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=206;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=216;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=226;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=236;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=246;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr><tr>
            <td>14:00 15:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=207;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=217;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=227;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=237;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=247;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>15:00 16:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=208;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=218;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=228;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=238;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=248;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>16:00 17:00</td>
                <td>
                    <div>	
                    <?php   
                    $val=209;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=219;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=229;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                <div>	
                    <?php   
                    $val=239;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>
                <td>
                    <?php   
                    $val=249;
                        echo( mostrar_mat($val));
                    ?>
                    </div>
                </td>

            </tr>
            
        </tbody>
    </table>