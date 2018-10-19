<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de cuentasbancarias</h5>
	</div>

	<div class="cuentasbancarias-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-cuentasbancarias']); ?>

		    <?= $form->field($model, 'FOPA_NUMEROCUENTA')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'FOPA_NUMEROSEGURIDAD')->textInput(); ?>

    <?= $form->field($model, 'FOPA_FECHAVENCIMIENTO')->textInput(); ?>

    <?= $form->field($model, 'FOPA_ACTUAL')->textInput(); ?>

    <?= $form->field($model, 'BANC_ID')->textInput(); ?>

    <?= $form->field($model, 'TICU_ID')->textInput(); ?>

    <?= $form->field($model, 'PEPA_ID')->textInput(); ?>

    <?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    <?= $form->field($model, 'FOPA_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'FOMA_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-cuentasbancarias', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-cuentasbancarias").hide(); $("#div-index-cuentasbancarias").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-cuentasbancarias").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/cuentasbancarias/createajax']).'";
   var btn = $("#btn-register-cuentasbancarias");	var form = $("#form-create-cuentasbancarias");
   var div = $("#div-create-cuentasbancarias");   var grid = "#div-grid-cuentasbancarias";
   var index = $("#div-index-cuentasbancarias");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>