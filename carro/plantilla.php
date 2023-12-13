<?php


require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        
        global $tituloReporte;
        // Logo
        $this->Image("images/logo.png", 3, 5, 210);

        // Arial bold 15
        $this->SetFont("Arial", "B", 12);

    
        // Salto de línea
        $this->Ln(40);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
       
    }
}
