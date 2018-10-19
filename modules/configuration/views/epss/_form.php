<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de epss</h5>
	</div>
	
	<div class="epss-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-epss', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'EPSS_NOMBRE')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'EPSS_CODIGO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'EPSS_DIRECCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'EPSS_TELEFONO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'EPSS_CREATEBY')->textInput() ?>

<?= $form->field($model, 'EPSS_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
