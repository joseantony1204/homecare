<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-create-recetarios']); ?>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<label for="history-diag_id">Medicamento <span class="danger">*</span></label>
				<?php 
					echo \yii\jui\AutoComplete::widget([    
					'clientOptions' => [
					'source' => \yii\helpers\Url::to(['/historias/recetarios/autocomplete']),
					'minLength'=>'3', 
					'autoFill'=>true,
					'select' => new \yii\web\JsExpression("function( event, ui ) {
									$('#recetarios-medi_id').val(ui.item.id);
								 }")],
					'options' => [
									'class' => 'custom-search form-control required',
									'placeholder'=>'Escriba algo para comenzar la busqueda...'
								 ]			 
					]);		
					
				?>
				<?= Html::activeHiddenInput($model, 'MEDI_ID')?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php 							   
				   echo $form->field($model,'ATRE_FECHAINICIO')->
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
					]); 
				?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRE_CANTIDAD')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRE_TOMACADA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATRE_TOMACADADESCRIPCION')->dropDownList([ 'Horas' => 'Horas', 'Dias' => 'Dias'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
										
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRE_DURACION')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATRE_DURACIONDESCRIPCION')->dropDownList(
																	   [ 
																	   'Dias'=>'Dias',
																	   'Segun Evolucion Clinica'=>'Segun Evolucion Clinica',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATRE_DETALLES')->dropDownList(
																	   [ 
																	   'En ayunas'=>'En ayunas',
																	   'Antes de la comida'=>'Antes de la comida',
																	   'Durante la comida'=>'Durante la comida',
																	   'Despues de la comida'=>'Despues de la comida',
																	   'En el dia'=>'En el dia',
																	   'En la noche'=>'En la noche',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATRE_VIASUMINISTRO')->dropDownList(
																	   [ 
																	   'Oral'=>'Oral',
																	   'Sublingual'=>'Sublingual',
																	   'Topica'=>'Topica',
																	   'Transdermica'=>'Transdermica',
																	   'Oftalmologica'=>'Oftalmologica',
																	   'Inhalatoria'=>'Inhalatoria',
																	   'Intranasal'=>'Intranasal',
																	   'Rectal'=>'Rectal',
																	   'Vaginal'=>'Vaginal',
																	   'Parental'=>'Parental',
																	   'Intramuscular'=>'Intramuscular',
																	   'Subcutanea'=>'Subcutanea',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<?= $form->field($model, 'ATRE_FORMULA')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>	

					
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-recetarios', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-recetarios").hide(); $("#div-index-recetarios").show();', 'title' => 'Cancelar' ]); ?>
	
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATRE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATRE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

																	
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-recetarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/recetarios/createajax']).'";
   var btn = $("#btn-register-recetarios");	var form = $("#form-create-recetarios");
   var div = $("#div-create-recetarios");   var grid = "#div-grid-recetarios";
   var index = $("#div-index-recetarios");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>