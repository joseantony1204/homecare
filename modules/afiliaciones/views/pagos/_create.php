<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de pagos</h5>
	</div>

	<div class="pagos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-pagos']); ?>

		    <?= $form->field($model, 'PAGO_FECHA')->textInput(); ?>

    <?= $form->field($model, 'PAGO_PERIODO')->textInput(); ?>

    <?= $form->field($model, 'PAGO_MES')->textInput(); ?>

    <?= $form->field($model, 'PAGO_ANIO')->textInput(); ?>

    <?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    <?= $form->field($model, 'PAGO_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'PAGO_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-pagos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-pagos").hide(); $("#div-index-pagos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-pagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/pagos/createajax']).'";
   var btn = $("#btn-register-pagos");	var form = $("#form-create-pagos");
   var div = $("#div-create-pagos");   var grid = "#div-grid-pagos";
   var index = $("#div-index-pagos");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>