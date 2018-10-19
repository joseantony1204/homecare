<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de empleados</h5>
	</div>
	
	<div class="empleados-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-empleados', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'EMPL_FECHAINGRESO')->textInput() ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'CARG_ID')->textInput() ?>

<?= $form->field($model, 'ESTA_ID')->textInput() ?>

<?= $form->field($model, 'EMPL_CREATEBY')->textInput() ?>

<?= $form->field($model, 'EMPL_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
