<?php
class ExampleController extends PdfAppController {
	public $name = 'Example';
	public $uses = array();
	public $components = array('RequestHandler');
	public $helpers =array('Pdf.Tcpdf');

	public function index() {
		$this->set('data', 'sample data');
	}
}
?>