<?php
//Example FPDF script with PostgreSQL
//Ribamar FS - ribafs@dnocs.gov.br

require('fpdf.php');

$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('Sales Report');

//Set font and colors
$pdf->SetFont('Times','',14);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

//Table header
$pdf->Cell(50,10,'Shipped Date',1,0,'C',1);
$pdf->Cell(40,10,'Order ID',1,0,'C',1);
$pdf->Cell(40,10,'Price',1,0,'C',1);
$pdf->Cell(40,10,'Discount',1,0,'C',1);
$pdf->Cell(40,10,'Freight',1,0,'C',1);
$pdf->Cell(50,10,'Total Price',1,1,'C',1);

//Restore font and colors
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

//Connection and query
$str_conexao='host=localhost port=5432 dbname=fp-mbd user=postgres password=05150302';
$conexao=pg_connect($str_conexao);
$consulta=pg_exec($conexao,'SELECT * FROM order_log');
$numregs=pg_numrows($consulta);

//Build table
$fill=false;
$i=0;
while($i<$numregs)
{
    $shipped_date=pg_result($consulta,$i,'shipped_date');
    $order_id=pg_result($consulta,$i,'order_id');
    $price=pg_result($consulta,$i,'price');
    $discount=pg_result($consulta,$i,'discount');
    $freight=pg_result($consulta,$i,'freight');
    $price_total=pg_result($consulta,$i,'price_total');
    $pdf->Cell(50,10,$shipped_date,1,0,'L',$fill);
    $pdf->Cell(40,10,$order_id,1,0,'L',$fill);
    $pdf->Cell(40,10,$price,1,0,'L',$fill);
    $pdf->Cell(40,10,$discount,1,0,'L',$fill);
    $pdf->Cell(40,10,$freight,1,0,'L',$fill);
    $pdf->Cell(50,10,$price_total,1,1,'L',$fill);
    $fill=!$fill;
    $i++;
}

$pdf->SetY(-15);
// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Page number
$pdf->Cell(0,10,'Page '.$pdf->PageNo().'',0,0,'C');
$pdf->Output();
?>