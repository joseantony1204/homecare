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

$tittle = 'HISTORIA_CLINICA_No.'.$History->AGEN_ID;

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

// set alpha to semi-transparency
$pdf->SetAlpha(0.1);
// draw jpeg image
$image = Yii::$app->basePath.'/web/img/marca_agua.png';
$pdf->Image($image, 30, 80, 150, 150, '','', '', true, 72);
// restore full opacity
$pdf->SetAlpha(1);
$pdf->setPageMark();

if($History->servicios->tiposfinalidades->TIFI_ID==1){
	$encabezado = "HISTORIA CLINICA - ";
}else{
	$encabezado = "CONTROL - ";
} 

$encabezado .= strtoupper($History->servicios->FINA_NOMBRE);
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


//TEST DE findrisk
if($History->testfindrisk->ATTF_EDADPNTS==0){$Testfindrisk01="Menos de 45 años (0 puntos).";	}
elseif($History->testfindrisk->ATTF_EDADPNTS==2){$Testfindrisk01="45-54 años (2 puntos).";	}
elseif($History->testfindrisk->ATTF_EDADPNTS==3){$Testfindrisk01="55-64 años (2 puntos).";	}
elseif($History->testfindrisk->ATTF_EDADPNTS==3){$Testfindrisk01="Más de 64 años (2 puntos).";	}

$Testfindrisk02=round($History->testfindrisk->ATTF_IMC, 2);  
if($History->testfindrisk->ATTF_IMC<25){$Testfindrisk021=" (".$Testfindrisk02.") Menor de 25 kg/m*m (0 puntos).";	}
elseif(($History->testfindrisk->ATTF_IMC>=25)and($History->testfindrisk->ATTF_IMC<=30)){$Testfindrisk021=" (".$Testfindrisk02.") Entre 25-30 kg/m*m (1 puntos).";	}
elseif($History->testfindrisk->ATTF_IMC>30){$Testfindrisk021=" (".$Testfindrisk02.") Mayor de 30 kg/m*m (3 puntos).";	}

if(($History->testfindrisk->ATTF_PCPNTS==0)and( $idsexo==1)){$Testfindrisk03="Menos de 94 cm (0 puntos)."; }
elseif(($History->testfindrisk->ATTF_PCPNTS==3)and( $idsexo==1)){$Testfindrisk03="Entre 94-102 cm (3 puntos)."; }
elseif(($History->testfindrisk->ATTF_PCPNTS==4)and( $idsexo==1)){$Testfindrisk03="Más de 102 cm (4 puntos)."; }

if(($History->testfindrisk->ATTF_PCPNTS==0)and( $idsexo==2)){$Testfindrisk03="Menos de 80 cm (0 puntos)."; }
elseif(($History->testfindrisk->ATTF_PCPNTS==3)and( $idsexo==2)){$Testfindrisk03="Entre 80-88 cm (3 puntos)."; }
elseif(($History->testfindrisk->ATTF_PCPNTS==4)and( $idsexo==2)){$Testfindrisk03="Más de 88 cm (4 puntos)."; }

if($History->testfindrisk->ATTF_ACTIVIDADFISICAPNTS==0){$Testfindrisk04="Si (0 puntos).";	}
elseif($History->testfindrisk->ATTF_ACTIVIDADFISICAPNTS==2){$Testfindrisk04="No (2 puntos).";	}

if($History->testfindrisk->ATTF_CONSUMEVERDURASPNTS==0){$Testfindrisk05="Todos los días (0 puntos).";	}
elseif($History->testfindrisk->ATTF_CONSUMEVERDURASPNTS==1){$Testfindrisk05="No todos los días (1 puntos).";	}

if($History->testfindrisk->ATTF_TOMAMEDICAMENTOSPNTS==0){$Testfindrisk06="No (0 puntos).";	}
elseif($History->testfindrisk->ATTF_TOMAMEDICAMENTOSPNTS==2){$Testfindrisk06="Si (2 puntos).";	}

if($History->testfindrisk->ATTF_GLUCOSAPNTS==0){$Testfindrisk07="No (0 puntos).";	}
elseif($History->testfindrisk->ATTF_GLUCOSAPNTS==5){$Testfindrisk07="No (5 puntos).";	}

if($History->testfindrisk->ATTF_DIABETESPARIENTESPNTS==0){$Testfindrisk08="No (0 puntos).";	}
elseif($History->testfindrisk->ATTF_DIABETESPARIENTESPNTS==3){$Testfindrisk08="Si (abuelos, tios, primos) (3 puntos).";	}
elseif($History->testfindrisk->ATTF_DIABETESPARIENTESPNTS==5){$Testfindrisk08="Si (pades, hermanos, hijos) (5 puntos).";	}

if($History->testfindrisk->ATTF_TOTALPNTS>14){$Testfindrisk_total="Mayor de 14 puntos <strong>(Riesgo de diabetes)</strong>.";	}
else{$Testfindrisk_total=" ".$History->testfindrisk->ATTF_TOTALPNTS." - Menor de 14 puntos <strong>(No existe riesgo)</strong>.";	}
//fin TEST DE findrisk
	
// Set some content to print
$html = NULL;


$html='
<table width="100%" border="0">	
    
	<tr>
		<td>Fecha de atención: '.$fechtencion.'</td>
    </tr>
	
	<tr>
		<td>&nbsp;</td>
    </tr>
	
	<tr>
		<td align="center"><h3>'.$encabezado.'</h3></td>
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
	
	
	
if( 
	(($History->servicios->FINA_ID ==1) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR 
	(($History->servicios->FINA_ID ==6) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR 
	(($History->servicios->FINA_ID ==11) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR
	//INICIO 1VEZ MEDICINA GENERAL
	
	(($History->servicios->FINA_ID ==3) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)) OR 
	(($History->servicios->FINA_ID ==7) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)) OR 
	(($History->servicios->FINA_ID ==12) && ($History->servicios->tiposfinalidades->TIFI_ID ==2))
	//INICIO CONTROL MEDICINA GENERAL 
	
  )
{

$html.='
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>GENERALIDADES DE LA CONSULTA</strong></td>
				</tr>
				<tr>
					<td>

					  <table width="100%" border="0" align"justify">
						<tr>
							<td width="100%" align"justify">
							<strong>MOTIVO DE LA CONSULTA</strong>: '.$History->generalidades->ATGE_MOTIVO.'<br/>
							<strong>ENFERMEDAD ACTUAL</strong>: '.$History->generalidades->ATGE_ENFERMEDAD.'<br/>
							<strong>CAUSA EXTERNA</strong>: '.$History->generalidades->causasexternas->CAEX_NOMBRE.'.
							</td>
						</tr>
					  </table>
		  
					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES FAMILIARES</strong></td>
				</tr>
				<tr>
					<td>

						<table width="100%" border="0">
								<tr>
									<td width="20%" align"justify">DIABETES: '.$History->persona->antfamiliares->ATAF_DIABETES.'</td>
									<td width="25%" align"justify">HIPERTENSIÓN: '.$History->persona->antfamiliares->ATAF_HIPERTENSION.'</td>
									<td width="30%" align"justify">SÍNDROME CONVULSIVO: '.$History->persona->antfamiliares->ATAF_CONVULSIVO.'</td>
									<td width="25%" align"justify">MALFORMACIONES: '.$History->persona->antfamiliares->ATAF_MALFORMACIONES.'</td>
							  </tr>
							  <tr>
								   <td width="25%" align"justify">CANCER: '.$History->persona->antfamiliares->ATAF_CANCER.'</td>
							  </tr>
							  <tr>
								   <td width="100%" align"justify">OTROS: '.$History->persona->antfamiliares->ATAF_OTROS.'</td>
							  </tr>
						</table>

					</td>
				</tr>
			</table>
			
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES PERSONALES</strong></td>
				</tr>
				<tr>
					<td>

						<table width="100%" border="0">
							<tr>
								<td width="25%" align"justify">ENF. TROMBOTICA: '.$History->persona->antpersonales->ATAP_ENETOMBOTICA.'</td>
								<td width="25%" align"justify">CONVULSIONES: '.$History->persona->antpersonales->ATAP_CONVULSIONES.'</td>
								<td width="25%" align"justify">DIABETES: '.$History->persona->antpersonales->ATAP_DIABETES.'</td>
								<td width="25%" align"justify">VALVULOPATIAS: '.$History->persona->antpersonales->ATAP_VALVULOPATIAS.'</td>
							</tr>
							<tr>
								<td width="25%" align"justify">ENF. HEPÁTICA: '.$History->persona->antpersonales->ATAP_HEPATICA.'</td>
								<td width="25%" align"justify">CEFALEA: '.$History->persona->antpersonales->ATAP_CEFALEA.'</td>
								<td width="25%" align"justify">HIPERTENSIÓN: '.$History->persona->antpersonales->ATAP_HIPERTENSION.'</td>
								<td width="25%" align"justify">PATOLOGÍA MAMARIA: '.$History->persona->antpersonales->ATAP_MAMARIA.'</td>
							</tr>
							<tr> 
								<td width="100%" align"justify">OTROS: '.$History->persona->antpersonales->ATAP_OTROS.'</td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			'; if ($idsexo==2){
			  $html .='
			  <table>
				<tr>
				 <td>&nbsp;</td>
				</tr>
			  </table>

			  <table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES GINECO - OBSTETRICO</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
							<td width="25%" align"justify">MENARQUIA: '.$History->persona->antginecologicos->ATAG_MENARGUIA.'</td>
							<td width="25%" align"justify">CICLOS: '.$History->persona->antginecologicos->ATAG_CICLOS.'</td>
							<td width="25%" align"justify">FUM: '.$History->persona->antginecologicos->ATAG_FUM.'</td>
							<td width="25%" align"justify">GRAVIDA: '.$History->persona->antginecologicos->ATAG_GRAVIDA.'</td>
					  </tr>
					<tr>
							<td width="25%" align"justify">PARTOS: '.$History->persona->antginecologicos->ATAG_PARTOS.'</td>
							<td width="25%" align"justify">ABORTO: '.$History->persona->antginecologicos->ATAG_ABORTO.'</td>
							<td width="25%" align"justify">CESAREA: '.$History->persona->antginecologicos->ATAG_CESARIA.'</td>
							<td width="25%" align"justify">LACTANDO: '.$History->persona->antginecologicos->ATAG_LACTANDO.'</td>
					  </tr>
					<tr>
							<td width="25%" align"justify">DISMENORREA: '.$History->persona->antginecologicos->ATAG_DISMINORREA.'</td>
							<td width="25%" align"justify">ANTECEDENTES DE EPI: '.$History->persona->antginecologicos->ATAG_EPI.'</td>
							<td width="25%" align"justify">DESA MAS HIJOS: '.$History->persona->antginecologicos->ATAG_MASHIJOS.'</td>
							<td width="25%" align"justify"></td>
					  </tr>
					  <tr>
						   <td width="50%" align"justify">COMP. SEX ULT AÑO: '.$medigicomp.'</td>
						   <td width="50%" align"justify">ENF. TRAS. SEXUAL: '.$History->persona->antginecologicos->ATAG_ENFESEXU.'</td>
					  </tr>
					  <tr>
						   <td width="100%" align"justify">OTROS: '.$History->persona->antginecologicos->ATAG_OTROS.'</td>
					  </tr>
					  </table>

					</td>
				</tr>
			  </table>

			  ';
				}
			  $html .='
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>HÁBITOS</strong></td>
				</tr>
				<tr>
					<td>

					 <table width="100%" border="0">
					<tr>
							<td width="25%" align"justify">ALCOHOL: '.$History->persona->habitos->ATHA_ALCOHOL.'</td>
							<td width="25%" align"justify">CIGARRILLO/ ABACO: '.$History->persona->habitos->ATHA_CIGARRILLO.'</td>
							<td width="25%" align"justify">DROGAS: '.$History->persona->habitos->ATHA_DROGAS.'</td>
					  </tr>
					  <tr>
						   <td width="100%" align"justify">OTROS: '.$History->persona->habitos->ATHA_OTROS.'</td>
					  </tr>
					 </table>

					</td>
				</tr>
		    </table>
			
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>REVSIÓN POR SISTEMAS</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					  <tr>
						<td width="100%" align"justify">
						1. SÍNTOMAS GENERALES: '.$History->revsistemas->ATRS_GENERAL.'<br/>
						2. SISTEMA RESPIRATORIO: '.$History->revsistemas->ATRS_RESPIRATORIO.'<br/>
						3. SISTEMA CARDIOVASCULAR: '.$History->revsistemas->ATRS_CARDIOVASCULAR.'<br/>
						4. SISTEMA GASTROINTESTINAL: '.$History->revsistemas->ATRS_GASTROINTESTINAL.'<br/>
						5. SISTEMA GENITOURINARIO: '.$History->revsistemas->ATRS_GENITOURINARIO.'<br/>
						6. SISTEMA ENDOCRINO: '.$History->revsistemas->ATRS_ENDOCRINO.'<br/>
						7. SISTEMA NEUROLOGICO: '.$History->revsistemas->ATRS_NEUROLOGICO.'	</td>
					  </tr>
					</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>SIGNOS VITALES</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
						<td width="35%" align"justify">PRESIÓN ARTERIAL: '.$History->signosvitales->ATSV_PRESIONMM.' Mm '.$History->signosvitales->ATSV_PRESIONHH.' hg</td>
						<td width="15%" align"justify">FC: '.$History->signosvitales->ATSV_FRECUENCIAC.' x Min</td>
						<td width="25%" align"justify">FR: '.$History->signosvitales->ATSV_FRECUENCIAR.' x Min</td>
						<td width="25%" align"justify">TEMPERATURA: '.$History->signosvitales->ATSV_TEMPERATURA.'</td>
					  </tr>
					  <tr>
						<td width="35%" align"justify">TALLA: '.$History->signosvitales->ATSV_TALLA.'</td>
						<td width="15%" align"justify">PESO: '.$History->signosvitales->ATSV_PESO.'</td>
						<td width="25%" align"justify">P. CEFÁLICO: '.$History->signosvitales->ATSV_PERIMETROC.'</td>
						<td width="25%" align"justify">P. ABDOMINA: '.$History->signosvitales->ATSV_PERIMETROA.'</td>
					  </tr>
					  <tr>
						<td width="25%" align"justify">P. BRAQUIAL: '.$History->signosvitales->ATSV_PERIMETROB.'</td>
						<td width="25%" align"justify">I.M.C: '.$History->signosvitales->ATSV_IMC.'</td>
					  </tr>
					  </table>

					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>EXAMEN FÍSICO</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					  <tr>
						<td width="100%" align"justify">
						1. ASPECTO GENERAL: '.$History->exafisicos->ATEF_ASPECTO.'<br/>
						2. ESTADO EN EL QUE LLEGÓ: '.$History->exafisicos->ATEF_ESTADO.'<br/>
						3. CABEZA: '.$History->exafisicos->ATEF_CABEZA.'<br/>
						4. AGUDEZA VISUAL: '.$History->exafisicos->ATEF_VISUAL.'<br/>
						5. CUELLO: '.$History->exafisicos->ATEF_CUELLO.'<br/>
						6. TORAX : '.$History->exafisicos->ATEF_TORAX.'<br/>
						7. ABDOMEN: '.$History->exafisicos->ATEF_ABDOMEN.'<br/>
						8. GENITOURINARIO: '.$History->exafisicos->ATEF_GENITOURINARIO.'<br/>
						9. OSTEOMUSCULAR: '.$History->exafisicos->ATEF_OSTEOMUSCULAR.'<br/>
						10. PIEL Y FAERAZ: '.$History->exafisicos->ATEF_PIELYFANERAZ.'<br/>
						11. NEUROLÓGICO: '.$History->exafisicos->ATEF_NEUROLOGICO.'
						</td>
					  </tr>
					  </table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
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
					
					$html .='
					<tr>
						<td width="100%">&nbsp;</td>
					</tr>
					';
					
					
					$html .='					
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE MALTRATO?: ' .$Diagnostico->ATDI_RIESGOVICTIMA.'</td>
					</tr>
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE VIOLENCIA SEXUAL?: ' .$Diagnostico->ATDI_RIESGOVICTIMAVIO.'.</td>
					</tr>
					';			
				
				}
				$html .='
			  </table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				   <td align="center" border="1" bgcolor= "#D4E6D9"><strong>PLAN</strong></td>
				</tr>

				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
					<td width="100%" align"justify">DESCRIPCIÓN DEL PLAN: '.$History->plan->ATPL_DESCRIPCION.'</td>
					</tr>
					<tr>
						<td width="100%" align"justify">OBSERVACIONES: '.$History->plan->ATPL_OBSERVACIONES.'</td>
					  </tr>
					</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';


}else if( 
	(($History->servicios->FINA_ID ==4) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR 
	
	//INICIO 1VEZ ATENCION RIESGO CARDIOVASCULAR
	
	(($History->servicios->FINA_ID ==5) && ($History->servicios->tiposfinalidades->TIFI_ID ==2))
	//INICIO CONTROL ATENCION RIESGO CARDIOVASCULAR
	
  )
{

$html.='
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>GENERALIDADES DE LA CONSULTA</strong></td>
				</tr>
				<tr>
					<td>

					  <table width="100%" border="0" align"justify">
						<tr>
							<td width="100%" align"justify">
							<strong>MOTIVO DE LA CONSULTA</strong>: '.$History->generalidades->ATGE_MOTIVO.'<br/>
							<strong>ENFERMEDAD ACTUAL</strong>: '.$History->generalidades->ATGE_ENFERMEDAD.'<br/>
							<strong>CAUSA EXTERNA</strong>: '.$History->generalidades->causasexternas->CAEX_NOMBRE.'.
							</td>
						</tr>
					  </table>
		  
					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES FAMILIARES</strong></td>
				</tr>
				<tr>
					<td>

						<table width="100%" border="0">
								<tr>
									<td width="20%" align"justify">DIABETES: '.$History->persona->antfamiliares->ATAF_DIABETES.'</td>
									<td width="25%" align"justify">HIPERTENSIÓN: '.$History->persona->antfamiliares->ATAF_HIPERTENSION.'</td>
									<td width="30%" align"justify">SÍNDROME CONVULSIVO: '.$History->persona->antfamiliares->ATAF_CONVULSIVO.'</td>
									<td width="25%" align"justify">MALFORMACIONES: '.$History->persona->antfamiliares->ATAF_MALFORMACIONES.'</td>
							  </tr>
							  <tr>
								   <td width="25%" align"justify">CANCER: '.$History->persona->antfamiliares->ATAF_CANCER.'</td>
							  </tr>
							  <tr>
								   <td width="100%" align"justify">OTROS: '.$History->persona->antfamiliares->ATAF_OTROS.'</td>
							  </tr>
						</table>

					</td>
				</tr>
			</table>
			
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES PERSONALES</strong></td>
				</tr>
				<tr>
					<td>

						<table width="100%" border="0">
							<tr>
								<td width="25%" align"justify">ENF. TROMBOTICA: '.$History->persona->antpersonales->ATAP_ENETOMBOTICA.'</td>
								<td width="25%" align"justify">CONVULSIONES: '.$History->persona->antpersonales->ATAP_CONVULSIONES.'</td>
								<td width="25%" align"justify">DIABETES: '.$History->persona->antpersonales->ATAP_DIABETES.'</td>
								<td width="25%" align"justify">VALVULOPATIAS: '.$History->persona->antpersonales->ATAP_VALVULOPATIAS.'</td>
							</tr>
							<tr>
								<td width="25%" align"justify">ENF. HEPÁTICA: '.$History->persona->antpersonales->ATAP_HEPATICA.'</td>
								<td width="25%" align"justify">CEFALEA: '.$History->persona->antpersonales->ATAP_CEFALEA.'</td>
								<td width="25%" align"justify">HIPERTENSIÓN: '.$History->persona->antpersonales->ATAP_HIPERTENSION.'</td>
								<td width="25%" align"justify">PATOLOGÍA MAMARIA: '.$History->persona->antpersonales->ATAP_MAMARIA.'</td>
							</tr>
							<tr> 
								<td width="100%" align"justify">OTROS: '.$History->persona->antpersonales->ATAP_OTROS.'</td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			'; if ($idsexo==2){
			  $html .='
			  <table>
				<tr>
				 <td>&nbsp;</td>
				</tr>
			  </table>

			  <table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>ANTECEDENTES GINECO - OBSTETRICO</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
							<td width="25%" align"justify">MENARQUIA: '.$History->persona->antginecologicos->ATAG_MENARGUIA.'</td>
							<td width="25%" align"justify">CICLOS: '.$History->persona->antginecologicos->ATAG_CICLOS.'</td>
							<td width="25%" align"justify">FUM: '.$History->persona->antginecologicos->ATAG_FUM.'</td>
							<td width="25%" align"justify">GRAVIDA: '.$History->persona->antginecologicos->ATAG_GRAVIDA.'</td>
					  </tr>
					<tr>
							<td width="25%" align"justify">PARTOS: '.$History->persona->antginecologicos->ATAG_PARTOS.'</td>
							<td width="25%" align"justify">ABORTO: '.$History->persona->antginecologicos->ATAG_ABORTO.'</td>
							<td width="25%" align"justify">CESAREA: '.$History->persona->antginecologicos->ATAG_CESARIA.'</td>
							<td width="25%" align"justify">LACTANDO: '.$History->persona->antginecologicos->ATAG_LACTANDO.'</td>
					  </tr>
					<tr>
							<td width="25%" align"justify">DISMENORREA: '.$History->persona->antginecologicos->ATAG_DISMINORREA.'</td>
							<td width="25%" align"justify">ANTECEDENTES DE EPI: '.$History->persona->antginecologicos->ATAG_EPI.'</td>
							<td width="25%" align"justify">DESA MAS HIJOS: '.$History->persona->antginecologicos->ATAG_MASHIJOS.'</td>
							<td width="25%" align"justify"></td>
					  </tr>
					  <tr>
						   <td width="50%" align"justify">COMP. SEX ULT AÑO: '.$medigicomp.'</td>
						   <td width="50%" align"justify">ENF. TRAS. SEXUAL: '.$History->persona->antginecologicos->ATAG_ENFESEXU.'</td>
					  </tr>
					  <tr>
						   <td width="100%" align"justify">OTROS: '.$History->persona->antginecologicos->ATAG_OTROS.'</td>
					  </tr>
					  </table>

					</td>
				</tr>
			  </table>

			  ';
				}
			  $html .='
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>HÁBITOS</strong></td>
				</tr>
				<tr>
					<td>

					 <table width="100%" border="0">
					<tr>
							<td width="25%" align"justify">ALCOHOL: '.$History->persona->habitos->ATHA_ALCOHOL.'</td>
							<td width="25%" align"justify">CIGARRILLO/ ABACO: '.$History->persona->habitos->ATHA_CIGARRILLO.'</td>
							<td width="25%" align"justify">DROGAS: '.$History->persona->habitos->ATHA_DROGAS.'</td>
					  </tr>
					  <tr>
						   <td width="100%" align"justify">OTROS: '.$History->persona->habitos->ATHA_OTROS.'</td>
					  </tr>
					 </table>

					</td>
				</tr>
		    </table>
			
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
			
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>REVSIÓN POR SISTEMAS</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					  <tr>
						<td width="100%" align"justify">
						1. SÍNTOMAS GENERALES: '.$History->revsistemas->ATRS_GENERAL.'<br/>
						2. SISTEMA RESPIRATORIO: '.$History->revsistemas->ATRS_RESPIRATORIO.'<br/>
						3. SISTEMA CARDIOVASCULAR: '.$History->revsistemas->ATRS_CARDIOVASCULAR.'<br/>
						4. SISTEMA GASTROINTESTINAL: '.$History->revsistemas->ATRS_GASTROINTESTINAL.'<br/>
						5. SISTEMA GENITOURINARIO: '.$History->revsistemas->ATRS_GENITOURINARIO.'<br/>
						6. SISTEMA ENDOCRINO: '.$History->revsistemas->ATRS_ENDOCRINO.'<br/>
						7. SISTEMA NEUROLOGICO: '.$History->revsistemas->ATRS_NEUROLOGICO.'	</td>
					  </tr>
					</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>SIGNOS VITALES</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
						<td width="35%" align"justify">PRESIÓN ARTERIAL: '.$History->signosvitales->ATSV_PRESIONMM.' Mm '.$History->signosvitales->ATSV_PRESIONHH.' hg</td>
						<td width="15%" align"justify">FC: '.$History->signosvitales->ATSV_FRECUENCIAC.' x Min</td>
						<td width="25%" align"justify">FR: '.$History->signosvitales->ATSV_FRECUENCIAR.' x Min</td>
						<td width="25%" align"justify">TEMPERATURA: '.$History->signosvitales->ATSV_TEMPERATURA.'</td>
					  </tr>
					  <tr>
						<td width="35%" align"justify">TALLA: '.$History->signosvitales->ATSV_TALLA.'</td>
						<td width="15%" align"justify">PESO: '.$History->signosvitales->ATSV_PESO.'</td>
						<td width="25%" align"justify">P. CEFÁLICO: '.$History->signosvitales->ATSV_PERIMETROC.'</td>
						<td width="25%" align"justify">P. ABDOMINA: '.$History->signosvitales->ATSV_PERIMETROA.'</td>
					  </tr>
					  <tr>
						<td width="25%" align"justify">P. BRAQUIAL: '.$History->signosvitales->ATSV_PERIMETROB.'</td>
						<td width="25%" align"justify">I.M.C: '.$History->signosvitales->ATSV_IMC.'</td>
					  </tr>
					  </table>

					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>EXAMEN FÍSICO</strong></td>
				</tr>
				<tr>
					<td>

					<table width="100%" border="0">
					  <tr>
						<td width="100%" align"justify">
						1. ASPECTO GENERAL: '.$History->exafisicos->ATEF_ASPECTO.'<br/>
						2. ESTADO EN EL QUE LLEGÓ: '.$History->exafisicos->ATEF_ESTADO.'<br/>
						3. CABEZA: '.$History->exafisicos->ATEF_CABEZA.'<br/>
						4. AGUDEZA VISUAL: '.$History->exafisicos->ATEF_VISUAL.'<br/>
						5. CUELLO: '.$History->exafisicos->ATEF_CUELLO.'<br/>
						6. TORAX : '.$History->exafisicos->ATEF_TORAX.'<br/>
						7. ABDOMEN: '.$History->exafisicos->ATEF_ABDOMEN.'<br/>
						8. GENITOURINARIO: '.$History->exafisicos->ATEF_GENITOURINARIO.'<br/>
						9. OSTEOMUSCULAR: '.$History->exafisicos->ATEF_OSTEOMUSCULAR.'<br/>
						10. PIEL Y FAERAZ: '.$History->exafisicos->ATEF_PIELYFANERAZ.'<br/>
						11. NEUROLÓGICO: '.$History->exafisicos->ATEF_NEUROLOGICO.'
						</td>
					  </tr>
					  </table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
					<td align="center" border="1" bgcolor= "#D4E6D9"><strong>TEST FINDRISK</strong></td>
				</tr>
				<tr>
					<td>
					
					<table width="100%" border="0">
						<tr>
							<td width="100%" align"justify">
							1. Edad: '.$Testfindrisk01.'<br/>
							2. Índice de masa corporal: '.$Testfindrisk021.'<br/>
							3. Perímetro de la cintura medido por debajo de las costillas: '.$Testfindrisk03.'<br/>
							4. ¿Realiza habitualmente al menos 30 minutos de actividad física en el trabajo y/o en el tiempo libre?: '.$Testfindrisk04.'<br/>
							5. ¿Con que frecuencia come verduras o frutas?: '.$Testfindrisk05.'<br/>
							6. ¿Toma medicación para la hipertensión regularmente?: '.$Testfindrisk06.'<br/>
							7. ¿Le han encontrado alguna vez valores de glucosa altos?: '.$Testfindrisk07.'<br/>
							8. ¿Se le ha diagnosticado diabetes (tipo 1 o 2) a alguno de sus familiares allegados u otros parientes?: '.$Testfindrisk08.'<br/>
							<br/> ESCALA DE RIESGO TOTAL: '.$Testfindrisk_total.'
							</td>
						</tr>
					</table>

					

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';

$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
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
					
					$html .='
					<tr>
						<td width="100%">&nbsp;</td>
					</tr>
					';
					
					
					$html .='					
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE MALTRATO?: ' .$Diagnostico->ATDI_RIESGOVICTIMA.'</td>
					</tr>
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE VIOLENCIA SEXUAL?: ' .$Diagnostico->ATDI_RIESGOVICTIMAVIO.'.</td>
					</tr>
					';			
				
				}
				$html .='
			  </table>
		
		</td>
    </tr>';
	
$html.='	
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				   <td align="center" border="1" bgcolor= "#D4E6D9"><strong>PLAN</strong></td>
				</tr>

				<tr>
					<td>

					<table width="100%" border="0">
					<tr>
					<td width="100%" align"justify">DESCRIPCIÓN DEL PLAN: '.$History->plan->ATPL_DESCRIPCION.'</td>
					</tr>
					<tr>
						<td width="100%" align"justify">OBSERVACIONES: '.$History->plan->ATPL_OBSERVACIONES.'</td>
					  </tr>
					</table>

					</td>
				</tr>
			</table>
		
		</td>
    </tr>';
	
$html.='		
	<tr>
		<td>&nbsp;</td>
    </tr>';


} else if(
		  (($History->servicios->FINA_ID ==14) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR
		  //INICIO PRIMERA VEZ ASISTENCIA MEDICA TELEFONICA
		  
		  (($History->servicios->FINA_ID ==15) && ($History->servicios->tiposfinalidades->TIFI_ID ==2))
		  //INICIO COTROL ASISTENCIA MEDICA TELEFONICA
		 )
{ 

$html.='
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>GENERALIDADES DE LA CONSULTA</strong></td>
				</tr>
				<tr>
					<td>

					  <table width="100%" border="0" align"justify">
						<tr>
							<td width="100%" align"justify">
							<strong>MOTIVO DE LA CONSULTA</strong>: '.$History->generalidades->ATGE_MOTIVO.'<br/>
							<strong>ENFERMEDAD ACTUAL</strong>: '.$History->generalidades->ATGE_ENFERMEDAD.'<br/>
							<strong>CAUSA EXTERNA</strong>: '.$History->generalidades->causasexternas->CAEX_NOMBRE.'.
							</td>
						</tr>
					  </table>
		  
					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='
	<tr>
		<td>&nbsp;</td>
    </tr>';
	
$html.='	
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
					
					$html .='
					<tr>
						<td width="100%">&nbsp;</td>
					</tr>
					';
					
					
					$html .='					
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE MALTRATO?: ' .$Diagnostico->ATDI_RIESGOVICTIMA.'</td>
					</tr>
					<tr>
						<td width="100%" align="left" border="0.5">¿HA SIDO VICTIMA DE VIOLENCIA SEXUAL?: ' .$Diagnostico->ATDI_RIESGOVICTIMAVIO.'.</td>
					</tr>
					';			
				
				}
				$html .='
			  </table>
		
		</td>
    </tr>';

$html.='
	<tr>
		<td>&nbsp;</td>
    </tr>';	
	
$html.='
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" bgcolor= "#D4E6D9"><strong>RECOMENDACIONES</strong></td>
				</tr>
				<tr>
					<td>

					  <table width="100%" border="0" align"justify">
						<tr>
							<td width="100%" align"justify">'.$History->recomendaciones->ATRE_RECOMENDACIONES.'</td>
						</tr>
					  </table>
		  
					</td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
$html.='
	<tr>
		<td>&nbsp;</td>
    </tr>';	
	
$html.='
	<tr>
		<td>
		
			<table width="100%" border="0.5">
				<tr>
				  <td align="center" border="1" ><h2>¡NOS PREOCUPAMOS POR EL BIENESTAR DE TU SALUD DESDE CASA!</h2></td>
				</tr>
		    </table>
		
		</td>
    </tr>';
	
} 	


	if ($totalRecetarios>0) {
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>ORDEN DE MEDICAMENTOS E INDICACIONES</strong></td>
				</tr>
				<tr>
					<td width="3%" align="center"><strong>#</strong></td>
					<td width="18%" align="center"><strong>MEDICAMENTO</strong></td>
					<td width="18%" align="center"><strong>CONCENTRACION</strong></td>
					<td width="18%" align="center"><strong>PRESENTACIÓN</strong></td>
					<td width="32%" align="center"><strong>FORMULA</strong></td>
					<td width="11%" align="center"><strong>CANTIDAD</strong></td>
				</tr>
				';				
					$i = 1;
					foreach($Medicamentos as $Medicamento){
						$html .='
						<tr>
							<td width="3%" align="center" border="0.5">'.$i.'</td>
							<td width="18%" align="center" border="0.5">' .$Medicamento->MEDI_DESCRIPCIONATC.'</td>
							<td width="18%" align="left" border="0.5"> ' .$Medicamento->ATRE_CANTIDAD.'.</td>
							<td width="18%" align="left" border="0.5"> ' .$Medicamento->ATRE_FORMULA.'.</td>
							<td width="32%" align="left" border="0.5"> ' .$Medicamento->MEDI_CONCENTRACION.'.</td>
							<td width="11%" align="left" border="0.5"> ' .$Medicamento->MEDI_FORMAFARMACEUTICA.'.</td>
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
	
	if ($totalProcedimientos>0) {
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>ORDEN DE PROCEDIMIENTO(S)</strong></td>
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
					foreach($Procedimientos as $Procedimiento){
						$html .='
						<tr>
							<td width="6%" align="center" border="0.5">'.$i.'</td>
							<td width="10%" align="center" border="0.5">' .$Procedimiento->ATPR_CANTIDAD.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Procedimiento->PROC_SOAT.'.</td>
							<td width="60%" align="center" border="0.5">' .$Procedimiento->PROC_NOMBRE.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Procedimiento->PROC_CUPS.'.</td>
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
	
	if ($totalLaboratorios>0) {
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>ORDEN DE EXAMENES DE LABORATORIO</strong></td>
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
					foreach($Laboratorios as $Laboratorio){
						$html .='
						<tr>
							<td width="6%" align="center" border="0.5">'.$i.'</td>
							<td width="10%" align="center" border="0.5">' .$Laboratorio->ATPR_CANTIDAD.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Laboratorio->PROC_SOAT.'.</td>
							<td width="60%" align="center" border="0.5">' .$Laboratorio->PROC_NOMBRE.'</td>
							<td width="12%" align="left" border="0.5"> ' .$Laboratorio->PROC_CUPS.'.</td>
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
	
	if ($totalRemisiones>0) {
	$html .='
	<tr>
		<td>
		
			<table width="100%" border="1">
				<tr>
					<td align="center" bgcolor="#D4E6D9"><strong>REMISIÓN(ES)</strong></td>
				</tr>				
				';	
					$i = 1;
					foreach($Remisiones as $Remision){
						$html .='
						<tr>
							<td width="100%" align"justify">'.$i.') REMITIDO A: '.$Remision->ATRM_REMITIDOA.'</td>
						</tr>
						<tr>
							<td width="100%" align"justify">OBSERVACIONES: '.$Remision->ATRM_OBSERVACIONES.'<br/></td>
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
		<td width="100%">'.$funcionario.'<br/>'.$cargofuncio.' - '.$tipoccfunci.' N° '.$ccfuncionar.'.<br/>'.$medicalsoft.' </td>
    </tr>
	
</table>';	



// Print text using writeHTML()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html, true, true, true, true, '');
//$pdf->writeHTML($html, true, 0, true, 0);
// ---------------------------------------------------------
$pdf->lastPage();
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output("$tittle.pdf", 'D');

if($sw==true){
	$filenamepath = Yii::$app->basePath.'/web/pdf/'.$tittle.'.pdf';
	$pdf->Output($filenamepath, 'F');
	Yii::$app->mailer->compose()
		->setFrom([Yii::$app->params['userEmail'] => Yii::$app->params['adminEmail']])
		->setTo([$History->persona->PERS_EMAIL => $History->persona->PERS_PRIMERAPELLIDO.' '.$History->persona->PERS_PRIMERNOMBRE])
		->setSubject("Soporte de historia clínica")
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