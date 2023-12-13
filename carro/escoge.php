<?php include 'index.php'; 
?> <form action="generar2.php" method=post> <?php
$primero="select distinct asignaciones.fecha from asignaciones where asignaciones.fecha <= all (select fecha from asignaciones);";
$ultimo="select distinct asignaciones.fecha from asignaciones where asignaciones.fecha >= all (select fecha from asignaciones);";

$prim=mysqli_query($conexion,$primero);
$ult=mysqli_query($conexion,$ultimo);
   $pr = mysqli_fetch_assoc ($prim);
   $p=$pr['fecha'];

    $ul= mysqli_fetch_assoc ($ult);
    $u=$ul['fecha'];
   ?> <center> <table> <td><h3> Inserte fecha inicial: </td><td> <input type='date' id='start' name='start' value='<?php echo "$p"; ?>' min='<?php echo "$p"; ?>'> </h3>  </td><tr> <?php   
?>
   <td> <h3> Inserte fecha final: </td><td> <input type='date' id='stop' name='stop' value='<?php echo "$u"; ?>'> </h3> </td><tr>
    
   </table> 
   
   
   
   
   <input type="submit" value="Obtener Cuadrante" />  </center> </form>
 


