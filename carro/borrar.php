<?php 
include 'index.php';
$id=$_POST['id'];
$consulta_cuadrante="select id,nombre,vm,vt,s,d from personas where personas.id=$id;";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>
<center> <br>¿Está seguro de eliminar al siguiente trabajador?<br> <table border=3>
    <td><b> Nombre </b></td><td><b> Viernes Mañana</b></td><td><b> Viernes Tarde </b></td><td><b> Sábado </b></td><td><b> Domingo </b></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>
<form action="borrar2.php" method=POST>
<td> <input name="nombre" readonly="readonly" type="text" value='<?php echo $row['nombre']; ?>'> </td>
<td> <input onclick="return false;" type="checkbox" name="vm" <?php if ($row['vm']==1) { echo "checked"; }; ?>> </td>
<td> <input onclick="return false;" type="checkbox" name="vt" <?php if ($row['vt']==1) { echo "checked"; }; ?>> </td>
<td> <input onclick="return false;" type="checkbox" name="s" <?php if ($row['s']==1) { echo "checked"; }; ?>> </td>
<td> <input onclick="return false;" type="checkbox" name="d" <?php if ($row['d']==1) { echo "checked"; }; ?>> </td>
</table><br>
<input name="id" type="hidden" value='<?php echo $row['id']; ?>'><input type="submit" value="Eliminar al Trabajador"/> </form>
<?php
} 
?>
<br>
  
