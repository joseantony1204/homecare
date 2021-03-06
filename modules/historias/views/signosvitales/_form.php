<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de signosvitales</h5>
	</div>
	
	<div class="signosvitales-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-signosvitales', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATSV_ID')->textInput() ?>

<?= $form->field($model, 'ATSV_PRESIONHH')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_PRESIONMM')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_PESO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_TALLA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_IMC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_FRECUENCIAC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_FRECUENCIAR')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_PERIMETROA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_PERIMETROC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_PERIMETROB')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATSV_TEMPERATURA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATSV_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATSV_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
