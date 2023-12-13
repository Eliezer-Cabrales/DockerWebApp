<?php include 'index.php'; 
?> <form action="obtener.php" method=post> <?php
$seleccionar="select distinct asignaciones.fecha from asignaciones where asignaciones.fecha >= all (select fecha from asignaciones);";


if (mysqli_query($conexion,$seleccionar)){

$resultado=mysqli_query($conexion,$seleccionar);
   $row = mysqli_fetch_assoc ($resultado);
   $fechainicio=date("Y-m-d",strtotime($row['fecha']."+ 1 days"));
   ?> <center> <table> <td><h3> Inserte fecha inicial: </td><td> <input type='date' id='start' name='start' value='<?php echo "$fechainicio"; ?>' min='<?php echo "$fechainicio"; ?>'> </h3>  </td><tr> <?php   
?>
   <td> <h3> Inserte fecha final: </td><td> <input type='date' id='stop' name='stop' value='<?php echo "$fechainicio"; ?>' min='<?php echo "$fechainicio"; ?>'> </h3> </td><tr>

   </table> 
   
   
   
   
   <input type="submit" value="Generar Cuadrante" />  </center> </form>
 <?php
}else{
	echo "<h1>Se ha producido un error, consulte al administrador<h1>";

} ?> 




