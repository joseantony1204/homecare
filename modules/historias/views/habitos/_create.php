<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de habitos</h5>
	</div>

	<div class="habitos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-habitos']); ?>

		    <?= $form->field($model, 'ATHA_ID')->textInput(); ?>

    <?= $form->field($model, 'ATHA_ALCOHOL')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATHA_CIGARRILLO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATHA_DROGAS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATHA_OTROS')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'ATHA_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATHA_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-habitos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-habitos").hide(); $("#div-index-habitos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-habitos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/habitos/createajax']).'";
   var btn = $("#btn-register-habitos");	var form = $("#form-create-habitos");
   var div = $("#div-create-habitos");   var grid = "#div-grid-habitos";
   var index = $("#div-index-habitos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>