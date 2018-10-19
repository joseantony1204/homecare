<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tiposprocedimientos;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de Procedimientos</h5>
	</div>

	<div class="clasprocedimientos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-clasprocedimientos']); ?>

		    <?= $form->field($model, 'PROC_NOMBRE')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PROC_DESCRIPCION')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PROC_CUPS')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'PROC_SOAT')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'PROC_VALOR')->textInput(); ?>

    <?= $form->field($model, 'PROC_REFERENCIA')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PROC_UNIDAD')->textInput(['maxlength' => true]); ?>
	
	<?php 
	$Tiposprocedimientos=Tiposprocedimientos::find()->all();
	$listData=ArrayHelper::map($Tiposprocedimientos,'TIPR_ID','TIPR_NOMBRE');
	echo $form->field($model, 'TIPR_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
	?>

    <?= $form->field($model, 'ARLA_ID')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'NILA_ID')->hiddenInput()->label(false); ?>
	
	<?= $form->field($model, 'PROC_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'PROC_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-clasprocedimientos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-clasprocedimientos").hide(); $("#div-index-clasprocedimientos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-clasprocedimientos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/clasprocedimientos/createajax']).'";
   var btn = $("#btn-register-clasprocedimientos");	var form = $("#form-create-clasprocedimientos");
   var div = $("#div-create-clasprocedimientos");   var grid = "#div-grid-clasprocedimientos";
   var index = $("#div-index-clasprocedimientos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>