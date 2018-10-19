<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Afiliados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de afiliados</h5>
	</div>
	
	<div class="afiliados-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-afiliados', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

			<?= $form->field($model, 'AFIL_FECHAINGRESO')->textInput() ?>

			<?= $form->field($model, 'PERS_ID')->textInput() ?>

			<?= $form->field($model, 'MEPA_ID')->textInput() ?>

			<?= $form->field($model, 'ESAF_ID')->textInput() ?>

			<?= $form->field($model, 'AFIL_CREATEBY')->textInput() ?>

			<?= $form->field($model, 'AFIL_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
