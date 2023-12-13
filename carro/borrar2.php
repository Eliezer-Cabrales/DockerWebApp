<?php 
include 'index.php';
$id=$_POST['id'];
$consulta_cuadrante="delete from personas where id=$id";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
?> El trabajador ha sido eliminado, es decir, de la base de datos, no lo hemos matado ni nada <br> <form action=crud.php method=POST>
<br><input type="submit" value="Aceptar"/> </form>


