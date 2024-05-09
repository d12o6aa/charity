<?php
    require_once '../../FPDF/fpdf.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    class PDF extends FPDF
    {
        function Header()
        {
            $this->Image('image.png',10,6,27);
            $this->SetFont('Arial',"B",17);
            $this->Cell(80);
            $this->Cell(30,10,'Header',1,0,'C');
            $this->Ln(30);

        }
        function Footer()
        {}

    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',11);
    $pdf->Output();

?>