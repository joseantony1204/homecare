<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de epss</h5>
	</div>

	<div class="epss-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-epss']); ?>

		    <?= $form->field($model, 'EPSS_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'EPSS_CODIGO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'EPSS_DIRECCION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'EPSS_TELEFONO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'EPSS_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'EPSS_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-epss', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-epss").hide(); $("#div-index-epss").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-epss").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/epss/createajax']).'";
   var btn = $("#btn-register-epss");	var form = $("#form-create-epss");
   var div = $("#div-create-epss");   var grid = "#div-grid-epss";
   var index = $("#div-index-epss");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>