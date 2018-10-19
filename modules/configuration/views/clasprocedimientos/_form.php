<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de clasprocedimientos</h5>
	</div>
	
	<div class="clasprocedimientos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-clasprocedimientos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'PROC_NOMBRE')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PROC_DESCRIPCION')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PROC_CUPS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PROC_SOAT')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PROC_VALOR')->textInput() ?>

<?= $form->field($model, 'PROC_REFERENCIA')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PROC_UNIDAD')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'TIPR_ID')->textInput() ?>

<?= $form->field($model, 'ARLA_ID')->textInput() ?>

<?= $form->field($model, 'NILA_ID')->textInput() ?>

<?= $form->field($model, 'PROC_CREATEBY')->textInput() ?>

<?= $form->field($model, 'PROC_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
