<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tiposfinalidades;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Servicios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de servicios</h5>
	</div>

	<div class="servicios-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
				<?php $form = ActiveForm::begin(['id' => 'form-create-servicios']); ?>

				<?= $form->field($model, 'FINA_NOMBRE')->textInput(['maxlength' => true]); ?>

				<?php 
				$Tiposfinalidades=Tiposfinalidades::find()->all();
				$listData=ArrayHelper::map($Tiposfinalidades,'TIFI_ID','TIFI_NOMBRE');
				echo $form->field($model, 'TIFI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
				?>
				
				<?= $form->field($model, 'FINA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'FINA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-servicios', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-servicios").hide(); $("#div-index-servicios").show();', 'title' => 'Cancelar' ]); ?>					</div>

				<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-servicios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/servicios/createajax']).'";
   var btn = $("#btn-register-servicios");	var form = $("#form-create-servicios");
   var div = $("#div-create-servicios");   var grid = "#div-grid-servicios";
   var index = $("#div-index-servicios");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>