<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-plan']); ?>
	<?= $form->field($model, 'ATPL_ID')->hiddenInput()->label(false); ?>						
	
    <div class="row">		
		<div class="col-md-6">
			<div class="form-group">							
				<?= $form->field($model, 'ATPL_DESCRIPCION')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
			
		<div class="col-md-6">
			<div class="form-group">							
				<?= $form->field($model, 'ATPL_OBSERVACIONES')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>	
		
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATPL_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATPL_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
	
	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-plan', 
									'title' => 'Actualizar',
								]
						   ); 
	?>						
	<?php ActiveForm::end(); ?>
					
</div>

<?php
$this->registerJs(' 
 $("#btn-update-plan").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/plan/updateajax']).'";
   var btn = $("#btn-update-plan");	var form = $("#form-update-plan");            var div = $("#div-update-plan");
   var grid = "#div-grid-plan";
   var index = $("#div-index-plan");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>