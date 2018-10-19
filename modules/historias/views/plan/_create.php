<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de plan</h5>
	</div>

	<div class="plan-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-plan']); ?>

		    <?= $form->field($model, 'ATPL_DESCRIPCION')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATPL_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATPL_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATPL_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-plan', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-plan").hide(); $("#div-index-plan").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-plan").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/plan/createajax']).'";
   var btn = $("#btn-register-plan");	var form = $("#form-create-plan");
   var div = $("#div-create-plan");   var grid = "#div-grid-plan";
   var index = $("#div-index-plan");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>