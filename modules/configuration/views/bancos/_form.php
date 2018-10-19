<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de bancos</h5>
	</div>
	
	<div class="bancos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-bancos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'BANC_NIT')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BANC_NOMBRE')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BANC_DIRECCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BANC_TELEFONO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'BANC_CREATEBY')->textInput() ?>

<?= $form->field($model, 'BANC_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
