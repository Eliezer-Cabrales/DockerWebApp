<?php 
include 'index.php';

$consulta_cuadrante="delete from asignaciones;";
mysqli_query($conexion,$consulta_cuadrante); 
$consulta_cuadrante3="delete from fin_de_semana;";
mysqli_query($conexion,$consulta_cuadrante3); 
$escobita="update personas set ultima = '1-1-1';";
mysqli_query($conexion,$escobita); 
echo "La Base de datos ha sido restablecida"
?> <br> <form action=index.php method=POST>
<br><input type="submit" value="Aceptar"/> </form>