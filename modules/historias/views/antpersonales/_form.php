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
		    <?php $form = ActiveForm::begin([
											'id' => 'form-antpersonales', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATAP_HIPERTENSION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_DIABETES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_ENETOMBOTICA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_CONVULSIONES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_VALVULOPATIAS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_HEPATICA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_CEFALEA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_MAMARIA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAP_OTROS')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'ATAP_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATAP_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
