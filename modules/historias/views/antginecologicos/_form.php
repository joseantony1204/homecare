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
		    <?php $form = ActiveForm::begin([
											'id' => 'form-antginecologicos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATAG_MENARGUIA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_CICLOS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_FUM')->textInput() ?>

<?= $form->field($model, 'ATAG_GRAVIDA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_PARTOS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_ABORTO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_CESARIA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_LACTANDO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_DISMINORREA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_EPI')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_COMPANEROS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_MASHIJOS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_ENFESEXU')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAG_OTROS')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'ATAG_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATAG_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
