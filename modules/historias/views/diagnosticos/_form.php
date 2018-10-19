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
		    <?php $form = ActiveForm::begin([
											'id' => 'form-diagnosticos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATDI_RIESGOVICTIMA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATDI_RIESGOVICTIMAVIO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'DIAG_ID')->textInput() ?>

<?= $form->field($model, 'CLDI_ID')->textInput() ?>

<?= $form->field($model, 'TIDI_ID')->textInput() ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATDI_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATDI_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
