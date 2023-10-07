<?
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

ob_start();

class MYPDF extends TCPDF {
    public function Header() {
        $this->SetFont('times', 'B', 8);
        $html = <<<EOF
  
        
EOF;
        $this->writeHTML($html, true, false, true, false, $align='center');

       /*  $this->SetLineWidth(0.2);
        $this->SetDrawColor(0,0,0,true,'');
        $this->Line(5,5,5,289);//Left
        $this->Line(5,5,205,5);//Top
        $this->Line(205,5,205,289);//Right
        $this->Line(5,289,205,289);//Bottom */
    }
    public function Footer() {
        $this->SetY(-30);
        $tbl1 = <<<EOF
        
EOF;
        $this->writeHTML($tbl1, true, false, true, false, $align='center');

    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sri Ganesh');
$pdf->SetTitle('DC');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//set margins
$pdf->SetMargins(25, 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

$pdf->SetFont('times', '', 8);
?>