<?php
//Example FPDF script with PostgreSQL
//Ribamar FS - ribafs@dnocs.gov.br

require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Sales Report');

//Set font and colors
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);

//Table header
$pdf->Cell(20,10,'Shipped Date',1,0,'L',1);
$pdf->Cell(20,10,'Order ID',1,1,'L',1);
$pdf->Cell(20,10,'Price',1,1,'L',1);
$pdf->Cell(20,10,'Discount',1,1,'L',1);
$pdf->Cell(20,10,'Freight',1,1,'L',1);
$pdf->Cell(20,10,'Total Price',1,1,'L',1);

//Restore font and colors
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

//Connection and query
$str_conexao='host=localhost port=5432 dbname=fp-mbd user=postgres password=Bolaitubundar1';
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
    $pdf->Cell(20,10,$shipped_date,1,0,'L',$fill);
    $pdf->Cell(20,10,$order_id,1,0,'L',$fill);
    $pdf->Cell(20,10,$price,1,0,'L',$fill);
    $pdf->Cell(20,10,$discount,1,0,'L',$fill);
    $pdf->Cell(20,10,$freight,1,0,'L',$fill);
    $pdf->Cell(50,10,$price_total,1,1,'L',$fill);
    $fill=!$fill;
    $i++;
}

//Add a rectangle, a line, a logo and some text
$pdf->Rect(5,5,170,80);
$pdf->Line(5,90,90,90);
$pdf->SetFillColor(224,235);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(5,95);
$pdf->Cell(170,5,'PDF Sales Report',1,1,'L',1,'');

$pdf->Output();
?>