<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Testfindrisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de testfindrisk</h5>
	</div>
	
	<div class="testfindrisk-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-testfindrisk', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATTF_EDAD')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_EDADPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_PESO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_TALLA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_IMC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_IMCTOTAL')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_IMCPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_PC')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_PCMUJERES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_PCPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_ACTIVIDADFISICA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_ACTIVIDADFISICAPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_CONSUMEVERDURAS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_CONSUMEVERDURASPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_TOMAMEDICAMENTOS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_TOMAMEDICAMENTOSPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_GLUCOSA')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_GLUCOSAPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_DIABETESPARIENTES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_DIABETESPARIENTESPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATTF_TOTALPNTS')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'AGEN_ID')->textInput() ?>

<?= $form->field($model, 'ATTF_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATTF_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
