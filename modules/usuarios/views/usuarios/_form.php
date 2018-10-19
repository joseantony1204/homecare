<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de usuarios</h5>
	</div>
	
	<div class="usuarios-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-usuarios', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'USUA_USUARIO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'USUA_CLAVE')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'USUA_SESSION')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'USUA_FECHAALTA')->textInput() ?>

<?= $form->field($model, 'USUA_FECHABAJA')->textInput() ?>

<?= $form->field($model, 'USUA_ULTIMOACCESO')->textInput() ?>

<?= $form->field($model, 'USUA_NUMINTENTOS')->textInput() ?>

<?= $form->field($model, 'USES_ID')->textInput() ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'USPE_ID')->textInput() ?>

<?= $form->field($model, 'USUA_FECHACAMBIO')->textInput() ?>

<?= $form->field($model, 'USUA_REGISTRADOPOR')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
