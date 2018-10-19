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
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-antfamiliares']); ?>

		    <?= $form->field($model, 'ATAF_HIPERTENSION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAF_DIABETES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAF_CONVULSIVO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAF_MALFORMACIONES')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAF_CANCER')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'ATAF_OTROS')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PERS_ID')->textInput(); ?>

    <?= $form->field($model, 'ATAF_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATAF_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-antfamiliares', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-antfamiliares").hide(); $("#div-index-antfamiliares").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-antfamiliares").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antfamiliares/createajax']).'";
   var btn = $("#btn-register-antfamiliares");	var form = $("#form-create-antfamiliares");
   var div = $("#div-create-antfamiliares");   var grid = "#div-grid-antfamiliares";
   var index = $("#div-index-antfamiliares");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>