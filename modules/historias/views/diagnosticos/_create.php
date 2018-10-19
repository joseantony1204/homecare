<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de diagnosticos</h5>
	</div>

	<div class="diagnosticos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-diagnosticos']); ?>

		    <?= $form->field($model, 'ATDI_RIESGOVICTIMA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATDI_RIESGOVICTIMAVIO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'DIAG_ID')->textInput(); ?>

    <?= $form->field($model, 'CLDI_ID')->textInput(); ?>

    <?= $form->field($model, 'TIDI_ID')->textInput(); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATDI_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATDI_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-diagnosticos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-diagnosticos").hide(); $("#div-index-diagnosticos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-diagnosticos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/diagnosticos/createajax']).'";
   var btn = $("#btn-register-diagnosticos");	var form = $("#form-create-diagnosticos");
   var div = $("#div-create-diagnosticos");   var grid = "#div-grid-diagnosticos";
   var index = $("#div-index-diagnosticos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>