<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de agenda</h5>
	</div>
	
	<div class="agenda-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-agenda', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'AGEN_FECHAPROCESO')->textInput() ?>

<?= $form->field($model, 'AGEN_FECHA')->textInput() ?>

<?= $form->field($model, 'AGEN_HORAINICIO')->textInput() ?>

<?= $form->field($model, 'AGEN_HORAFINAL')->textInput() ?>

<?= $form->field($model, 'FINA_ID')->textInput() ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'PEEM_ID')->textInput() ?>

<?= $form->field($model, 'ESCI_ID')->textInput() ?>

<?= $form->field($model, 'AGEN_CREATEBY')->textInput() ?>

<?= $form->field($model, 'AGEN_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
