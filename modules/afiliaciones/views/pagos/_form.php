<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de pagos</h5>
	</div>
	
	<div class="pagos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-pagos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'PAGO_FECHA')->textInput() ?>

<?= $form->field($model, 'PAGO_PERIODO')->textInput() ?>

<?= $form->field($model, 'PAGO_MES')->textInput() ?>

<?= $form->field($model, 'PAGO_ANIO')->textInput() ?>

<?= $form->field($model, 'AFIL_ID')->textInput() ?>

<?= $form->field($model, 'PAGO_CREATEBY')->textInput() ?>

<?= $form->field($model, 'PAGO_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
