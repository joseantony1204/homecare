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
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-testfindrisk']); ?>

		    <?= $form->field($model, 'ATTF_EDAD')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_EDADPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_PESO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_TALLA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_IMC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_IMCTOTAL')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_IMCPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_PC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_PCMUJERES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_PCPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_ACTIVIDADFISICA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_ACTIVIDADFISICAPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_CONSUMEVERDURAS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_CONSUMEVERDURASPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_TOMAMEDICAMENTOS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_TOMAMEDICAMENTOSPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_GLUCOSA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_GLUCOSAPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_DIABETESPARIENTES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_DIABETESPARIENTESPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATTF_TOTALPNTS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATTF_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATTF_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-testfindrisk', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-testfindrisk").hide(); $("#div-index-testfindrisk").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-testfindrisk").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/testfindrisk/createajax']).'";
   var btn = $("#btn-register-testfindrisk");	var form = $("#form-create-testfindrisk");
   var div = $("#div-create-testfindrisk");   var grid = "#div-grid-testfindrisk";
   var index = $("#div-index-testfindrisk");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>