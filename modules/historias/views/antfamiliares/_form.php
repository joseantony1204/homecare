<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antfamiliares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antfamiliares</h5>
	</div>
	
	<div class="antfamiliares-form">

        <div class="mycontentform">		
		    <?php $form = ActiveForm::begin([
											'id' => 'form-antfamiliares', 
											'method'=>'post',
											"enableClientValidation" => true,
											"enableAjaxValidation" => true,
											]); ?>

		<?= $form->field($model, 'ATAF_HIPERTENSION')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAF_DIABETES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAF_CONVULSIVO')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAF_MALFORMACIONES')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAF_CANCER')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ATAF_OTROS')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'PERS_ID')->textInput() ?>

<?= $form->field($model, 'ATAF_CREATEBY')->textInput() ?>

<?= $form->field($model, 'ATAF_UPDATEAT')->textInput() ?>

			<div class="form-group">		
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> Guardar</i>' : '<i class="fa fa-edit"> Actualizar</i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
	    </div>
	</div>
</div>	
