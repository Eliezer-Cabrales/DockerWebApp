<?php include 'index.php'; 
?> 
<p> Elimine un registro desde una fecha para rehacer el cuadrante </p><br>
<form action="elimina2.php" method=post> <?php
$seleccionar="select fecha from asignaciones where fecha >= all (select fecha from asignaciones);";
$seleccionar2="select fecha from asignaciones where fecha <= all (select fecha from asignaciones);";

$inicio=mysqli_query($conexion,$seleccionar2);
$linea = mysqli_fetch_assoc ($inicio);
$fechainicial=date("Y-m-d",strtotime($linea['fecha']."- 1 days"));

if (mysqli_query($conexion,$seleccionar)){
$resultado=mysqli_query($conexion,$seleccionar);
   $row = mysqli_fetch_assoc ($resultado);
   $fechafinal=date("Y-m-d",strtotime($row['fecha']."- 1 days"));


   ?> <center> <table> <td><h3> Inserte la fecha desde donde quiere rehacer el cuadrante </td>
   <td> <input type='date' id='start' name='start' value='<?php echo "$fechafinal"; ?>' min='<?php echo "$fechainicial"; ?>' max='<?php echo "$fechafinal"; ?>' > </h3>  </td><tr> <?php   
?>
   </table> 
   
   
   

   <input type="submit" value="Eliminar Asignaciones" />  </center> </form>
 <?php
}else{
	echo "<h1>Se ha producido un error, consulte al administrador<h1>";

} ?> 

