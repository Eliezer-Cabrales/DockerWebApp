<?php 
include 'index.php'; ?>
<form action="anadir2.php" method=POST>
<center><table border=3>
<td><b> Nombre </b></td><td><b> Género </b></td><td><b> Viernes Mañana</b></td><td><b> Viernes Tarde </b></td><td><b> Sábado </b></td><td><b> Domingo </b></td><td><b> Última Vez </b></td><tr>
<td> <input name="nombre" type="text"> </td>
<td> <select name="sexo">
  <option value="0">Hombre</option>
  <option value="1">Mujer</option>
</select> </td>
<td> <input type="checkbox" name="vm"> </td>
<td> <input type="checkbox" name="vt"> </td>
<td> <input type="checkbox" name="s"> </td>
<td> <input type="checkbox" name="d"> </td>
<td> <input type="date" name="ultima"> </td>
</table><br>
<input type="submit" value="Añadir Personal"/>
</form><center>
