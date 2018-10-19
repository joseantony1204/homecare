<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de signosvitales</h5>
	</div>

	<div class="signosvitales-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-signosvitales']); ?>

		    <?= $form->field($model, 'ATSV_ID')->textInput(); ?>

    <?= $form->field($model, 'ATSV_PRESIONHH')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_PRESIONMM')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_PESO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_TALLA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_IMC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_FRECUENCIAC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_FRECUENCIAR')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_PERIMETROA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_PERIMETROC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_PERIMETROB')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATSV_TEMPERATURA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATSV_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATSV_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-signosvitales', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-signosvitales").hide(); $("#div-index-signosvitales").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-signosvitales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/signosvitales/createajax']).'";
   var btn = $("#btn-register-signosvitales");	var form = $("#form-create-signosvitales");
   var div = $("#div-create-signosvitales");   var grid = "#div-grid-signosvitales";
   var index = $("#div-index-signosvitales");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>