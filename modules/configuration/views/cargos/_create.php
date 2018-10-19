<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Cargos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de cargos</h5>
	</div>

	<div class="cargos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-cargos']); ?>

		    <?= $form->field($model, 'CARG_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'CARG_REGISTRADOPOR')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'CARG_FECHACAMBIO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-cargos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-cargos").hide(); $("#div-index-cargos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-cargos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/cargos/createajax']).'";
   var btn = $("#btn-register-cargos");	var form = $("#form-create-cargos");
   var div = $("#div-create-cargos");   var grid = "#div-grid-cargos";
   var index = $("#div-index-cargos");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>