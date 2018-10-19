<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de generalidades</h5>
	</div>

	<div class="generalidades-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-generalidades']); ?>

		    <?= $form->field($model, 'ATGE_FECHA')->textInput(); ?>

    <?= $form->field($model, 'ATGE_MOTIVO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATGE_ENFERMEDAD')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'CAEX_ID')->textInput(); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATGE_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATGE_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-generalidades', 'title' => 'Guardar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-generalidades").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/generalidades/createajax']).'";
   var btn = $("#btn-register-generalidades");	var form = $("#form-create-generalidades");
   var div = $("#div-create-generalidades");   var grid = "#div-grid-generalidades";
   
   jsaveform(url,btn,form,div,grid);   
 }); 
 ');
?>