<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-signosvitales']); ?>												
	<?= $form->field($model, 'ATSV_ID')->hiddenInput()->label(false); ?>

    <div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PRESIONHH')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PRESIONMM')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_TEMPERATURA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
		
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PESO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_TALLA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_IMC')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PERIMETROA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PERIMETROC')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_PERIMETROB')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_FRECUENCIAC')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATSV_FRECUENCIAR')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>
	
	
	
				

    <?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATSV_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATSV_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-signosvitales', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
	 $("#signosvitales-atsv_peso").keyup(function() {
	   var talla = parseInt($("#signosvitales-atsv_talla").val());      
	   var peso = parseInt($("#signosvitales-atsv_peso").val());
	   var medisigvtamts = (talla/100);
	   
	   if(medisigvtamts>0){
		 var medisigimc =  peso/(medisigvtamts*medisigvtamts);
		 $("#signosvitales-atsv_imc").val(medisigimc);
	   } 
	});

	$("#signosvitales-atsv_talla").keyup(function() {
	   var talla = parseInt($("#signosvitales-atsv_talla").val());      
	   var peso = parseInt($("#signosvitales-atsv_peso").val());
	   var medisigvtamts = (talla/100);
	   
	   if(medisigvtamts>0){
		 var medisigimc =  peso/(medisigvtamts*medisigvtamts);
		 $("#signosvitales-atsv_imc").val(medisigimc);
	   } 
	});
 
 $("#btn-update-signosvitales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/signosvitales/updateajax']).'";
   var btn = $("#btn-update-signosvitales");	var form = $("#form-update-signosvitales");            
   var div = $("#div-update-signosvitales");
   var grid = "#div-grid-signosvitales";
   var index = $("#div-index-signosvitales");   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>