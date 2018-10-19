<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Medicamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de medicamentos</h5>
	</div>

	<div class="medicamentos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-medicamentos']); ?>

		    <?= $form->field($model, 'MEDI_CODIGOATC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'MEDI_DESCRIPCIONATC')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'MEDI_PRINCIPIOACTIVO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'MEDI_CONCENTRACION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'MEDI_FORMAFARMACEUTICA')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'MEDI_ACLARACION')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'MEDI_LISTA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'MEDI_VALOR')->textInput(['maxlength' => true]); ?>
	
	<?= $form->field($model, 'MEDI_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
    <?= $form->field($model, 'MEDI_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-medicamentos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-medicamentos").hide(); $("#div-index-medicamentos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-medicamentos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/medicamentos/createajax']).'";
   var btn = $("#btn-register-medicamentos");	var form = $("#form-create-medicamentos");
   var div = $("#div-create-medicamentos");   var grid = "#div-grid-medicamentos";
   var index = $("#div-index-medicamentos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>