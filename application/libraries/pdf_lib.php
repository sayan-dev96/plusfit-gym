<?php

// require_once dirname(__file__).'/tcpdf/tcpdf.php';
require_once dirname(__file__).'/../../vendor/tecnickcom/tcpdf/tcpdf.php';
class pdf_lib extends TCPDF
{

	public function __construct()
	{
		parent::__construct();
	}
}


?>