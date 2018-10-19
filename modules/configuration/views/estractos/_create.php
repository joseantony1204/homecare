<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Estractos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de estractos</h5>
	</div>

	<div class="estractos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-estractos']); ?>

		    <?= $form->field($model, 'ESTR_NOMBRE')->textInput(['maxlength' => true]); ?>
	
			<?= $form->field($model, 'ESTR_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
			
			<?= $form->field($model, 'ESTR_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-estractos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-estractos").hide(); $("#div-index-estractos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-estractos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/estractos/createajax']).'";
   var btn = $("#btn-register-estractos");	var form = $("#form-create-estractos");
   var div = $("#div-create-estractos");   var grid = "#div-grid-estractos";
   var index = $("#div-index-estractos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>