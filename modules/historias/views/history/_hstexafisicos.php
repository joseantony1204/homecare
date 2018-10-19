<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-exafisicos']); ?>												
	<?= $form->field($model, 'ATEF_ID')->hiddenInput()->label(false); ?>						
	
    <div class="row">	
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATEF_ESTADO')->dropDownList(
																	   [ 
																		'ALERTA' => 'ALERTA', 
																		'CONCIENTE' => 'CONCIENTE',
																		'ESTUPOROSO' => 'ESTUPOROSO',
																		'INCONCIENTE' => 'INCONCIENTE',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
			    <?= $form->field($model, 'ATEF_ASPECTO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">				
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_CABEZA')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_VISUAL')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_CUELLO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_TORAX')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_ABDOMEN')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_GENITOURINARIO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">					
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_OSTEOMUSCULAR')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_PIELYFANERAZ')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATEF_NEUROLOGICO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATEF_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATEF_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-exafisicos', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
 $("#btn-update-exafisicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/exafisicos/updateajax']).'";
   var btn = $("#btn-update-exafisicos");	var form = $("#form-update-exafisicos");            
   var div = $("#div-update-exafisicos");
   var grid = "#div-grid-exafisicos";
   var index = $("#div-index-exafisicos");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>