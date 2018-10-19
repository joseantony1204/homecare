<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Causasexternas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de causasexternas</h5>
	</div>

	<div class="causasexternas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-causasexternas']); ?>

		    <?= $form->field($model, 'CAEX_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'CAEX_CODIGO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'CAEX_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'CAEX_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-causasexternas', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-causasexternas").hide(); $("#div-index-causasexternas").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-causasexternas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/causasexternas/createajax']).'";
   var btn = $("#btn-register-causasexternas");	var form = $("#form-create-causasexternas");
   var div = $("#div-create-causasexternas");   var grid = "#div-grid-causasexternas";
   var index = $("#div-index-causasexternas");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>