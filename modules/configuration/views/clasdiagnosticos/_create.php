<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasdiagnosticos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de clasdiagnosticos</h5>
	</div>

	<div class="clasdiagnosticos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-clasdiagnosticos']); ?>

		    <?= $form->field($model, 'DIAG_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'DIAG_CODIGO')->textInput(['maxlength' => true]); ?>

 
	
	<?= $form->field($model, 'DIAG_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
    <?= $form->field($model, 'DIAG_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-clasdiagnosticos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-clasdiagnosticos").hide(); $("#div-index-clasdiagnosticos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-clasdiagnosticos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/clasdiagnosticos/createajax']).'";
   var btn = $("#btn-register-clasdiagnosticos");	var form = $("#form-create-clasdiagnosticos");
   var div = $("#div-create-clasdiagnosticos");   var grid = "#div-grid-clasdiagnosticos";
   var index = $("#div-index-clasdiagnosticos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>