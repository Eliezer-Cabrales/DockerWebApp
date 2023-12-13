<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
<img src="se.png" alt="carrito">
<div id="container">
	
	<ul>
		
		<li><a href="index.php">Inicio</a></li>
		<li><a href="anfecha.php">Generar Cuadrante</a></li>
		<li><a href="escoge.php">Obtener Cuadrante</a></li>
        <li><a href="manual0.php">Cambios Manuales</a></li>
        <li><a href="elimina.php">Eliminar Registro</a></li>
        <li><a href="crud.php">Trabajadores</a></li>
        <li><a href="reset.php">Resetear Base de Datos</a></li>
		</ul>
</div>
<br>
<p> Esta aplicación web es una aplicación sencilla que usa Apache y MySql. Por motivos de privacidad y seguridad, la finalidad de la aplicación ha sido generalizada y tampoco incluye datos personales o geográficos reales.</p>

<?php function conectar(){
   $servidor = "cont-bd"; 
   $usuario = "root"; 
   $password = "1234"; 
   $nombre_bd = "carro"; 

   $conexion = mysqli_connect($servidor, $usuario, $password, $nombre_bd);

   if (!$conexion) {
       die("La conexión falló: " . mysqli_connect_error());
   }
   return $conexion;
} 
$conexion = conectar();
error_reporting(0);
?>

