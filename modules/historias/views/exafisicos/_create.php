<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de exafisicos</h5>
	</div>

	<div class="exafisicos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-exafisicos']); ?>

		    <?= $form->field($model, 'ATEF_ID')->textInput(); ?>

    <?= $form->field($model, 'ATEF_ASPECTO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_ESTADO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_CABEZA')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_VISUAL')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_CUELLO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_TORAX')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_ABDOMEN')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_GENITOURINARIO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_OSTEOMUSCULAR')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_PIELYFANERAZ')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATEF_NEUROLOGICO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATEF_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATEF_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-exafisicos', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-exafisicos").hide(); $("#div-index-exafisicos").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-exafisicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/exafisicos/createajax']).'";
   var btn = $("#btn-register-exafisicos");	var form = $("#form-create-exafisicos");
   var div = $("#div-create-exafisicos");   var grid = "#div-grid-exafisicos";
   var index = $("#div-index-exafisicos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>