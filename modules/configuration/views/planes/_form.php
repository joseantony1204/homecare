<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Planes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de planes</h5>
	</div>
	
	<div class="planes-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-planes', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'PLAN_NOMBRE')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PLAN_DESCRIPCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PLAN_VALORMENSUAL')->textInput() ?>

<?= $form->field($model, 'PLAN_VALORSEMESTRAL')->textInput() ?>

<?= $form->field($model, 'PLAN_VALORANUAL')->textInput() ?>

<?= $form->field($model, 'PLAN_CREATEBY')->textInput() ?>

<?= $form->field($model, 'PLAN_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
