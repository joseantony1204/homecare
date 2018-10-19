<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antpersonales</h5>
	</div>

	<div class="antpersonales-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-antpersonales']); ?>

		    <?= $form->field($model, 'ATAP_HIPERTENSION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_DIABETES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_ENETOMBOTICA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_CONVULSIONES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_VALVULOPATIAS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_HEPATICA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_CEFALEA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_MAMARIA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAP_OTROS')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'ATAP_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATAP_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-antpersonales', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-antpersonales").hide(); $("#div-index-antpersonales").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-antpersonales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antpersonales/createajax']).'";
   var btn = $("#btn-register-antpersonales");	var form = $("#form-create-antpersonales");
   var div = $("#div-create-antpersonales");   var grid = "#div-grid-antpersonales";
   var index = $("#div-index-antpersonales");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>