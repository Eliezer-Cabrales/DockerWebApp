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
$conexion = conectar();?>
<?php

require "conexion.php";
require "plantilla.php";

$start=$_POST['start'];
$stop=$_POST['stop'];
$tituloReporte = "Cuadrante Carritos";
$consulta_cuadrante="select asignaciones.fecha, CASE sesion
WHEN 'vms' THEN 'Viernes Mañana - San Roque 10:30 - 12:30'
WHEN 'vmp' THEN 'Viernes Mañana - Palmones 10:30 - 12:30'
WHEN 'vts' THEN 'Viernes Tarde - San Roque 17:15 - 19:15'
WHEN 'vtp' THEN 'Viernes Tarde - Palmones 17:15 - 19:15'
WHEN 'ss' THEN 'Sábado - San Roque 10:30 - 12:30'
WHEN 'sp' THEN 'Sábado - Palmones 10:30 - 12:30'
WHEN 'ds' THEN 'Domingo - San Roque 10:30 - 12:30'
WHEN 'dp' THEN 'Domingo - Palmones 10:30 - 12:30'
ELSE 'Otro Sitio'
END AS sesion, personas.nombre, personas2.nombre2
from asignaciones, personas, (select personas.id, personas.nombre as 'nombre2' from personas) as personas2 
where asignaciones.persona1=personas.id and asignaciones.persona2=personas2.id and asignaciones.fecha between '$start' and '$stop';";
$cuadrante=mysqli_query($conexion,$consulta_cuadrante); 
$num_filas=mysqli_num_rows ($cuadrante);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->SetTitle($tituloReporte);
    $pdf->SetAuthor('Eliezer Cabrales');
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(20, 5, "Fecha", 1, 0, "C");
    $pdf->Cell(80, 5, "Lugar y Hora", 1, 0, "C");
    $pdf->Cell(45, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(45, 5, "Nombre", 1, 1, "C");


    $pdf->SetFont("Arial", "", 9);

    while ($fila = $cuadrante->fetch_assoc()) {
        $pdf->Cell(20, 5, $fila['fecha'], 1, 0, "C");
        $pdf->Cell(80, 5, mb_convert_encoding($fila['sesion'], 'ISO-8859-1', 'UTF-8'), 1, 0, "C");
        $pdf->Cell(45, 5, $fila['nombre'], 1, 0, "C");
        $pdf->Cell(45, 5, $fila['nombre2'], 1, 1, "C");

    }

    $pdf->Output('I', $tituloReporte . '.pdf');
