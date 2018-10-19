<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-habitos']); ?>												
	<?= $form->field($model, 'ATHA_ID')->hiddenInput()->label(false); ?>

	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATHA_ALCOHOL')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATHA_CIGARRILLO')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
										
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATHA_DROGAS')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	</div>		

	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<?= $form->field($model, 'ATHA_OTROS')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>		
					
	<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATHA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATHA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-habitos', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
 $("#btn-update-habitos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/habitos/updateajax']).'";
   var btn = $("#btn-update-habitos");	var form = $("#form-update-habitos");            
   var div = $("#div-update-habitos");
   var grid = "#div-grid-habitos";
   var index = $("#div-index-habitos");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>