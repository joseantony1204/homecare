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

use app\modules\configuration\models\Personas;
use app\modules\afiliaciones\models\Cuentasbancarias;

// create new PDF document
$logo="tcpdf_logo.png";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData($logo, 160, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

$tittle = 'AFILIACION_No.'.$Afiliados->AFIL_ID;

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ING. JOSE ANTONIO GONZALEZ LIÑAN');
$pdf->SetTitle($tittle);
$pdf->SetSubject('FORMATO');
$pdf->SetKeywords('AFILIACION, AFILIACION,');

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
$pdf->SetFont('times', 'K', 8.5, '', true);

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
   
//Obtener la fecha de la afiliacion
$dia = date("d",strtotime($Afiliados->AFIL_FECHAINGRESO));
$mes=NombreMes(date("m",strtotime($Afiliados->AFIL_FECHAINGRESO)));
$anio = date("Y",strtotime($Afiliados->AFIL_FECHAINGRESO));
$fechaIngreso = $dia." de ".$mes." de ".$anio;

$pdf->AddPage();
// set alpha to semi-transparency
$pdf->SetAlpha(0.1);
// draw jpeg image
$image = Yii::$app->basePath.'/web/img/marca_agua.png';
$pdf->Image($image, 30, 60, 150, 150, '','', '', true, 72);
// restore full opacity
$pdf->SetAlpha(1);

$nombre = $Afiliados->persona->PERS_PRIMERNOMBRE.' '.$Afiliados->persona->PERS_SEGUNDONOMBRE.' '.$Afiliados->persona->PERS_PRIMERAPELLIDO.' '.$Afiliados->persona->PERS_SEGUNDOAPELLIDO;
$tipoidentificacion = $Afiliados->persona->tiposidentificaciones->TIID_DETALLE;
$identificacion = $Afiliados->persona->PERS_IDENTIFICACION;

$fnacimiento = $Afiliados->persona->PERS_FECHANACIMIENTO;
$fexpediciondoc = $Afiliados->persona->PERS_FECHAEXPEDICION;
$lugarexpediciondoc = $Afiliados->persona->PERS_LUGAREXPEDICION;

$genero = $Afiliados->persona->genero->TIGE_DETALLE;
$estrato = $Afiliados->persona->estractos->ESTR_NOMBRE;
$nivelestudio = $Afiliados->persona->nivelesestudios->NIES_NOMBRE;

$email = $Afiliados->persona->PERS_EMAIL;
$telefonofijo = $Afiliados->persona->PERS_TELEFONO;
$celular = $Afiliados->persona->PERS_TELEFONOMOVIL;

$direccion = $Afiliados->persona->PERS_DIRECCION;
$barrio = $Afiliados->persona->PERS_BARRIO;
$zona = $Afiliados->persona->zonas->ZONA_NOMBRE;

$eps = $Afiliados->persona->epss->EPSS_NOMBRE;
$otraeps = $Afiliados->persona->PERS_CUALOTRAEPS;


$tipoplan = $Afiliados->tipoplan->TIPL_NOMBRE;
$plan = $Afiliados->planes->PLAN_NOMBRE;
$valorplan = $Afiliados->planes->PLAN_VALOR;


//beneficiarios							
$Beneficiarios = Personas::find()
		                    ->alias('t')
							->select('t.*')
							->where(['b.AFIL_ID' => $Afiliados->AFIL_ID])
							->innerJoin('TBL_BENEFICIARIOS b', 'b.PERS_ID = t.PERS_ID')
							->all();
							
//cuentas							
$Cuentas = Cuentasbancarias::find()
		                    ->alias('t')
							->select('t.*')
							->where(['a.AFIL_ID' => $Afiliados->AFIL_ID])
							->innerJoin('TBL_AFILIADOS a', 'a.AFIL_ID = t.AFIL_ID')
							->all();



// Set some content to print
$html = NULL;
$html='
<table width="100%" border="0">	
	<tr>
		<td>&nbsp;</td>
	</tr>
	
	<tr>
		<td>
			<table width="100%" border="1">	
				<tr>
					<td>
						<table width="100%" border="0">	  
							
							
							<tr>
								<td align="center" border="0"><h3>SOLICITUD DE VINCULACION | Fecha: '.$fechaIngreso.'</h3></td>
							</tr>	
							 
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">1. INFORMACION BÁSICA DE CLIENTE</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0.2">
													<tr>
														<td width="35%"><strong>Nombres y Apellidos</strong></td>
														<td width="30%"><strong>Tipo de Identificación</strong></td>
														<td width="35%"><strong>Identificación</strong></td>
													</tr>							
													<tr>
														<td>'.$nombre.'</td>
														<td>'.$tipoidentificacion.'</td>
														<td>'.$identificacion.'</td>
													</tr>							
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>							
													<tr>
														<td width="35%"><strong>Fecha de Nacimiento</strong></td>
														<td width="30%"><strong>Lugar Expedición</strong></td>
														<td width="35%"><strong>Fecha Expedición</strong></td>
													</tr>
													
													<tr>
														<td>'.$fnacimiento.'</td>
														<td>'.$fexpediciondoc.'</td>
														<td>'.$lugarexpediciondoc.'</td>
													</tr>							
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>							
													<tr>
														<td width="35%"><strong>Genero</strong></td>
														<td width="30%"><strong>Estrato</strong></td>
														<td width="35%"><strong>Nivel de estudios</strong></td>
													</tr>							
													<tr>
														<td>'.$genero.'</td>
														<td>'.$estrato.'</td>
														<td>'.$nivelestudio.'</td>
													</tr>							
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>							
													<tr>
														<td width="35%"><strong>Email</strong></td>
														<td width="30%"><strong>Telefono Fijo</strong></td>
														<td width="35%"><strong>Celular</strong></td>
													</tr>							
													<tr>
														<td>'.$email.'</td>
														<td>'.$telefonofijo.'</td>
														<td>'.$celular.'</td>
													</tr>							
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>							
													<tr>
														<td width="35%"><strong>Direeción</strong></td>
														<td width="30%"><strong>Barrio</strong></td>
														<td width="35%"><strong>Zona</strong></td>
													</tr>							
													<tr>
														<td>'.$direccion.'</td>
														<td>'.$barrio.'</td>
														<td>'.$zona.'</td>
													</tr>							
												</table>

											</td>
										</tr>
									</table>
								
								</td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">2. SERVICIO DE SALUD ACTUAL</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0.2">
													<tr>
														<td width="60%"><strong>Nombre de Eps</strong></td>
														<td width="40%"><strong>Otra entidad</strong></td>
													</tr>							
													<tr>
														<td>'.$eps.'</td>
														<td>'.$otraeps.'</td>
													</tr>
													
												</table>

											</td>
										</tr>
									</table>
								
								</td>
							</tr>
							

							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">3. PERSONA DE CONTACTO</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0.2">
													<tr>
														<td width="40%"><strong>Persona de contacto</strong></td>
														<td width="20%"><strong>Parentesco</strong></td>
														<td width="20%"><strong>Celular</strong></td>
														<td width="20%"><strong>Telefono fijo</strong></td>
													</tr>							
													<tr>
														<td>'.$Afiliados->AFIL_PERSONACONTACTO.'</td>
														<td>'.$Afiliados->AFIL_PARENTESCOPERSONACONTACTO.'</td>
														<td>'.$Afiliados->AFIL_MOVILPERSONACONTACTO.'</td>
														<td>'.$Afiliados->AFIL_FIJOPERSONACONTACTO.'</td>
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
							
							$html .='
							<tr>
								<td>
								
									<table width="100%" border="0.2">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">4. BENEFICIARIOS</font></strong></td>
										</tr>
										';	
										foreach($Beneficiarios as $Beneficiario){
											$nombrebeneficiario = $Beneficiario->PERS_PRIMERNOMBRE.' '.$Beneficiario->PERS_SEGUNDONOMBRE.' '.$Beneficiario->PERS_PRIMERAPELLIDO.' '.$Beneficiario->PERS_SEGUNDOAPELLIDO;
											$html .='
											<tr>
												<td width="30%"><strong>Tipo de Identificación</strong></td>
												<td width="35%"><strong>Identificación</strong></td>
												<td width="35%"><strong>Nombres y Apellidos</strong></td>
											</tr>
											
											<tr>
												<td>'.$Beneficiario->tiposidentificaciones->TIID_DETALLE.'</td>
												<td>'.$Beneficiario->PERS_IDENTIFICACION.'</td>
												<td>'.$nombrebeneficiario.'</td>
											</tr>
											
											<tr>
												<td colspan="3">&nbsp;</td>
											</tr>
											
											<tr>
												<td width="30%"><strong>Tipo relación/Parentesco</strong></td>
												<td width="35%"><strong>Eps</strong></td>
												<td width="35%"><strong>Fecha Nacimiento</strong></td>
											</tr>
											
											<tr>
												<td>&nbsp;</td>
												<td>'.$Beneficiario->epss->EPSS_NOMBRE.'</td>
												<td>'.$Beneficiario->PERS_FECHANACIMIENTO.'</td>
											</tr>
											
											<tr>
												<td colspan="3">&nbsp;</td>
											</tr>
											
											<tr>
												<td width="30%"><strong>Dirección</strong></td>
												<td width="35%"><strong>Teléfono</strong></td>
												<td width="35%"><strong>Género</strong></td>
											</tr>
											
											<tr>
												<td>'.$Beneficiario->PERS_DIRECCION.'</td>
												<td>'.$Beneficiario->PERS_TELEFONOMOVIL.'</td>
												<td>'.$Beneficiario->genero->TIGE_DETALLE.'</td>
											</tr>
											';	
										}
										$html .='
									</table>
								
								</td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>';
							
							$html .='
							<tr>
								<td>
								
									<table width="100%" border="0.2">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">5. INFORMACION DEL DEBITO AUTOMATICO</font></strong></td>
										</tr>
										';	
										foreach($Cuentas as $Cuenta){
											
											$html .='
											<tr>
												<td width="30%"><strong>Nombre entidad Financiera</strong></td>
												<td width="35%"><strong>Número de cuenta o Tarjeta de crédito</strong></td>
												<td width="35%"><strong>Fecha vencimiento</strong></td>
											</tr>
											
											<tr>
												<td>'.$Cuenta->bancos->BANC_NOMBRE.'</td>
												<td>'.$Cuenta->FOPA_NUMEROCUENTA.'</td>
												<td>'.$Cuenta->FOPA_FECHAVENCIMIENTO.'</td>
											</tr>
											
											<tr>
												<td colspan="3">&nbsp;</td>
											</tr>
											
											<tr>
												<td width="50%"><strong>Tipo de cuenta</strong></td>
												<td width="50%"><strong>Periocidad de pago</strong></td>
											</tr>
											
											<tr>
												<td>'.$Cuenta->tiposcuentas->TICU_NOMBRE.'</td>
												<td>'.$Cuenta->periocidadpagos->PEPA_NOMBRE.'</td>
											</tr>
											';	
										}
										$html .='
									</table>
								
								</td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">6. MEDIGROUP HOME CARE</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0.2">
													<tr>
														<td width="34%"><strong>Tipo afiliado</strong></td>
														<td width="33%"><strong>Nombre del plan</strong></td>
														<td width="33%"><strong>Valor plan</strong></td>
													</tr>							
													<tr>
														<td>'.$tipoplan.'</td>
														<td>'.$plan.'</td>
														<td>$'.number_format($valorplan).'</td>
													</tr>
													
												</table>

											</td>
										</tr>
									</table>
								
								</td>
							</tr>
							

							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">7. ASESOR COMERCIAL</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0.2">
													<tr>
														<td width="100%"><strong>Nombres y Apellidos</strong></td>											
													</tr>							
													<tr>
														<td>'.$Afiliados->AFIL_ASESOR.'</td>											
													</tr>
													
												</table>

											</td>
										</tr>
									</table>
								
								</td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>
								
									<table width="100%" border="0">
										<tr>
											<td align="left" border="0" bgcolor= "#59BF2E"><strong><font color="#FFFFFF">8. TITULAR</font></strong></td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0">
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													</tr>
													
													<tr>
														<td><hr></td>
														<td>&nbsp;</td>
													</tr>
							
													<tr>
														<td width="50%" align="left"><strong>FIRMA DEL TITULAR</strong></td>
														<td width="50%" align="rigth"><strong>HUELLA INDICE DERECHO</strong></td>
													</tr>							
												</table>

											</td>
										</tr>
									</table>
								
								</td>
							</tr>	
						</table>
					</td>
				</tr>		
			</table>
		</td>
	</tr>		
</table>			
	';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);	
$pdf->SetFont('times', 'K', 8.5, '', true);
$pdf->AddPage();
// set alpha to semi-transparency
$pdf->SetAlpha(0.1);
// draw jpeg image
$image = Yii::$app->basePath.'/web/img/marca_agua.png';
$pdf->Image($image, 30, 60, 150, 150, '','', '', true, 72);
// restore full opacity
$pdf->SetAlpha(1);	
	
$htmlprotocolo='
<table width="100%" border="0">	
	<tr>							
		<td>&nbsp;</td>
	</tr>
	
	<tr>
		<td>					
			<table width="100%" border="1">	
				
				<tr>
					<td>
						<table width="100%" border="0">	
							<tr>
								<td align="center" border="0" bgcolor= "#59BF2E"><font color="#FFF"><h4>POROTOCOLO GENERAL DE SOLICITUD DE LOS SERVICIOS DE MEDIGROUP HOME CARE S.A.S</h4></font></td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>En caso de que el <strong>titular/beneficiario</strong> requiera de alguno de los servicios contratados con <strong>MEDIGROUP HOME CARE S.A.S</strong>, se procederá de la siguiente manera:</td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>			
									<ol type="a">
										<li align="justify"><strong>EL TITULAR/BENEFICIARIO</strong>,  que requiera los servicios de Medigroup Home Care se comunicará con <strong>MEDIGROUP HOME CARE S.A.S</strong> al número telefónico de asistencias en la ciudad de Riohacha: 7270680. Para cualquier información y servicio al cliente por favor comunicarse a los teléfonos 7270680 en la ciudad de Riohacha.</li>
										<li align="justify"><strong>EL TITULAR/BENEFICIARIO</strong>, procederá a suministrar al funcionario de <strong>MEDIGROUP HOME CARE</strong> que atienda la llamada respectiva, todos los datos necesarios para identificarlo como el <strong>titular/beneficiario</strong>, así como los demás datos que sean necesarios con el fin de poder prestar el servicio solicitado, tales como: la ubicación exacta del titular/beneficiario, enmarcada dentro de nuestro campo de operaciones, numero del teléfono en el cual pueda localizarlo; descripción por parte del <strong>titular/beneficiario</strong> del problema que sufre y el tipo de ayuda que precise, etc.</li> 
										<li align="justify"><strong>MEDIGROUP HOME CARE</strong> confirmará si el solicitante de los servicios de asistencias tiene o no derecho a recibir la prestación de los mismos.</li>
										<li align="justify">Una vez cumplidos todos los requisitos indicados, <strong>MEDIGROUP HOME CARE</strong> prestará al titular/beneficiario, los servicios solicitados por medio de la coordinación de los servicios a la red de prestadores  de <strong>MEDIGROUP HOME CARE S.A.S</strong> de conformidad con los términos y condiciones del plan contratado. </li> 
										<li align="justify">Queda entendido que el personal de<strong>MEDIGROUP HOME CARE</strong> únicamente prestará los servicios de asistencias contemplados a las personas que figuren como <strong>titular/beneficiarios</strong>.</li> 
										<li align="justify">En caso de que el titular/beneficiario no cumpla adecuadamente con los requisitos indicados o requeridos por el funcionario, <strong>MEDIGROUP HOME CARE</strong> no asumirá responsabilidad ni gasto alguno relacionado con la no prestación de los servicios contratados.</li>  
									</ol>		
								</td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>En caso de que el <strong>Tratamiento de datos personales / incumplimiento en los pagos</strong></td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>
									<div align="justify"><strong>AUTORIZACION DE TRATAMIENTO DE DATOS PERSONALES</strong>: de conformidad con lo previsto en la ley 1581, el cliente autoriza expresamente a <strong>MEDIGROUP HOME CARE S.A.S</strong> para que realice el tratamiento de los datos personales, así como los datos biométricos tales como huella y fotografía, que se han inscrito en la presente solicitud. Los datos entregados serán incorporados en la base de datos propiedad de <strong>MEDIGROUP HOME CARE S.A.S</strong> y serán utilizados para las siguientes finalidades:</div>
								</td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>			
									<ul style="list-style-type:square">
										<li align="justify">Adelantar la gestión administrativa y comercial de la presente solicitud.</li>
										<li align="justify">Verificar la identidad del cliente para toda clase de actos que ejecute y celebre con <strong>MEDIGROUP HOME CARE S.A.S</strong>.</li>
										<li align="justify">Mejora, ofrecimiento y ampliación de los productos y/o servicios contratados con <strong>MEDIGROUP HOME CARE S.A.S</strong> incluidos remisión de información promocional o comercial de los productos de <strong>MEDIGROUP HOME CARE S.A.S</strong> y terceros con los cuales esta tenga convenios.</li> 
										<li align="justify">Transferencias y/o trasmisión a terceros con los cuales <strong>MEDIGROUP HOME CARE S.A.S</strong>.</li>
										<li align="justify">Labores derivadas de la eventual relación contractual  que se genere entre el cliente y <strong>MEDIGROUP HOME CARE S.A.S</strong> El cliente podrá ejercer los derechos de acceso, actualización, rectificación, revocatoria y supresión de los datos personales de conformidad con lo previsto en la ley 1581, a través de la solicitud remitida al correo medigrouphomecare@gmail.com y al teléfono 7270680 de Riohacha.</li>
										<li align="justify">El presente contrato tendrá como requisito fundamental una permanencia del titular/beneficiario no inferior a 12 meses, contados a partir de la radicación del mismo.</li>  
									</ul>		
								</td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>
									<div align="justify"><strong>Código de conducta frente aportes contratados</strong></div>
								</td>
							</tr>
							
							<tr>							
								<td>&nbsp;</td>
							</tr>
							
							<tr>							
								<td>
									
									<ul style="list-style-type:square">
										<li align="justify">Luego de radicado el presente contrato este no podrá ser reducido y /o modificado u subcontratado en los pagos y cuotas acordadas relacionadas en el mismo.</li>   
										<li align="justify">El retraso o incumplimiento en el pago de las cuotas acordadas generara sanciones de acuerdo al código de conducta de <strong>MEDIGROUP HOME CARE S.A.S</strong></li>  
										<li align="justify">El presente Código de Conducta de <strong>MEDIGROUP HOME CARE S.A.S</strong> tiene por objeto, establecer las políticas y procedimientos para garantizar el adecuado cumplimiento de la Ley 1581 de 2012 (en adelante Ley General de Protección de Datos), el Decreto
										1377 de 2013 (en adelante el Decreto) los principios y los mecanismos para la atención de consultas y reclamos por parte de los
										Titulares de la información de naturaleza pública que Experian Colombia S.A. obtiene de los Registros Públicos regulados por la
										Ley 1712 de 2014 - de Transparencia y del Derecho de Acceso a la Información Pública Nacional y, en general, a la información
										regulada por la Ley 1581 de 2012- general de protección de datos. La información crediticia, comercial, de servicios y proveniente 
										de terceros países amparada por la Ley 1266 de 2008 – de habeas data nanciero – y que administra DataCrédito no hace parte del
										presente Código de Conducta. Para conocer el procedimiento para ejercer sus derechos en relación con este tipo de información,
										se debe acudir al Código de Conducta de Data Crédito.

										<strong>NOTA DE PERMANENCIA</strong>: El presente contrato tendrá un vigencia de un año y será prorrogado de forma automática salvo previa notificación escrita del usuario un mes antes del termino del mismo. Por lo tanto el valor de la anualidad será facturado al usuario
										sin discriminación de uso u atraso en los pagos ponderados al momento de la firma del mismo, es así como el usuario al momento 
										de la firma del presente documento queda notificado de forma automática sobre las medidas a tomar en torno al  incumplimiento   en 
										el pago de la obligaciones contractuales con <strong>MEDIGROUP HOME CARE .S.A.S</strong></li> 
									</ul>			
								</td>
							</tr>
							
						</table>
				
					</td>
				</tr>		
			</table>
			
		</td>
	</tr>		
</table>	
	';


// Print text using writeHTML()
$pdf->writeHTMLCell(0, 0, '', '', $htmlprotocolo, 0, 1, 0, true, '', true);
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
