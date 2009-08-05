<?php
App::import('Vendor', 'Pdf.TCPDF', array('file'=>'tcpdf/tcpdf.php'));

class TcpdfHelper extends TCPDF {
	public $helpers = array();
	private $cellHeight = 0;
	
	function __construct($options = array()) {
		$default = array(
			'orientation'=>PDF_PAGE_ORIENTATION,
			'unit'=>PDF_UNIT,
			'format'=>PDF_PAGE_FORMAT,
			'unicode'=>true,
			'encoding'=>'UTF-8',
		);
		$options = array_merge($default, $options);
		extract($options);
		parent::__construct($orientation, $unit, $format, $unicode, $encoding, false);
	}
	
	function SetCellHeight($cellHeight) {
		$this->cellHeight = $cellHeight;
		//return $this;
	}
	
	function MfCell($w, $txt='', $border=0, $align='', $fill=0, $disable=array()) {
		if (isset($this->params['mfType']) && is_array($disable) && in_array($this->params['mfType'], $disable)) {
			$this->SetTextColor(200);
			$border = 1;
			$fill = 1;
		}
		$link = '';
		$ln = 0;
		$this->Cell($w, $this->cellHeight, $txt, $border, $ln, $align, $fill, $link);
		$this->SetTextColor(0);
		//return $this;
	}
	
	function MfMultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0) {
		$ln = 0;
		$autopadding = false;
		$this->MultiCell($w, $h, $txt, $border, $align, $fill, $ln, $x, $y, $reseth, $stretch, $ishtml, $autopadding, $maxh);
		//return $this;
	}
	
	function TableTitle($txt='') {
		$this->SetFont('kozgopromedium', 'B', 9);
		$this->SetTextColor(255);
		$this->SetFillColor(0,102,255);
		$this->MfCell(60,$txt,1,'L',1);
		$this->SetFont('kozgopromedium', '', 7);
		$this->SetFillColor(200);
		$this->SetTextColor(0);
		//return $this;
	}
	
	function BoxTitle($h, $txt='') {
		$this->SetFont('kozgopromedium', 'B', 8);
		$this->SetTextColor(255);
		$this->SetFillColor(0,102,255);
		$this->MfMultiCell(18,$h*.8,$txt,1,'C',1);
		$this->SetFont('kozgopromedium', '', 8);
		$this->SetFillColor(200);
		$this->SetTextColor(0);
		//return $this;
	}
}
?>