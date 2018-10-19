<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recetarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de recetarios</h5>
	</div>
	
	<div class="recetarios-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-recetarios', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATRE_CANTIDAD')->textInput() ?>

<?= $form->field($model, 'ATRE_TOMACADA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_TOMACADADESCRIPCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_DURACION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_DURACIONDESCRIPCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_DETALLES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_VIASUMINISTRO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATRE_FECHAINICIO')->textInput() ?>

<?= $form->field($model, 'ATRE_FORMULA')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'MEDI_ID')->textInput() ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATRE_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATRE_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
