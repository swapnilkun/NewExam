<?php
session_start();
include("../mysql_connection.php");
$query_general_setting=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where id=1 and g_id=1"));
date_default_timezone_set($query_general_setting["g_timezone"]);
date_default_timezone_get();
$query_exam=mysqli_fetch_array(mysqli_query($con,"SELECT e.e_id,e.category_id,e.subcategory_id,e.exam_name,e.exam_date,e.subject_id,s.student_name FROM exam e join student s on e.category_id=s.category_id where e_id='".$_GET['exam_id']."' and s.student_id='".$_GET['sid']."'"));
//$query_student=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM student where student_id='".$_GET['sid']."'"));
$query_category=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM category where c_id='".$query_exam['category_id']."'"));
$query_subcategory=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM subcategory where s_c_id='".$query_exam['subcategory_id']."'"));

if($_GET['exam_dy']!="")
{
	/* $examdate=explode("-",$_GET['exam_dy']);
	$date_exam=$examdate[2]."/".$examdate[1]."/".$examdate[0]; */
	$date_exam= $query_exam['exam_date'];
	//echo $_GET['sid'];
}

require_once('../tcpdf/config/lang/eng.php');
require_once('../tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($query_general_setting['g_organization']);
$pdf->SetTitle($query_general_setting['g_organization']);
$pdf->SetSubject($query_exam['exam_name']);
$pdf->SetKeywords($query_general_setting['g_keywords']);


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', 'B', 20);

//$pdf->Write(0, 'Example of HTML Justification', '', 0, 'L', true, 0, false, false, 0);

$html = '';

$html .= '<table style="border:5pt solid #7087A3;background-color:#EAEDF1;border-radius: 25px;"><tbody><tr><td><table><tbody><tr><td><img src="../images/logo/'.$query_general_setting['g_logo'].'" height="50"></td><td></td><td></td></tr><tr><td width="100%" colspan="4"><span align="center" style="font-size:20pt;">Hall Ticket</span></td></tr>';
if($query_general_setting['g_certificate_content']!="")
{
	$html .= '<tr><td colspan="4" align="center" style="font-size:14pt;">'.$query_general_setting['g_certificate_content'].'</td></tr>';
}
else 
{
	$html .= '<tr><td colspan="4" align="center" style="font-size:14pt;">&nbsp;</td></tr>';
}
$html .= '<tr><td colspan="4" align="center" style="font-size:20pt;">'.$query_exam['exam_name'].'('.$query_category['category_name'].'-'.$query_subcategory['subcategory_name'].')</td></tr>
<tr><td colspan="4" align="center" style="font-size:20pt;" height="20pt">&nbsp;</td></tr>
<tr>';
if($query_general_setting['g_logo']!="")
{
	$html .= '<td><img src="../images/logo/'.$query_general_setting['g_logo'].'"></td>';
}
else 
{
	$html .= '<td><img src="../images/logo/default/bookschool.png"></td>';
}
$html .= '<td align="center" style="font-size:16pt;">Date<br>'.$date_exam.'</td>';
if($query_general_setting['g_signature']!="")
{
	$html .= '<td align="center"><img src="../images/signature/'.$query_general_setting['g_signature'].'"><br><br>'.$query_general_setting['g_text_signature'].'</td>';
}
else 
{
	$html .= '<td align="center"><img src="../images/signature/default/signature.png"><br><br>'.$query_general_setting['g_text_signature'].'</td>';
}

if($query_general_setting['g_certificate_logo']!="")
{
	$html .= '<td><img src="../images/certificate_logo/'.$query_general_setting['g_certificate_logo'].'"></td>';
}
else 
{
	$html .= '<td><img src="../images/certificate_logo/default/Certification_logo.png"></td>';
}
$html .= '</tr></tbody>
</table></td></tr></tbody></table>';



// set core font
$pdf->SetFont('helvetica', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_end_clean();
$pdf->Output('Textusintentio.com', 'I');

