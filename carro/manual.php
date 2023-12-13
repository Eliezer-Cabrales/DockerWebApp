<?php 
include 'index.php';
$start=$_POST['start'];
$consulta_cuadrante="select asignaciones.fecha, asignaciones.sesion as 'session', personas.nombre, p.p2, CASE sesion
WHEN 'vms' THEN 'Viernes Mañana - San Roque 10:30 - 12:30'
WHEN 'vmp' THEN 'Viernes Mañana - Palmones 10:30 - 12:30'
WHEN 'vts' THEN 'Viernes Tarde - San Roque 17:15 - 19:15'
WHEN 'vtp' THEN 'Viernes Tarde - Palmones 17:15 - 19:15'
WHEN 'ss' THEN 'Sábado - San Roque 10:30 - 12:30'
WHEN 'sp' THEN 'Sábado - Palmones 10:30 - 12:30'
WHEN 'ds' THEN 'Domingo - San Roque 10:30 - 12:30'
WHEN 'dp' THEN 'Domingo - Palmones 10:30 - 12:30'
ELSE 'Otro Sitio'
END AS sesion
from asignaciones, personas, (select id, nombre as p2 from personas) as p
where persona1=personas.id and persona2=p.id and asignaciones.fecha>='$start';";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>
<center> <br><table border=3>
    <td><b> Fecha </b></td><td><b> Nombre </b></td><td><b> Nombre </b></td><td><b> Sesión</b></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>

<td> <?php echo $row['fecha']; ?> </td><td> <?php echo $row['nombre']; ?> </td><td> <?php echo $row['p2']; ?> </td><td> <?php echo $row['sesion']; ?> </td>
     <td><form action="manual2.php" method=post> <input name="ses" type="hidden" value='<?php echo $row['session']; ?>'><input name="fec" type="hidden" value='<?php echo $row['fecha']; ?>'><input type="submit" value="EDITAR"/> </form></td>  
    <tr>
    

<?php
} 
?></table>