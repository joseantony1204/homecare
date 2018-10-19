<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	
	<?php $form = ActiveForm::begin(['id' => 'form-create-remisiones']); ?>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
			    <?= $form->field($model, 'ATRM_REMITIDOA')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
										
		<div class="col-md-6">
			<div class="form-group">
			    <?= $form->field($model, 'ATRM_OBSERVACIONES')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>
	</div>
    

	<div class="form-group">
		<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-remisiones', 'title' => 'Guardar' ]); ?>						
		<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-remisiones").hide(); $("#div-index-remisiones").show();', 'title' => 'Cancelar' ]); ?>				
	</div>
	
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATRM_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATRM_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

																	
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-remisiones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/remisiones/createajax']).'";
   var btn = $("#btn-register-remisiones");	var form = $("#form-create-remisiones");
   var div = $("#div-create-remisiones");   var grid = "#div-grid-remisiones";
   var index = $("#div-index-remisiones");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>