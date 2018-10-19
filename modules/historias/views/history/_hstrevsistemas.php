<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-revsistemas']); ?>												
	<?= $form->field($model, 'ATRS_ID')->hiddenInput()->label(false); ?>						
	
    <div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_GENERAL')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_RESPIRATORIO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_CARDIOVASCULAR')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
	</div>
	
	<div class="row">		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_GASTROINTESTINAL')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
										
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_GENITOURINARIO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_ENDOCRINO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<?= $form->field($model, 'ATRS_NEUROLOGICO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>		
					
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATRS_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATRS_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-revsistemas', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>



<?php
$this->registerJs(' 
 $("#btn-update-revsistemas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/revsistemas/updateajax']).'";
   var btn = $("#btn-update-revsistemas");	var form = $("#form-update-revsistemas");            
   var div = $("#div-update-revsistemas");
   var grid = "#div-grid-revsistemas";
   var index = $("#div-index-revsistemas");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>