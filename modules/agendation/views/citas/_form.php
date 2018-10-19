<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de citas</h5>
	</div>
	
	<div class="citas-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-citas', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'CITA_FECHA')->textInput() ?>

<?= $form->field($model, 'CITA_FECHAREGISTRO')->textInput() ?>

<?= $form->field($model, 'CITA_LLEGADA')->textInput() ?>

<?= $form->field($model, 'CIES_ID')->textInput() ?>

<?= $form->field($model, 'CIFI_ID')->textInput() ?>

<?= $form->field($model, 'CICE_ID')->textInput() ?>

<?= $form->field($model, 'PEPA_ID')->textInput() ?>

<?= $form->field($model, 'EMHO_ID')->textInput() ?>

<?= $form->field($model, 'CIDI_ID')->textInput() ?>

<?= $form->field($model, 'CICS_ID')->textInput() ?>

<?= $form->field($model, 'CITA_FECHACAMBIO')->textInput() ?>

<?= $form->field($model, 'CITA_REGISTRADOPOR')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
