<?php
// set document information
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor('CakePHP PDF Plugin');
$tcpdf->SetTitle('Title');
$tcpdf->SetSubject('Subject');
$tcpdf->SetKeywords('TCPDF, PDF, example, test, guide');
// remove default header/footer
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
$tcpdf->SetMargins(10, 5, 10);
//set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set font
$tcpdf->SetFont('kozgopromedium', '', 10);
// add a page
$tcpdf->AddPage();

//$tcpdf->SetMargins(10,5);
$tcpdf->SetDrawColor(0,0,0);
$tcpdf->SetFillColor(200);

// Page Data
$tcpdf->SetCellHeight(1);
$tcpdf->SetFontSize(12);

$tcpdf->MfCell(175);
$tcpdf->SetDrawColor(0,102,255);
$tcpdf->SetTextColor(0,102,255);
$tcpdf->SetLineWidth(0.5);
$tcpdf->SetCellHeight(12);
$tcpdf->MfCell(0,'Cell','TLRB','C');
$tcpdf->SetDrawColor(0,0,0);
$tcpdf->SetTextColor(0);
$tcpdf->SetLineWidth(0.2);
$tcpdf->Ln();

$tcpdf->MfCell(0,$data,0,'C');
$tcpdf->Ln();
$tcpdf->Cell(0,0,$data);

// Page Output
$tcpdf->Output('example.pdf', 'D');
?>