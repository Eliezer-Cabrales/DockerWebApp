<?php 
include 'index.php';
$start=$_POST['start'];
$stop=$_POST['stop'];
$consulta_cuadrante="select asignaciones.fecha, CASE sesion
WHEN 'vms' THEN 'Viernes Mañana - San Roque 10:30 - 12:30'
WHEN 'vmp' THEN 'Viernes Mañana - Palmones 10:30 - 12:30'
WHEN 'vts' THEN 'Viernes Tarde - San Roque 17:15 - 19:15'
WHEN 'vtp' THEN 'Viernes Tarde - Palmones 17:15 - 19:15'
WHEN 'ss' THEN 'Sábado - San Roque 10:30 - 12:30'
WHEN 'sp' THEN 'Sábado - Palmones 10:30 - 12:30'
WHEN 'ds' THEN 'Domingo - San Roque 10:30 - 12:30'
WHEN 'dp' THEN 'Domingo - Palmones 10:30 - 12:30'
ELSE 'Otro Sitio'
END AS sesion, personas.nombre, personas2.nombre2
from asignaciones, personas, (select personas.id, personas.nombre as 'nombre2' from personas) as personas2 
where asignaciones.persona1=personas.id and asignaciones.persona2=personas2.id and asignaciones.fecha between '$start' and '$stop';";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>
<center> <br><br> <table border=3 id="tabla_cuadrante">
    <td><h2> Fecha </h2></td><td><h2> Puesto y Horario</h2></td><td><h2> Hermano </h2></td><td><h2> Hermano </h2></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>

<td><h3> <?php echo $row['fecha']; ?> </h3></td><td><h3> <?php echo $row['sesion']; ?> </h3></td><td><h3> <?php echo $row['nombre']; ?> </h3></td><td><h3> 
    <?php echo $row['nombre2']; ?> </h3></td><td><h3> BORRAR </h3></td><tr> <td><h3> Borrar> </h3></td>
    

<?php
}
?>