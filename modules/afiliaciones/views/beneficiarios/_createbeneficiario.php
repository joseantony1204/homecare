<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de beneficiarios</h5>
	</div>

	<div class="beneficiarios-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-beneficiarios']); ?>

		    <?= $form->field($model, 'BENE_PRIMERNOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BENE_SEGUNDONOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BENE_PRIMERAPELLIDO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BENE_SEGUNDOAPELLIDO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'BENE_FECHAINGRESO')->textInput(); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    <?= $form->field($model, 'BENE_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'BENE_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-beneficiarios', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-beneficiarios").hide(); $("#div-index-beneficiarios").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-beneficiarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/beneficiarios/createajax']).'";
   var btn = $("#btn-register-beneficiarios");	var form = $("#form-create-beneficiarios");
   var div = $("#div-create-beneficiarios");   var grid = "#div-grid-beneficiarios";
   var index = $("#div-index-beneficiarios");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>