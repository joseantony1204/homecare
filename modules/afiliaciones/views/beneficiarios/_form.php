<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de beneficiarios</h5>
	</div>
	
	<div class="beneficiarios-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-beneficiarios', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'BENE_PRIMERNOMBRE')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BENE_SEGUNDONOMBRE')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BENE_PRIMERAPELLIDO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BENE_SEGUNDOAPELLIDO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BENE_FECHAINGRESO')->textInput() ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'AFIL_ID')->textInput() ?>

<?= $form->field($model, 'BENE_CREATEBY')->textInput() ?>

<?= $form->field($model, 'BENE_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
