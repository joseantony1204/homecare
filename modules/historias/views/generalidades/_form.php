<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de generalidades</h5>
	</div>
	
	<div class="generalidades-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-generalidades', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATGE_FECHA')->textInput() ?>

<?= $form->field($model, 'ATGE_MOTIVO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATGE_ENFERMEDAD')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'CAEX_ID')->textInput() ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATGE_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATGE_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
