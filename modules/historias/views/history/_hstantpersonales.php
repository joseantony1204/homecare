<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<?php $form = ActiveForm::begin(['id' => 'form-update-antpersonales']); ?>
	<?= $form->field($model, 'ATAP_ID')->hiddenInput()->label(false); ?>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAP_HIPERTENSION')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAP_DIABETES')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAP_ENETOMBOTICA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAP_CONVULSIONES')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAP_VALVULOPATIAS')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAP_HEPATICA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAP_CEFALEA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAP_MAMARIA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAP_OTROS')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATAP_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATAP_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-antpersonales', 
									'title' => 'Actualizar',
								]
						   ); 
	?>
    <?php ActiveForm::end(); ?>
					
</div>


<?php
$this->registerJs(' 
 $("#btn-update-antpersonales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antpersonales/updateajax']).'";
   var btn = $("#btn-update-antpersonales");	var form = $("#form-update-antpersonales");            
   var div = $("#div-update-antpersonales");
   var grid = "#div-grid-antpersonales";
   var index = $("#div-index-antpersonales");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>