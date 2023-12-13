<?php 
include 'index.php';
if (!isset($_POST['vm'])) 
	{
        $vm=0;
	}else
		{
            $vm=1;
		}
        if (!isset($_POST['vt'])) 
	{
        $vt=0;
	}else
		{
            $vt=1;
		}
        if (!isset($_POST['s'])) 
	{
        $s=0;
	}else
		{
            $s=1;
		}
        if (!isset($_POST['d'])) 
	{
        $d=0;
	}else
		{
            $d=1;
		}
$sexo=$_POST['sexo'];
$nombre=$_POST['nombre'];
$ultima=$_POST['ultima'];;
$consulta_cuadrante="insert into personas (nombre, sexo , vm, vt, s ,d,ultima) values ('$nombre', '$sexo', '$vm', '$vt', '$s', '$d', '$ultima' );";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
echo "El trabajador $nombre ha sido dado de alta en la base de datos";
?> <br> <form action=crud.php method=POST>
<br><input type="submit" value="Aceptar"/> </form>


