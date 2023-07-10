<?php


/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */






class MYPDF extends TCPDF {

   
    public function Header() {
       
        
        
        
        $this->SetFont('helvetica', 'B', 15);
        
        $this->Cell(0, 10, 'Gym Reports', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    
    public function Footer() {
        
        $this->SetY(-15);
        
        $this->SetFont('helvetica', 'B', 8);
       
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gym Management');
$pdf->SetTitle('Sales Report');
$pdf->SetSubject('Gym Sales Report');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->SetFont('dejavusans', 'R', 8);


$pdf->AddPage();

$counter=0;


$table ='<table style="border:1px solid black"><thead>';
$table .='<tr>
            <th style="border:1px solid black">ID</th>
            <th style="border:1px solid black">B.N</th>
            <th style="border:1px solid black">Member Name</th>
            <th style="border:1px solid black">Type</th>
            <th colspan="2" style="border:1px solid black">Packages</th>
            <th style="border:1px solid black">Amount Paid</th>
            <th style="border:1px solid black">Tax</th>
            <th style="border:1px solid black">Total</th>
            <th style="border:1px solid black">Balance</th>
            <th style="border:1px solid black">Cashier</th>
            <th style="border:1px solid black">Pay-Type</th>
            <th style="border:1px solid black">Date</th>
        </tr></thead>';
$table .= '<tbody>';
$cash_sum=0;
$cc_sum=0;
$amount=0;
$balance=0;
foreach($reports->result() as $report)
{
    if($report->payment_type=='Cash')
    {
        $cash_sum=$cash_sum+$report->total_amount;

    }
    if($report->payment_type=='Card')
    {
        $cc_sum=$cc_sum+$report->total_amount;
    }

    $amount=$amount+$report->total_amount;
    if($report->balance!='' || $report->balance !=null)
    {
        $balance=$balance+$report->balance;    
    }
    
    $sum=$report->fee+$report->tax;
    $counter++;
    $table.='<tr>
    <td style="border:1px solid black">'.$counter.'</td>
    <td style="border:1px solid black">'.$report->id_r.'</td>
    <td style="border:1px solid black">'.$report->member_name.'</td>
    <td style="border:1px solid black">'.$report->member_type.'</td>
    <td colspan="2" style="border:1px solid black">'.$report->packages.'</td>
    <td style="border:1px solid black">'.$report->total_amount.'</td>
    <td style="border:1px solid black">'.$report->tax.'</td>
    <td style="border:1px solid black">'.$sum.'</td>
    <td style="border:1px solid black">'.$report->balance.'</td>
    <td style="border:1px solid black">'.$report->cashier.'</td>
    <td style="border:1px solid black">'.$report->payment_type.'</td>
    <td style="border:1px solid black">'.$report->fee_date.'</td>


    </tr>';

}


$table.='</tbody></table>';

$cash_print='<h4>Cash: &#x20B9'.$cash_sum.'</h4>';
$cc_print='<h4>Credit Card:  &#x20B9'.$cc_sum.'</h4>';
$amount_print='<h4>Amount:  &#x20B9'.$amount.'</h4>';
$balance_print='<h4>Balance:  &#x20B9'.$balance.'</h4>';
$com_gent='<h5>*This is computer generated report</h5>.';



$pdf->writeHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);
$pdf->writeHTMLCell(0,0,'','',$cash_print,0,1,0,true,'R',true);
$pdf->writeHTMLCell(0,0,'','',$cc_print,0,1,0,true,'R',true);
$pdf->writeHTMLCell(0,0,'','',$amount_print,0,1,0,true,'R',true);
$pdf->writeHTMLCell(0,0,'','',$balance_print,0,1,0,true,'R',true);
$pdf->writeHTMLCell(0,0,'','',$com_gent,0,1,0,true,'L',true);


$filelocation = "C:\\Users\\ATIN KUMAR SAHOO\\Downloads\\";

$pdf->Output($filelocation.'report_' . date('d_m_Y_h_i_s_A', time()) . '.pdf', 'F');
// $pdf->Output($filelocation.'report_123.pdf', 'F');

