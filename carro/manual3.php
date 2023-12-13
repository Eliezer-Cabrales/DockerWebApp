<?php 
include 'index.php';
$se=$_POST['se'];
$fe=$_POST['fe'];
$nom=$_POST['nom'];
$nom2=$_POST['nom2'];
$consulta_cuadrante="update asignaciones set persona1=(select id from personas where nombre='$nom'),
 persona2=(select id from personas where nombre='$nom2') where fecha='$fe' and sesion='$se';";
mysqli_query($conexion,$consulta_cuadrante); 
$consulta_cuadrante2="call escoba3();";
mysqli_query($conexion,$consulta_cuadrante2); 
?> El cambio ha sido realizado correctamente <br>

<form action=manual.php method=POST>


<br><input type="submit" value="Aceptar"/> </form>


