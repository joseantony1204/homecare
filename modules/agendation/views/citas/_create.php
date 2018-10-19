<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de citas</h5>
	</div>

	<div class="citas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-citas']); ?>

		    <?= $form->field($model, 'CITA_FECHA')->textInput(); ?>

    <?= $form->field($model, 'CITA_FECHAREGISTRO')->textInput(); ?>

    <?= $form->field($model, 'CITA_LLEGADA')->textInput(); ?>

    <?= $form->field($model, 'CIES_ID')->textInput(); ?>

    <?= $form->field($model, 'CIFI_ID')->textInput(); ?>

    <?= $form->field($model, 'CICE_ID')->textInput(); ?>

    <?= $form->field($model, 'PEPA_ID')->textInput(); ?>

    <?= $form->field($model, 'EMHO_ID')->textInput(); ?>

    <?= $form->field($model, 'CIDI_ID')->textInput(); ?>

    <?= $form->field($model, 'CICS_ID')->textInput(); ?>

    <?= $form->field($model, 'CITA_FECHACAMBIO')->textInput(); ?>

    <?= $form->field($model, 'CITA_REGISTRADOPOR')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-citas', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-citas").hide(); $("#div-index-citas").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-citas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/agendation/citas/createajax']).'";
   var btn = $("#btn-register-citas");	var form = $("#form-create-citas");
   var div = $("#div-create-citas");   var grid = "#div-grid-citas";
   var index = $("#div-index-citas");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>