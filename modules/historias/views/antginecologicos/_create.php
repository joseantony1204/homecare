<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antginecologicos</h5>
	</div>

	<div class="antginecologicos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-antginecologicos']); ?>

		    <?= $form->field($model, 'ATAG_MENARGUIA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_CICLOS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_FUM')->textInput(); ?>

    <?= $form->field($model, 'ATAG_GRAVIDA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_PARTOS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_ABORTO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_CESARIA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_LACTANDO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_DISMINORREA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_EPI')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_COMPANEROS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_MASHIJOS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_ENFESEXU')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAG_OTROS')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'ATAG_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATAG_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-antginecologicos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-antginecologicos").hide(); $("#div-index-antginecologicos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-antginecologicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antginecologicos/createajax']).'";
   var btn = $("#btn-register-antginecologicos");	var form = $("#form-create-antginecologicos");
   var div = $("#div-create-antginecologicos");   var grid = "#div-grid-antginecologicos";
   var index = $("#div-index-antginecologicos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>