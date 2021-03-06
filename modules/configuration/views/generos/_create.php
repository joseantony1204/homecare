<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Generos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de generos</h5>
	</div>

	<div class="generos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-generos']); ?>

		    <?= $form->field($model, 'TIGE_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'TIGE_DETALLE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'TIGE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'TIGE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-generos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-generos").hide(); $("#div-index-generos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-generos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/generos/createajax']).'";
   var btn = $("#btn-register-generos");	var form = $("#form-create-generos");
   var div = $("#div-create-generos");   var grid = "#div-grid-generos";
   var index = $("#div-index-generos");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>