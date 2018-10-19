<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de personas</h5>
	</div>
	
	<div class="personas-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-personas', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PERS_FECHANACIMIENTO')->textInput() ?>

<?= $form->field($model, 'PERS_DIRECCION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PERS_TELEFONO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'PERS_SENDSMS')->textInput() ?>

<?= $form->field($model, 'PERS_EMAIL')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PERS_SENDMAIL')->textInput() ?>

<?= $form->field($model, 'PERS_PATHIMG')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'ESCI_ID')->textInput() ?>

<?= $form->field($model, 'TIID_ID')->textInput() ?>

<?= $form->field($model, 'TIGE_ID')->textInput() ?>

<?= $form->field($model, 'PAIS_ID')->textInput() ?>

<?= $form->field($model, 'DEPA_ID')->textInput() ?>

<?= $form->field($model, 'MUNI_ID')->textInput() ?>

<?= $form->field($model, 'PERS_CREATEBY')->textInput() ?>

<?= $form->field($model, 'PERS_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
