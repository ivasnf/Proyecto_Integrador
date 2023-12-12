<?php
    include("fpdf/fpdf.php");
    include("conexion.php");

    class PDF extends FPDF{

        function Header(){

            $this->SetFont('Arial','B',18);
            $this->Image('../img/encabezadoReporte.jpg',50,10,110);
            $this->Cell(160,55,'Reporte de Tutores',0,0,'C');
            $this->Ln(35);
        }
        function ImprimirTexto($file){

            $txt = file_get_contents($file);
            $this->SetFont('Arial','',12);
            $this->MultiCell(0,5,$txt);

        }
        Function Footer(){

            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,utf8_decode('ING, Fernando-->Pagina ').$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    $pdf=new PDF ('P', 'mm', 'Letter');
    $pdf->SetMargins(25,15);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "b", 10);
    
    $query = 'SELECT *FROM TUTOR order by id';
    $result = mysqli_query($conexion,$query);
    if(!$result){

        die (mysqli_error($conexion));

    }

    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(141,53,53);
    $pdf->Cell(15,10,'Id',1,0,'C',true);
    $pdf->Cell(50,10,'Curp',1,0,'C',true);
    $pdf->Cell(50,10,'Apellido Paterno',1,0,'C',true);
    $pdf->Cell(50,10,'Nombre',1,1,'C',true);
    $contador=0;

    while($row = mysqli_fetch_array($result)){
        $pdf->SetTextColor(7,7,7);
        $pdf->SetFillColor(239,245,242);
        $pdf->Cell(15,10,$row[0],1,0,'C',true);
        $pdf->Cell(50,10,$row[1],1,0,'C',true);
        $pdf->Cell(50,10,utf8_decode($row[2]),1,0,'C',true);
        $pdf->Cell(50,10,utf8_decode($row[3]),1,1,'C',true);
        $contador++;
    }
    $pdf->Ln();
    $pdf->SetTextColor(7,7,7);
    $textoCentrado = 'TOTAL DE TUTORES: '.$contador;
    $pdf->Cell(0,10,utf8_decode($textoCentrado),0,1,'R');
    $pdf->Output();
?>

try {
} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "\n";
}
