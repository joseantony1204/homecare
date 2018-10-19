<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Tiposidentificaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de tiposidentificaciones</h5>
	</div>

	<div class="tiposidentificaciones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-tiposidentificaciones']); ?>

		    <?= $form->field($model, 'TIID_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'TIID_DETALLE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'TIID_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'TIID_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-tiposidentificaciones', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-tiposidentificaciones").hide(); $("#div-index-tiposidentificaciones").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-tiposidentificaciones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/tiposidentificaciones/createajax']).'";
   var btn = $("#btn-register-tiposidentificaciones");	var form = $("#form-create-tiposidentificaciones");
   var div = $("#div-create-tiposidentificaciones");   var grid = "#div-grid-tiposidentificaciones";
   var index = $("#div-index-tiposidentificaciones");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>