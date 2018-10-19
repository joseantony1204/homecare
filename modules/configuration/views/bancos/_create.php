<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de bancos</h5>
	</div>

	<div class="bancos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-bancos']); ?>

		    <?= $form->field($model, 'BANC_NIT')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BANC_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BANC_DIRECCION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BANC_TELEFONO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BANC_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'BANC_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-bancos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-bancos").hide(); $("#div-index-bancos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-bancos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/bancos/createajax']).'";
   var btn = $("#btn-register-bancos");	var form = $("#form-create-bancos");
   var div = $("#div-create-bancos");   var grid = "#div-grid-bancos";
   var index = $("#div-index-bancos");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>