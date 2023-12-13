<?php 

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
include 'index.php';
$sexo=$_POST['sexo'];
$ultima=$_POST['ultima'];
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$consulta_cuadrante="update personas set sexo='$sexo', ultima='$ultima', nombre='$nombre', vm='$vm', vt='$vt', s='$s', d='$d' where id=$id";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
?> El trabajador ha sido actualizado <br> <form action=crud.php method=POST>
<br><input type="submit" value="Aceptar"/> </form>


