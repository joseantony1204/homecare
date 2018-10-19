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

use app\modules\historias\models\History;
use app\modules\historias\models\Diagnosticos;
use app\modules\historias\models\Recetarios;
use app\modules\historias\models\Remisiones;

use app\modules\configuration\models\Clasdiagnosticos;
use app\modules\configuration\models\Medicamentos;
use app\modules\configuration\models\Clasprocedimientos;

// create new PDF document
$logo="tcpdf_logo.png";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData($logo, 160, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

$tittle = 'ORDEN_DE_PROCEDIMIENTO_No.'.$History->AGEN_ID;

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ING. JOSE ANTONIO GONZALEZ LIÑAN');
$pdf->SetTitle($tittle);
$pdf->SetSubject('HISTORIA');
$pdf->SetKeywords('HISTORIA, HISTORIA,');

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
  
//Obtener la fecha de la cita
$dia = date("d",strtotime($History->AGEN_FECHA));
$mes=NombreMes(date("m",strtotime($History->AGEN_FECHA)));
$anio = date("Y",strtotime($History->AGEN_FECHA));
$fechtencion = $dia." de ".$mes." de ".$anio;

$pdf->AddPage();


$nombre = $History->persona->PERS_PRIMERNOMBRE.' '.$History->persona->PERS_SEGUNDONOMBRE.' '.$History->persona->PERS_PRIMERAPELLIDO.' '.$History->persona->PERS_SEGUNDOAPELLIDO;

$fnacimiento = $History->persona->PERS_FECHANACIMIENTO;
$datebirth = new DateTime ($History->persona->PERS_FECHANACIMIENTO);
$tiempo = $History->persona->getTime($datebirth->format('d/m/Y'), date("d/m/Y"));
$edad = "$tiempo[0] A con $tiempo[1] M y $tiempo[2] D";

$sexo = $History->persona->genero->TIGE_NOMBRE;
$idsexo = $History->persona->genero->TIGE_ID; 
$estacivil =$History->persona->estadosciviles->ESCI_NOMBRE;
$direccion = $History->persona->PERS_DIRECCION;
$tipoiden = $History->persona->tiposidentificaciones->TIID_NOMBRE;
$identificacion = $History->persona->PERS_IDENTIFICACION;
$telefono = $History->persona->PERS_TELEFONO;
$finalidad = $History->servicios->FINA_NOMBRE;


//VARIABLES
//Variables con los datos del funcionario que atendio la cita
$funcionario = $History->empleados->persona->PERS_PRIMERNOMBRE.' '.$History->empleados->persona->PERS_SEGUNDONOMBRE.' '.$History->empleados->persona->PERS_PRIMERAPELLIDO.' '.$History->empleados->persona->PERS_SEGUNDOAPELLIDO;

$cargofuncio = $History->empleados->cargos->CARG_NOMBRE;
$ccfuncionar = $History->empleados->persona->PERS_IDENTIFICACION;
$tipoccfunci = $History->empleados->persona->tiposidentificaciones->TIID_NOMBRE;

$medicalsoft = "HomeCare (Software-IPS)<br/>© ".date("Y") ." Powered by www.ipsmedigroup.com";


//diagnosticos
$Diagnostico = Diagnosticos::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
$Diagnosticos = Diagnosticos::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->all();
$totalDiagnosticos =count($Diagnosticos);
$Clasdiagnosticos = Clasdiagnosticos::find()
		                    ->alias('t')
							->select('t.*,d.*')
							->where(['d.AGEN_ID' => $History->AGEN_ID])
							->innerJoin('TBL_ATNDIAGNOSTICOS d', 'd.DIAG_ID = t.DIAG_ID')
							->all();

							
//recetarios							
$Recetarios = Recetarios::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->all();
$totalRecetarios =count($Recetarios);
$Medicamentos = Medicamentos::find()
		                    ->alias('t')
							->select('t.*,r.*')
							->where(['r.AGEN_ID' => $History->AGEN_ID])
							->innerJoin('TBL_ATNRECETARIOS r', 'r.MEDI_ID = t.MEDI_ID')
							->all();
							

//laboratorios							
$Laboratorios = Clasprocedimientos::find()
		                    ->alias('t')
							->select('t.*, l.*')
							->where(['l.AGEN_ID' => $History->AGEN_ID, 't.TIPR_ID' =>1 ])
							->innerJoin('TBL_ATNPROCEDIMIENTOS l', 'l.PROC_ID = t.PROC_ID')
							->all();						
$totalLaboratorios =count($Laboratorios);

//procedimientos							
$Procedimientos = Clasprocedimientos::find()
		                    ->alias('t')
							->select('t.*, l.*')
							->where(['l.AGEN_ID' => $History->AGEN_ID, 't.TIPR_ID' =>2 ])
							->innerJoin('TBL_ATNPROCEDIMIENTOS l', 'l.PROC_ID = t.PROC_ID')
							->all();						
$totalProcedimientos =count($Procedimientos);

//Imagenes diagnosticas							
$Imagenes = Clasprocedimientos::find()
		                    ->alias('t')
							->select('t.*, l.*')
							->where(['l.AGEN_ID' => $History->AGEN_ID, 't.TIPR_ID' =>3 ])
							->innerJoin('TBL_ATNPROCEDIMIENTOS l', 'l.PROC_ID = t.PROC_ID')
							->all();						
$totalImagenes =count($Imagenes);



//remisiones 
$Remisiones = Remisiones::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->all();
$totalRemisiones =count($Remisiones);


$medigicomu = $History->persona->antginecologicos->ATAG_COMPANEROS;
if ($medigicomu=="<1"){
	  $medigicomp="Menor que 1";
	}else{	  
	  $medigicomp="Mayor que 1";
}



// Set some content to print
$html = NULL;
$html='
<table width="100%" border="0">	  
	
	
	<tr>
		<td align="left" border="0"><h3>ORDEN DE IMAGEN(ES) DIAGNÓSTICA(S) | Fecha: '.$fechtencion.'</h3></td>
	</tr>
	
	<tr>
		<td align="left" border="0">FINALIDAD: '.strtoupper($History->servicios->FINA_NOMBRE).'</td>
	</tr>
	
	 
	<tr>
        <td>&nbsp;</td>
    </tr>
	
	<tr>
        <td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>DATOS DE IDENTIFIACIÓN DEL USUARIO</strong></td>
				</tr>
				<tr>
					<td>

						<table width="100%" border="0">
							<tr>
								<td width="50%"> <strong>NOMBRE</strong>: '.$nombre.'</td>
								<td width="50%"><strong>IDENTIFICACIÓN</strong>: '.$tipoiden.' <strong>Nº</strong>: '.$identificacion.'</td>
							</tr>
							<tr>								
								<td width="50%"> <strong>SEXO</strong>: '.$sexo.'</td>
								<td width="50%"><strong>F. NACIMINETO</strong>: '.$fnacimiento.' - <strong>EDAD</strong>: '.$edad.'</td>
							</tr>
							<tr>								
								<td width="50%"><strong>TELEFONO</strong>: '.$telefono.'</td>
								<td width="50%"><strong>DIRECCION</strong>: '.$direccion.'</td>
							</tr>
							<tr>
								<td width="50%"> <strong>ZONA</strong>: '.$zona.' </td>
								<td width="50%"> <strong>BARRIO</strong>: '.$barrio.' </td>
							</tr>
							<tr>								
								<td width="50%"> <strong>ESTADO CIVIL</strong>: '.$estacivil.'</td>
								<td width="50%"> <strong>OCUPACIÓN</strong>: '.$ocupacion.' </td>
							</tr>
							<tr>
								<td width="50%"> <strong>NIVEL EDUCATIVO</strong>: '.$nivelestudio.' </td>
								<td width="50%">&nbsp;</td>
							</tr>
							
						</table>

					</td>
				</tr>
		    </table>
		
		</td>
    </tr>
	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
	if ($totalImagenes>0) {
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>ORDEN DE IMAGEN(ES) DIAGNÓSTICA(S)</strong></td>
				</tr>
				<tr>
					<td width="6%" align="center" border="0.5"><strong>#</strong></td>
					<td width="10%" align="center" border="0.5"><strong>CANTIDAD</strong></td>
					<td width="12%" align="center" border="0.5"><strong>SOAT</strong></td>
					<td width="60%" align="center" border="0.5"><strong>DESCRIPCIÓN (SOAT)</strong></td>
					<td width="12%" align="center" border="0.5"><strong>CUPS</strong></td>
				</tr>
				';	
					$i = 1;
					foreach($Imagenes as $Imagen){
						$html .='
						<tr>
							<td width="6%" align="center" border="0.5">'.$i.'</td>
							<td width="10%" align="center" border="0.5">' .$Imagen->ATPR_CANTIDAD.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Imagen->PROC_SOAT.'.</td>
							<td width="60%" align="center" border="0.5">' .$Imagen->PROC_NOMBRE.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Imagen->PROC_CUPS.'.</td>
						</tr>
						';
						
						$i++;
					}
								
				
			
				$html .='
			  </table>
		
		</td>
    </tr>';
	}
	
	
	$html .='
	<tr>
		<td>&nbsp;</td>
    </tr>';	
	
	
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>IMPRESIÓN DIAGNÓSTICA</strong></td>
				</tr>
				<tr>
					<td width="5%"  align="center"><strong>#</strong></td>
					<td width="25%" align="center"><strong>CIE10</strong></td>
					<td width="70%" align="center"><strong>DESCRIPCÓN</strong></td>
				</tr>
				';
				if ($totalDiagnosticos<=0) {
				$html .='
				<tr>
					<td width="100%" align="left" border="0">NO SE HAN INGRESADO LA IMPRESION DIAGNÓSTICA.</td>
				</tr>
				';}
				elseif ($totalDiagnosticos>0) {				
					$i=1;
					foreach($Clasdiagnosticos as $Clasdiagnostico){
						$html .='
						<tr>
							<td width="5%" align="center" border="0.5">'.$i.'</td>
							<td width="25%" align="center" border="0.5">' .$Clasdiagnostico->DIAG_NOMBRE.'</td>
							<td width="70%" align="left" border="0.5"> ' .$Clasdiagnostico->DIAG_CODIGO.'.</td>
						</tr>
						';
						
						$i++;
					}
								
				
				}
				$html .='
			  </table>
		
		</td>
    </tr>';
		
	
	$html .='
	<tr>
		<td>&nbsp;</td>
    </tr>
	
	<tr>
		<td>&nbsp;</td>
    </tr>
	
	<tr>
		<td>&nbsp;</td>
    </tr>
	
	<tr>
		<td>&nbsp;</td>
    </tr>
	
	
	<tr>
		<td width="50%" align="left">'.$funcionario.'<br/>
					  '.$cargofuncio.' <br/>'.$tipoccfunci.' N°'.$ccfuncionar.'
		</td>
		<td width="50%">Recibido: __________________________________<br/>
						Nombre: '.$nombre.' <br/>
						N° Identificación: '.$identificacion.'
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

if($sw==true){
	$filenamepath = Yii::$app->basePath.'/web/pdf/'.$tittle.'.pdf';
	$pdf->Output($filenamepath, 'F');
	Yii::$app->mailer->compose()
		->setFrom([Yii::$app->params['userEmail'] => Yii::$app->params['adminEmail']])
		->setTo([$History->persona->PERS_EMAIL => $History->persona->PERS_PRIMERAPELLIDO.' '.$History->persona->PERS_PRIMERNOMBRE])
		->setSubject("Soporte de imagenes diagnósticas")
		->setHtmlBody(
		"
			<div align='left'><h4>Estimad@ ".ucwords($History->persona->PERS_PRIMERNOMBRE)."  <br> Cordial saludo,</h4></div>
			<p align='justify'>Para <strong>".Yii::$app->params['company']."</strong> ha sido un placer atenderlo desde la comodidad de su hogar, para nosotros es muy importante el bienestar de nuestros usuarios.</p>
			<p align='justify'>A continuación le hacemos llegar los soportes de la atención médica que usted ha recibido.</p>
			
			<div align='center'> 
				<h2>".Yii::$app->params['company']."</h2>
				<h4>".Yii::$app->params['footerTittle']."<br>".Yii::$app->params['footerDescription']."</h4>
			</div>	 
		"
		)
		->attach($filenamepath)
		->send();
}

//============================================================+
// END OF FILE
//============================================================+

// Close Yii2
\Yii::$app->end();
?>
