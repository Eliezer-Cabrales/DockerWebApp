<?php 
include 'index.php';
$id=$_POST['id'];
$consulta_cuadrante="select id,case sexo when '0' then 'Hombre' ELSE 'Mujer' END as sexo,nombre,vm,vt,s,d,ultima from personas where personas.id=$id;";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante)?>
<center> <br><br> <table border=3>
    <td><b> Nombre </b></td><td><b> Género </b></td><td><b> Viernes Mañana</b></td><td><b> Viernes Tarde </b></td><td><b> Sábado </b></td><td><b> Domingo </b></td>
    <td><b> Fecha de última vez </b></td><tr><?php

    for ($i=0; $i<$num_filas; $i++){

$row=mysqli_fetch_assoc ($cuadrante);
?>
<form action="editar2.php" method=POST>
<td> <input name="nombre" type="text" value='<?php echo $row['nombre']; ?>'> </td>
<td> <select name="sexo">
  <option value="0">Hombre</option>
  <option value="1" <?php if ($row['sexo']=="Mujer") { echo "selected"; }; ?>>Mujer</option>
</select> </td>
<td> <input type="checkbox" name="vm" <?php if ($row['vm']==1) { echo "checked"; }; ?>> </td>
<td> <input type="checkbox" name="vt" <?php if ($row['vt']==1) { echo "checked"; }; ?>> </td>
<td> <input type="checkbox" name="s" <?php if ($row['s']==1) { echo "checked"; }; ?>> </td>
<td> <input type="checkbox" name="d" <?php if ($row['d']==1) { echo "checked"; }; ?>> </td>
<td> <input name="ultima" type="date" value='<?php echo $row['ultima']; ?>'> </td>
</table><br>
<input name="id" type="hidden" value='<?php echo $row['id']; ?>'><input type="submit" value="Aceptar"/> </form>
<?php
} 
?>
<br>
  