<?php include 'index.php'; 
$start=$_POST['start'];
$stop=$_POST['stop'];
$call_fecha="call fechacarro('$start','$stop');";
$barrido="delete from asignaciones where fecha>=$start";
$call_asig="call asig();";
mysqli_query($conexion,$call_fecha);
mysqli_query($conexion,$barrido);
mysqli_query($conexion,$call_asig);
?>
<p> Informe generado, para obtener el documento pulse en <a href="escoge.php">Obtener Cuadrante</a> </p>