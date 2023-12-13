<?php 
include 'index.php';
$consulta_cuadrante="select id,nombre,ultima,
case sexo when '0' then 'Hombre' ELSE 'Mujer' END as sexo, CASE vm
WHEN '0' THEN 'No'
WHEN '1' THEN 'Sí'
ELSE '???'
END AS 'vm',
CASE vt
WHEN '0' THEN 'No'
WHEN '1' THEN 'Sí'
ELSE '???'
END AS 'vt',
CASE s
WHEN '0' THEN 'No'
WHEN '1' THEN 'Sí'
ELSE '???'
END AS 's',
CASE d
WHEN '0' THEN 'No'
WHEN '1' THEN 'Sí'
ELSE '???'
END AS 'd'
from personas;";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>

<center> <br><form action="anadir.php" method=post> <input type="submit" value="AÑADIR NUEVO PUBLICADOR"/> </form> <br> 

<table border=3>
    <td><b> Nombre </b></td><td><b> Género </b></td><td><b> Fecha última vez </b></td><td><b> Viernes Mañana</b></td><td><b> Viernes Tarde </b></td><td><b> Sábado </nb></td><td><b> Domingo </nb></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>

<td> <?php echo $row['nombre']; ?> </td><td> <?php echo $row['sexo']; ?> </td><td> <?php echo $row['ultima']; ?> </td><td> <?php echo $row['vm']; ?> </td><td> <?php echo $row['vt']; ?> </td><td> 
    <?php echo $row['s']; ?> </td>   <td> <?php echo $row['d']; ?> </td> 
     <td><form action="editar.php" method=post> <input name="id" type="hidden" value='<?php echo $row['id']; ?>'><input type="submit" value="EDITAR"/> </form></td>  
     <td><form action="borrar.php" method=post> <input name="id" type="hidden" value='<?php echo $row['id']; ?>'><input type="submit" value="BORRAR"/> </form></td>
    <tr>
    

<?php
} 
?></table>
