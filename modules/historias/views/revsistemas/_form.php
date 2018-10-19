<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de revsistemas</h5>
	</div>
	
	<div class="revsistemas-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-revsistemas', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATRS_ID')->textInput() ?>

<?= $form->field($model, 'ATRS_GENERAL')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_RESPIRATORIO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_CARDIOVASCULAR')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_GASTROINTESTINAL')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_GENITOURINARIO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_ENDOCRINO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATRS_NEUROLOGICO')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATRS_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATRS_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
