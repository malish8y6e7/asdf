<?php

class PDFController extends BaseController 
{  

		public function getIndex($html)
		{
			require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->render();	
			$dompdf->stream('pdf.pdf',array('Attachment'=>0));
		}
}