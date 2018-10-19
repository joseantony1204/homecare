<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Mediospagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de mediospagos</h5>
	</div>

	<div class="mediospagos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-mediospagos']); ?>

		    <?= $form->field($model, 'MEPA_NOMBRE')->textInput(['maxlength' => true]); ?>
	
			<?= $form->field($model, 'MEPA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
			
			<?= $form->field($model, 'MEPA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-mediospagos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-mediospagos").hide(); $("#div-index-mediospagos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-mediospagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/mediospagos/createajax']).'";
   var btn = $("#btn-register-mediospagos");	var form = $("#form-create-mediospagos");
   var div = $("#div-create-mediospagos");   var grid = "#div-grid-mediospagos";
   var index = $("#div-index-mediospagos");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>