<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de revsistemas</h5>
	</div>

	<div class="revsistemas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-revsistemas']); ?>

		    <?= $form->field($model, 'ATRS_ID')->textInput(); ?>

    <?= $form->field($model, 'ATRS_GENERAL')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_RESPIRATORIO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_CARDIOVASCULAR')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_GASTROINTESTINAL')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_GENITOURINARIO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_ENDOCRINO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRS_NEUROLOGICO')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATRS_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATRS_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-revsistemas', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-revsistemas").hide(); $("#div-index-revsistemas").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-revsistemas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/revsistemas/createajax']).'";
   var btn = $("#btn-register-revsistemas");	var form = $("#form-create-revsistemas");
   var div = $("#div-create-revsistemas");   var grid = "#div-grid-revsistemas";
   var index = $("#div-index-revsistemas");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>