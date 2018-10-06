<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function BasicTable($header, $data, $x = 0, $y = 0)
    {
        // Cabecera
        if ($x > 0 and $y > 0) {
            $this->SetXY($x , $y);
        }
        foreach ($header as $col){
          $this->Cell(40, 6, $col, 1);
        }
        $this->Ln();
        // Datos

        foreach ($data as $row) {
          if ($x > 0 and $y > 0) {
              $y = $y+6;
              $this->SetXY($x , $y);
          }
            foreach ($row as $col) {
                $this->Cell(40, 6, $col, 1);
            }
  $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();

//TABLA 1
$header = array('Lado Izquierdo', 'Cumple');
$data = [];
for ($index = 0; $index < 13; $index++) {
    array_push($data, array("izquierdo" . $index, 'valor' . $index));
}
$pdf->BasicTable($header, $data);
$pdf->Ln(5);

//TABLA 2
$header = array('Lado Derecho', 'Cumple');
$data = [];
for ($index = 0; $index < 5; $index++) {
    array_push($data, array("derecho" . $index, 'valor' . $index));
}
$pdf->BasicTable($header, $data , 115 , 10 );
$pdf->Ln(5);

$pdf->Output();
?>
