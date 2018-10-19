<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de personas</h5>
	</div>

	<div class="personas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-personas']); ?>

		    <?= $form->field($model, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'PERS_FECHANACIMIENTO')->textInput(); ?>

    <?= $form->field($model, 'PERS_DIRECCION')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'PERS_TELEFONO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'PERS_SENDSMS')->textInput(); ?>

    <?= $form->field($model, 'PERS_EMAIL')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'PERS_SENDMAIL')->textInput(); ?>

    <?= $form->field($model, 'PERS_PATHIMG')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ESCI_ID')->textInput(); ?>

    <?= $form->field($model, 'TIID_ID')->textInput(); ?>

    <?= $form->field($model, 'TIGE_ID')->textInput(); ?>

    <?= $form->field($model, 'PAIS_ID')->textInput(); ?>

    <?= $form->field($model, 'DEPA_ID')->textInput(); ?>

    <?= $form->field($model, 'MUNI_ID')->textInput(); ?>

    <?= $form->field($model, 'PERS_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'PERS_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-personas', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-personas").hide(); $("#div-index-personas").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-personas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/personas/createajax']).'";
   var btn = $("#btn-register-personas");	var form = $("#form-create-personas");
   var div = $("#div-create-personas");   var grid = "#div-grid-personas";
   var index = $("#div-index-personas");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>