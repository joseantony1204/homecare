<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de cuentasbancarias</h5>
	</div>
	
	<div class="cuentasbancarias-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-cuentasbancarias', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'FOPA_NUMEROCUENTA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'FOPA_NUMEROSEGURIDAD')->textInput() ?>

<?= $form->field($model, 'FOPA_FECHAVENCIMIENTO')->textInput() ?>

<?= $form->field($model, 'FOPA_ACTUAL')->textInput() ?>

<?= $form->field($model, 'BANC_ID')->textInput() ?>

<?= $form->field($model, 'TICU_ID')->textInput() ?>

<?= $form->field($model, 'PEPA_ID')->textInput() ?>

<?= $form->field($model, 'AFIL_ID')->textInput() ?>

<?= $form->field($model, 'FOPA_CREATEBY')->textInput() ?>

<?= $form->field($model, 'FOMA_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
