<?php 
include 'index.php';
$start=$_POST['start'];

$consulta_cuadrante="delete from asignaciones where fecha>='$start';";
mysqli_query($conexion,$consulta_cuadrante); 
$consulta_cuadrante3="delete from fin_de_semana where fecha>='$start';";
mysqli_query($conexion,$consulta_cuadrante3); 
$escobita="call escoba('$start');";
mysqli_query($conexion,$escobita); 
echo "Las asignaciones desde el $start han sido eliminadas"
?> <br> <form action=index.php method=POST>
<br><input type="submit" value="Aceptar"/> </form>


