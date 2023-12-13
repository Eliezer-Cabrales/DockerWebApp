<?php 
include 'index.php';
$fec=$_POST['fec'];
$ses=$_POST['ses'];
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
where persona1=personas.id and persona2=p.id and asignaciones.sesion='$ses' and asignaciones.fecha='$fec';";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>
<center> <br><br> <table border=3>
    <td><b> Fecha </b></td><td><b> Sesión </b></td><td><b> Nombre </b></td><td><b> Nombre</b></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>
<form action="manual3.php" method=POST>
<td> <?php echo $row['fecha']; ?> <input name="fe" type="hidden" value='<?php echo $row['fecha']; ?>'> </td>
<td> <?php echo $row['sesion']; ?> <input name="se" type="hidden" value='<?php echo $row['session']; ?>'></td>





<td> <select name="nom">
<?php $consu="select nombre from personas;";
$cuad=mysqli_query($conexion,$consu); 
$num=mysqli_num_rows ($cuad);
for ($i=0; $i<$num; $i++){

    $row2=mysqli_fetch_assoc ($cuad); ?>
<option value="<?php echo $row2['nombre'] ?>"  <?php if ($row2['nombre']==$row['nombre']) { echo "selected"; }; ?>    

><?php echo $row2['nombre'] ?>

</option> <?php

}?>
</select> </td>




<td> <select name="nom2">
<?php $consu2="select nombre from personas;";
$cuad2=mysqli_query($conexion,$consu2); 
$num3=mysqli_num_rows ($cuad2);
for ($i=0; $i<$num3; $i++){

    $row3=mysqli_fetch_assoc ($cuad2); ?>
<option value="<?php echo $row3['nombre'] ?>"  <?php if ($row3['nombre']==$row['p2']) { echo "selected"; }; ?>    

><?php echo $row3['nombre'] ?>

</option> <?php

}?>
</select> </td>




</table><br>
<input name="id" type="hidden" value='<?php echo $row['id']; ?>'><input type="submit" value="Aceptar"/> </form>
<?php
} 
?>
<br>
  