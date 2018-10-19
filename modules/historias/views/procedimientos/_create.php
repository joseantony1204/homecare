<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de procedimientos</h5>
	</div>

	<div class="procedimientos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-procedimientos']); ?>

		    <?= $form->field($model, 'ATPR_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATPR_FECHASOLICITUD')->textInput(); ?>

    <?= $form->field($model, 'ATPR_RESULTADOS')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATPR_FECHAPROCESO')->textInput(); ?>

    <?= $form->field($model, 'ATPR_ESTADO')->textInput(); ?>

    <?= $form->field($model, 'PROC_ID')->textInput(); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATPR_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATPR_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-procedimientos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-procedimientos").hide(); $("#div-index-procedimientos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-procedimientos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/procedimientos/createajax']).'";
   var btn = $("#btn-register-procedimientos");	var form = $("#form-create-procedimientos");
   var div = $("#div-create-procedimientos");   var grid = "#div-grid-procedimientos";
   var index = $("#div-index-procedimientos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>