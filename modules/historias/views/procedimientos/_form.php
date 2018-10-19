<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de procedimientos</h5>
	</div>
	
	<div class="procedimientos-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-procedimientos', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATPR_OBSERVACIONES')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATPR_FECHASOLICITUD')->textInput() ?>

<?= $form->field($model, 'ATPR_RESULTADOS')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ATPR_FECHAPROCESO')->textInput() ?>

<?= $form->field($model, 'ATPR_ESTADO')->textInput() ?>

<?= $form->field($model, 'PROC_ID')->textInput() ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATPR_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATPR_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
