<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de recomendaciones</h5>
	</div>

	<div class="recomendaciones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-recomendaciones']); ?>

		    <?= $form->field($model, 'ATRE_RECOMENDACIONES')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATRE_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATRE_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-recomendaciones', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-recomendaciones").hide(); $("#div-index-recomendaciones").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-recomendaciones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/recomendaciones/createajax']).'";
   var btn = $("#btn-register-recomendaciones");	var form = $("#form-create-recomendaciones");
   var div = $("#div-create-recomendaciones");   var grid = "#div-grid-recomendaciones";
   var index = $("#div-index-recomendaciones");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>