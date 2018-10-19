<?php
$this->registerJs(" 
 $('#btn-create-agenda').on('click', function(){ 
    $('#div-create-agenda').show();
    $('#div-index-agenda').hide();		
    $('#div-update-agenda').hide();		
 });
 
 $('#btn-refresh-grid-agenda').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-agenda'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-agenda').click(function(){
        $('#create-modal-agenda').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-agenda').click(function () {
        $('#update-modal-agenda').modal('show').find('#updateContent').load($(this).attr('value'));
    });
});

 "); 
?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Estadoscitas;

$JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
	alert(moment(calEvent.start).format('h:mm:ss a') + '--' + moment(calEvent.end).format('h:mm:ss a') + ' -- ' + calEvent.title);
}
EOF;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\agendation\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agendas';
$this->params['breadcrumbs'][] = $this->title;


?>												   
<div class="agenda-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">				
						
			<tr>
				<td>	
					<!-- Validation wizard -->
					<div class="row" id="validation">
						<div class="col-12">
							<div class="card wizard-content">                            
								<section>
									<div class="row">
										<?php echo $this->render('_search',['dataProvider'=>$dataProvider,'searchModel'=>$searchModel]); ?>	 
									</div>
								</section>
								
								<div id="form-wizard-content" style="display:none"> 	
									<!-- Step 1 -->
									<h4 class="card-title">Asistente para agendar una cita</h4> 
									<?php $form = ActiveForm::begin([
										'id' => 'form-create-agenda',
										'options' => [
											'class' => 'validation-wizard wizard-circle'
										 ],										
									]);
									?>									
										<h6>Verificar datos del paciente</h6>
										
										<section>									
											<div class="row">									
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-pers_identificacion"> Identificacion: <span class="danger">*</span> </label>
														<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['class' =>'form-control', 'readonly'=>'readonly'])->label(false); ?>
														<?= Html::activeInput('hidden', $Agenda, 'PERS_ID', ['class' =>'form-control required']); ?>
													</div>
												</div>									
											</div>
											
											<div class="row">									
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-afil_primernombre"> Nombre: <span class="danger">*</span> </label>
														<?= $form->field($Personas, 'PERS_PRIMERNOMBRE')->textInput(['class' =>'form-control required'])->label(false); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-afil_segundonombre"> Segundo Nombre: </label>
														<?= $form->field($Personas, 'PERS_SEGUNDONOMBRE')->textInput(['class' =>'form-control'])->label(false); ?>												
													</div>
												</div>										
											</div>
											
											<div class="row">									
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-afil_primerapellido"> Apellido: <span class="danger">*</span> </label>
														<?= $form->field($Personas, 'PERS_PRIMERAPELLIDO')->textInput(['class' =>'form-control required'])->label(false); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-afil_segundoapellido"> Segundo Apellido: </label>
														<?= $form->field($Personas, 'PERS_SEGUNDOAPELLIDO')->textInput(['class' =>'form-control'])->label(false); ?>	
													</div>
												</div>										
											</div>
									
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-pers_direccion">Direccion Residencia: <span class="danger">*</span></label>														
														<?= $form->field($Personas, 'PERS_DIRECCION')->textInput(['class' =>'form-control required'])->label(false); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-pers_fechanacimiento">Fecha de Nacimiento: </label>
														<?php 							   
														   echo $form->field($Personas,'PERS_FECHANACIMIENTO')->
															widget(DatePicker::className(),[
																'dateFormat' => 'yyyy-MM-dd',
																'clientOptions' => [
																	'yearRange' => '-115:+0',
																	//'showWeek' => true,
																	//'firstDay' => 1,      
																	'showButtonPanel' => true,  
																	//'buttonImageOnly' => true,
																	//'showOn' =>"button",
																	//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
																	//'buttonText' =>"Seleccionar fecha",
																],
																'options' => ['class' => 'form-control required',]
															])->label(false);
														?>														
													</div>
												</div>                                           
											</div>										
										</section>
										
										<!-- Step 3 -->
										<h6>Elegir fecha, finalidad y disponibilidad médica</h6>
										
										<section>
											<div class="row">										
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-agen_fecha">Fecha para la cita: <span class="danger">*</span></label>
														<?php 							   
														   echo $form->field($Agenda,'AGEN_FECHA')->
															widget(DatePicker::className(),[
																'dateFormat' => 'yyyy-MM-dd',
																'clientOptions' => [
																	'yearRange' => '-115:+0',
																	//'showWeek' => true,
																	//'firstDay' => 1,      
																	'showButtonPanel' => true,  
																	//'buttonImageOnly' => true,
																	//'showOn' =>"button",
																	//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
																	//'buttonText' =>"Seleccionar fecha",
																],
																'options' => [
																				'class' => 'form-control required',
																				'onchange' =>'setCalendar(event);',
																			]
															])->label(false); 
														?>
														<?= Html::activeInput('hidden', $Agenda, 'AGEN_FECHAPROCESO', ['class' =>'form-control required', 'value' =>date('Y-m-d H:i:s')]); ?>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-est_id">Estado: <span class="danger">*</span></label>
														<?php 
														$Estadoscitas=Estadoscitas::find()->all();
														$listData=ArrayHelper::map($Estadoscitas,'ESCI_ID','ESCI_NOMBRE');
														?>
														<?= Html::activeDropDownList($Agenda, 'ESCI_ID',$listData,
																						[ 
																						'class' => 'custom-select form-control required',
																						]
																				    ); 
														?>
													</div>
												</div>
												
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-tifi_id">Tipo de cita: <span class="danger">*</span></label>
														<?= Html::activeDropDownList($Agenda, 'TIFI_ID','',
																						[ 
																						'prompt'=>'...', 
																						'class' => 'custom-select form-control required',
																						'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('agendation/agenda/getservicios?id=').'"+$(this).val(), function( data ){
																							$("select#agenda-fina_id").html(data);																							
																							$("select#agenda-empl_id" ).html("<option>...</option>");
																							$("#calendar").fullCalendar("removeEvents");
																						});'
																						]
																				    ); 
														?>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-fina_id">Finalidad: <span class="danger">*</span></label>
														<?= Html::activeDropDownList($Agenda, 'FINA_ID','',
																						[ 
																						'prompt'=>'...', 
																						'class' => 'custom-select form-control required',
																						'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('agendation/agenda/getmedicos?id=').'"+$(this).val()+"&fecha="+$("#agenda-agen_fecha").val(), function( data ){
																							$( "select#agenda-empl_id" ).html(data);
																							$("#calendar").fullCalendar("removeEvents");
																						});'
																						]
																				    ); 
														?>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-peem_id">Profesional: <span class="danger">*</span></label>
														<?= Html::activeDropDownList($Agenda, 'EMPL_ID','',
																						[ 
																						'prompt'=>'...', 
																						'class' => 'custom-select form-control required',
																						'onchange'=>'getmyagenda($(this).val());'
																						]
																				    ); 
														?>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div id="div-index-agenda" style="display:block">
													   <?= yii2fullcalendar\yii2fullcalendar::widget(array(
																			'id' => 'calendar',
																			'events' => Url::to(['/agendation/agenda/getagenda']),
																			'clientOptions' =>[
																				'allDaySlot' => false,
																				
																				'dayClick'=>new JsExpression('function (date, calEvent, jsEvent, view) 
																				{ 
																					var d = new Date(date.format());											
																					var  hours = d.getHours() + ":" + d.getMinutes();
																																					
																					$("#agenda-agen_horainicio").val(hours);
																					$("#agenda-agen_horafinal").val(hours);
																					
																					$("#form-create-agenda").steps("next");
																					
																					
																					/*$("#div-create-agenda").show(); 
																					//$("#div-index-agenda").hide(); 
																					//$("#div-update-agenda").hide(); */
																				}'),
																				'lang' => 'es',
																				'eventLongPressDelay' => 1500,
																				'weekNumbers' => true,
																				'selectLongPressDelay' => true,
																				'schedulerLicenseKey' =>'GPL-My-Project-Is-Open-Source',
																				'columnFormat'=> 'ddd D.M',
																				'slotLabelFormat'=> [
																					'ddd D/M',
																					'H:mm'
																				],
																				'header'=> [
																					//'left'=> 'prev,today,next',
																					'center'=> 'title',
																					//'right'=> 'month,agendaWeek,agendaDay'
																					'right'=> 'agendaDay'
																				],
																				'height' =>'auto',
																				//'defaultView' =>'agendaWeek',
																				'defaultView' =>'agendaDay',																		
																				'slotDuration' => '00:10:00',
																				'slotLabelInterval ' => '00:10:00',
																				'viewSubSlotLabel ' => true,
																				'minTime' => '06:00:00',
																				'maxTime' => '18:00:00',														
																				'selectable' => true,
																				'selectHelper' => true,
																				'drop' => true,
																				'editable' => true,
																				'eventClick' => new JsExpression($JSEventClick)
																				
																			],
															));
													   ?>
												</div>
											</div>											
										</section>
										
										<!-- Step 3 -->
										<h6>Agendar</h6>
										
										<section>
											<?= Html::activeInput('hidden', $Agenda, 'AGEN_CREATEBY', ['class' =>'form-control required', 'value' =>Yii::$app->user->getId()]); ?>
											<?= Html::activeInput('hidden', $Agenda, 'AGEN_UPDATEAT', ['class' =>'form-control required', 'value' =>date('Y-m-d H:i:s')]); ?>
											
											<div class="row">										
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-agen_fecha">Hora Inicio: <span class="danger">*</span></label>
														<div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
															<?= Html::activeInput('text', $Agenda, 'AGEN_HORAINICIO', ['class' =>'form-control required']); ?>					
														</div>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-agen_fecha">Hora Final: <span class="danger">*</span></label>
														<div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
															<?= Html::activeInput('text', $Agenda, 'AGEN_HORAFINAL', ['class' =>'form-control required']); ?>						
														</div>
													</div>
												</div>
												
											</div>										
											
											<div class="row">										
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-pers_email">Dirección de correo electrónico: <span class="danger">*</span></label>
														<?= $form->field($Personas, 'PERS_EMAIL')->textInput(['class' =>'form-control required'])->label(false); ?>													
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-pers_telefonomovil">Numero de teléfono movil: <span class="danger">*</span></label>
														<?= $form->field($Personas, 'PERS_TELEFONOMOVIL')->textInput(['class' =>'form-control required'])->label(false); ?>														
													</div>
												</div>												
											</div>
											
											<div class="row">										
												<div class="col-md-6">
													<div class="form-group">
														<label for="agenda-pers_sendemail">Recordatorio por correo electrónico?:</label>
														<?= $form->field($Personas, 'PERS_SENDMAIL')->checkBox(['uncheck' => null, 'selected' => true])->label(false); ?>												
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="personas-pers_sendsms">Recordatorio por mensaje de texto?:</label>
														<?= $form->field($Personas, 'PERS_SENDSMS')->checkBox(['uncheck' => null, 'selected' => true])->label(false); ?>														
													</div>
												</div>												
											</div>										
										</section>
										
									<?php ActiveForm::end(); ?>                           
							    </div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			
			
				
			
		</table>
	</div>
</div>

<script type="application/javascript">
function setCalendar(e){
	var fecha = e.target.value; 
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda/gettiposservicios"])?>";
	$.ajax(
	{
		url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
			$('#calendar').fullCalendar( 'gotoDate', fecha);
			$('#calendar').fullCalendar('removeEvents');
			$("select#agenda-tifi_id" ).html(data);
			$("select#agenda-fina_id" ).html('<option value="">...</option>');
			$("select#agenda-empl_id" ).html('<option value="">...</option>');
			
		},
	});
}		
function getmyagenda(medico){
    var fecha = $("#agenda-agen_fecha").val();
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda/getagendamedico?id="])?>"+medico+"&fecha="+fecha;
	$('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource', url);  
	$("#div-index-agenda").show();
}

function saveform(form){
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda/createajax"])?>";
	var home = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda"])?>";
	var div = $("#form-wizard-content");
	
	$.ajax(
	{
		url: url,
		type:'POST',
		data: form.serialize(),
		success:function(data){
			
			if(data!='save'){
				alert(data);
			}else if(data=='save'){
			window.location.href = home;	
			}
		},
	});

	
}       

</script>

