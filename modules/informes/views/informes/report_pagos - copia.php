<?php
/**
 * @copyright Copyright &copy;2014 Giandomenico Olini
 * @company Gogodigital - Wide ICT Solutions 
 * @website http://www.gogodigital.it
 * @package yii2-tcpdf
 * @github https://github.com/cinghie/yii2-tcpdf
 * @license GNU GENERAL PUBLIC LICENSE VERSION 3
 * @tcpdf library 6.0.075
 * @tcpdf documentation http://www.tcpdf.org/docs.php
 * @tcpdf examples http://www.tcpdf.org/examples.php
 */


// Load Component Yii2 TCPDF 
Yii::$app->get('tcpdf');
Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
Yii::$app->response->headers->add('Content-Type', 'application/pdf');

use yii\helpers\FileHelper;
use yii\helpers\Html;

// create new PDF document
$logo="tcpdf_logo.png";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData($logo, 160, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

$tittle = 'REPORTE_PAGOS';

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ING. JOSE ANTONIO GONZALEZ LIÑAN');
$pdf->SetTitle($tittle);
$pdf->SetSubject('PAGOS');
$pdf->SetKeywords('PAGOS, REPORTE,');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setPrintFooter(true);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', 'K', 9, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.

function NombreMes($m){
switch ($m){
	case 1: return "Enero";
	case 2: return "Febrero";
	case 3: return "Marzo";
	case 4: return "Abril";
	case 5: return "Mayo";
	case 6: return "Junio";
	case 7: return "Julio";
	case 8: return "Agosto";
	case 9: return "Septiembre";
	case 10: return "Octubre";
	case 11: return "Noviembre";
	case 12: return "Diciembre";
	}
}
$fecha = date("Y-m-d");  
//Obtener la fecha de la cita
$dia = date("d",strtotime($fecha));
$mes=NombreMes(date("m",strtotime($fecha)));
$anio = date("Y",strtotime($fecha));
$fechaimpresion= $dia." de ".$mes." de ".$anio;

$pdf->AddPage();

// Set some content to print
$html = NULL;

$html='
<table width="100%" border="0">	
	
	<tr>
		<td colspan="4" align="left" border="0"><h3>REPORTE DE PAGOS | Fecha impresión: '.$fechaimpresion.'</h3></td>
	</tr>
	
	<tr>
		<td colspan="4">&nbsp;</td>
    </tr>
	
	<tr>
		<td colspan="2" width="50%">&nbsp;</td>
		<td align="rigth" width="25%"><strong>DESDE:</strong> '.$Informes->INFO_FECHAINICIAL.'</td>
		<td align="rigth" width="25%"><strong>HASTA:</strong> '.$Informes->INFO_FECHAFINAL.'</td>
    </tr>
	
	<tr>
		<td colspan="4">&nbsp;</td>
    </tr>
	
	<tr>
		<td colspan="4" align="left" border="1" bgcolor= "#D4E6D9"><strong>RELACIÓN DE PAGOS</strong></td>
    </tr>
	
	<tr>
		<td colspan="4">&nbsp;</td>
    </tr>
	
	<tr>
		<td colspan="4">
		
			<table width="100%" border="0.5">
				';
				
				$html.='
				<tr>
					<td align="center" width="5%"><strong>ITEM</strong></td>
					<td align="center" width="15%"><strong>IDENTIFIACIÓN</strong></td>
					<td align="center" width="25%"><strong>NOMBRES</strong></td>
					<td align="center" width="25%"><strong>APELLIDOS</strong></td>
					<td align="center" width="17%"><strong>FECHA PAGO</strong></td>
					<td align="center" width="13%"><strong>VALOR</strong></td>
				</tr>
				';
				$i=1;
				$total = 0;				
				foreach($data as $row){
				$total = $total + $row->PAGO_VALOR;
				$html.='
				<tr>
					<td align="center">'.$i.'</td>
					<td align="center">'.$row->afiliados->persona->PERS_IDENTIFICACION.'</td>
					<td align="left">'.$row->afiliados->persona->PERS_PRIMERNOMBRE.' '.$row->afiliados->persona->PERS_SEGUNDONOMBRE.'</td>
					<td align="left">'.$row->afiliados->persona->PERS_PRIMERAPELLIDO.' '.$row->afiliados->persona->PERS_SEGUNDOAPELLIDO.'</td>
					<td align="center">'.$row->PAGO_FECHA.'</td>
					<td align="rigth">$'.number_format($row->PAGO_VALOR).'</td>
				</tr>
				';
				$i++;
				}
				
				$html.='				
			</table>	
		
		</td>
    </tr>
	
	<tr>
		<td colspan="4">&nbsp;</td>
    </tr>
	
	<tr>
		<td colspan="4">
		
			<table width="100%" border="0.5">				
				<tr>
					<td align="center" width="87%"><strong>TOTALES</strong></td>
					<td align="rigth"  width="13%"><strong>$'.number_format($total).'</strong></td>
				</tr>
			</table>
		
		</td>
    </tr>
	
</table>';	



// Print text using writeHTML()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//$pdf->writeHTML($html, true, 0, true, 0);
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output("$tittle.pdf", 'D');

//============================================================+
// END OF FILE
//============================================================+

// Close Yii2
\Yii::$app->end();

?>