<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\Generos;
use app\modules\configuration\models\Estadosciviles;
use app\modules\configuration\models\Estadosafiliados;
use app\modules\configuration\models\Planes;
use app\modules\configuration\models\Epss;
use app\modules\configuration\models\Estractos;
use app\modules\configuration\models\Zonas;
use app\modules\configuration\models\Nivelesestudios;
use app\modules\configuration\models\Tipoplan;


/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Afiliados */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-create-afiliados', 
										 'enableClientValidation' => true, 
									     'options' => ['enctype' => 'multipart/form-data']
									]); 
?>	
<?= $form->field($Personas, 'PERS_ID')->hiddenInput()->label(false); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 1. Estado inicial del afiliado</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Estadosafiliados=Estadosafiliados::find()->all();
							$listData=ArrayHelper::map($Estadosafiliados,'ESAF_ID','ESAF_NOMBRE');
							echo $form->field($model, 'ESAF_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>	
				</div>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 2. Infomación básica del cliente</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Tiposidentificaciones=Tiposidentificaciones::find()->all();
							$listData=ArrayHelper::map($Tiposidentificaciones,'TIID_ID','TIID_DETALLE');
							echo $form->field($Personas, 'TIID_ID')->dropDownList($listData, ['class' => 'custom-select form-control required'])->label('Tipo de Identificacion*');
							?>		
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Identificacion*'); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">
							<?= $form->field($Personas, 'PERS_LUGAREXPEDICION')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>		
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 							   
							   echo $form->field($Personas,'PERS_FECHAEXPEDICION')->
								widget(DatePicker::className(),[
									'dateFormat' => 'yyyy-MM-dd',
									'clientOptions' => [
										'yearRange' => '-115:+0',
										'changeMonth'=> true,
										'changeYear'=> true,
										'autoSize'=>true,
										//'showWeek' => true,
										//'firstDay' => 1,      
										'showButtonPanel' => true,  
										//'buttonImageOnly' => true,
										//'showOn' =>"button",
										//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
										//'buttonText' =>"Seleccionar fecha",
									],
									'options' => ['class' => 'form-control required',]
								]); 
							?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERNOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Nombre*'); ?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SEGUNDONOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Apellido*'); ?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SEGUNDOAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php 							   
							   echo $form->field($Personas,'PERS_FECHANACIMIENTO')->
								widget(DatePicker::className(),[
									'dateFormat' => 'yyyy-MM-dd',
									'clientOptions' => [
										'yearRange' => '-115:+0',
										'changeMonth'=> true,
										'changeYear'=> true,
										'autoSize'=>true,
										//'showWeek' => true,
										//'firstDay' => 1,      
										'showButtonPanel' => true,  
										//'buttonImageOnly' => true,
										//'showOn' =>"button",
										//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
										//'buttonText' =>"Seleccionar fecha",
									],
									'options' => ['class' => 'form-control required',]
								])->label('Fecha Nacimiento*'); 
							?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Generos=Generos::find()->all();
							$listData=ArrayHelper::map($Generos,'TIGE_ID','TIGE_DETALLE');
							echo $form->field($Personas, 'TIGE_ID')->dropDownList($listData, ['class' => 'custom-select form-control required'])->label(false);
							?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Estadosciviles=Estadosciviles::find()->all();
							$listData=ArrayHelper::map($Estadosciviles,'ESCI_ID','ESCI_NOMBRE');
							echo $form->field($Personas, 'ESCI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Estractos=Estractos::find()->all();
							$listData=ArrayHelper::map($Estractos,'ESTR_ID','ESTR_NOMBRE');
							echo $form->field($Personas, 'ESTR_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Nivelesestudios=Nivelesestudios::find()->all();
							$listData=ArrayHelper::map($Nivelesestudios,'NIES_ID','NIES_NOMBRE');
							echo $form->field($Personas, 'NIES_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_EMAIL')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_TELEFONOMOVIL')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_TELEFONO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
				</div>
					
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SENDMAIL')->checkBox(['uncheck' => null, 'selected' => true]); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SENDSMS')->checkBox(['uncheck' => null, 'selected' => true]); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
											
						</div>
					</div>
					
				</div>
				
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_DIRECCION')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_BARRIO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Zonas=Zonas::find()->all();
							$listData=ArrayHelper::map($Zonas,'ZONA_ID','ZONA_NOMBRE');
							echo $form->field($Personas, 'ZONA_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
				</div>
				
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 3. Servicio de salud actual</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">				
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Epss=Epss::find()->all();
							$listData=ArrayHelper::map($Epss,'EPSS_ID','EPSS_NOMBRE');
							echo $form->field($Personas, 'EPSS_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>										
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_CUALOTRAEPS')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
				</div>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 4. Persona de contacto</div>
		</div>			
		<div class="card card-body">	
			<section>
			
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'AFIL_PERSONACONTACTO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'AFIL_PARENTESCOPERSONACONTACTO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
				</div>
				
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'AFIL_MOVILPERSONACONTACTO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'AFIL_FIJOPERSONACONTACTO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
				</div>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 5. Plan al cual se afiliará</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">					
							<?php 
							$Tipoplan=Tipoplan::find()->all();
							$listData=ArrayHelper::map($Tipoplan,'TIPL_ID','TIPL_NOMBRE');
							echo $form->field($model, 'TIPL_ID')->dropDownList($listData,
							[
							'class' => 'custom-select form-control required',
							'prompt'=>'...',
							'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('afiliaciones/afiliados/getplanes?id=').'"+$(this).val(),     
								function( data ){
									$("select#afiliados-plan_id").html(data);																					
								});'
							])->label('Tipo de afiliado*');
							?>			
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<?php 							
							echo $form->field($model, 'PLAN_ID')->dropDownList('', ['prompt'=>'...', 'class' => 'custom-select form-control required'])->label('Plan*');
							?>			
						</div>
					</div>
					
				</div>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 6. Asesor comercial</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<?= $form->field($model, 'AFIL_ASESOR')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
					
				</div>			
			</section>
		</div>
	</div>
</div>


		
<?= $form->field($Personas, 'PERS_PATHIMG')->hiddenInput()->label(false); ?>					
<?= $form->field($Personas, 'PAIS_ID')->hiddenInput()->label(false); ?>
<?= $form->field($Personas, 'DEPA_ID')->hiddenInput()->label(false); ?>
<?= $form->field($Personas, 'MUNI_ID')->hiddenInput()->label(false); ?>


<?= $form->field($Personas, 'PERS_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($Personas, 'PERS_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'AFIL_FECHAINGRESO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>    


<?= $form->field($model, 'AFIL_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'AFIL_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

<div class="form-group">
	<?php echo Html::button('<i class="fa fa-share-square"> Continuar...</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-afiliados', 'title' => 'Continuar...' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-afiliados").hide(); $("#div-search-afiliados").show();', 'title' => 'Cancelar' ]); ?>					
</div>

<?php ActiveForm::end(); ?>
					


<?php
$this->registerJs(' 
 $("#btn-register-afiliados").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/afiliados/createajax']).'";
   var btn = $("#btn-register-afiliados");	var form = $("#form-create-afiliados");
   var div = $("#div-create-afiliados");   var grid = "#div-grid-afiliados";
   var index = $("#div-index-afiliados");
   jsaveformafiliados(url,btn,form,div,grid,index);   
 }); 
 ');
?>