<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de exafisicos</h5>
	</div>
	
	<div class="exafisicos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-exafisicos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATEF_ID')->textInput() ?>

<?= $form->field($model, 'ATEF_ASPECTO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_ESTADO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_CABEZA')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_VISUAL')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_CUELLO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_TORAX')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_ABDOMEN')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_GENITOURINARIO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_OSTEOMUSCULAR')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_PIELYFANERAZ')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATEF_NEUROLOGICO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATEF_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATEF_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
