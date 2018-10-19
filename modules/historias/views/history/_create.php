<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de history</h5>
	</div>

	<div class="history-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-history']); ?>

		    <?= $form->field($model, 'AGEN_FECHAPROCESO')->textInput(); ?>

    <?= $form->field($model, 'AGEN_FECHA')->textInput(); ?>

    <?= $form->field($model, 'AGEN_HORAINICIO')->textInput(); ?>

    <?= $form->field($model, 'AGEN_HORAFINAL')->textInput(); ?>

    <?= $form->field($model, 'FINA_ID')->textInput(); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'PEEM_ID')->textInput(); ?>

    <?= $form->field($model, 'ESCI_ID')->textInput(); ?>

    <?= $form->field($model, 'AGEN_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'AGEN_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-history', 'title' => 'Guardar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-history").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/history/createajax']).'";
   var btn = $("#btn-register-history");	var form = $("#form-create-history");
   var div = $("#div-create-history");   var grid = "#div-grid-history";
   
   jsaveform(url,btn,form,div,grid);   
 }); 
 ');
?>