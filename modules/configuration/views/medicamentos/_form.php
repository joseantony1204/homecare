<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Medicamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de medicamentos</h5>
	</div>
	
	<div class="medicamentos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-medicamentos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'MEDI_CODIGOATC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_DESCRIPCIONATC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_PRINCIPIOACTIVO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_CONCENTRACION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_FORMAFARMACEUTICA')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'MEDI_ACLARACION')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'MEDI_LISTA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_VALOR')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'MEDI_CREATEBY')->textInput() ?>

<?= $form->field($model, 'MEDI_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
