<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de remisiones</h5>
	</div>

	<div class="remisiones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-remisiones']); ?>

		    <?= $form->field($model, 'ATRM_REMITIDOA')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'ATRM_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    <?= $form->field($model, 'ATRM_CREATEBY')->textInput(); ?>

    <?= $form->field($model, 'ATRM_UPDATEAT')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-remisiones', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-remisiones").hide(); $("#div-index-remisiones").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-remisiones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/remisiones/createajax']).'";
   var btn = $("#btn-register-remisiones");	var form = $("#form-create-remisiones");
   var div = $("#div-create-remisiones");   var grid = "#div-grid-remisiones";
   var index = $("#div-index-remisiones");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>