<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Perfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de perfiles</h5>
	</div>

	<div class="perfiles-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
			<?php $form = ActiveForm::begin(['id' => 'form-create-perfiles']); ?>

		    <?= $form->field($model, 'USPE_NOMBRE')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'USPE_FECHACAMBIO')->textInput(); ?>

    <?= $form->field($model, 'USPE_REGISTRADOPOR')->textInput(); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-perfiles', 'title' => 'Guardar' ]); ?>						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-perfiles").hide(); $("#div-index-perfiles").show();', 'title' => 'Cancelar' ]); ?>					</div>

			<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-perfiles").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/usuarios/perfiles/createajax']).'";
   var btn = $("#btn-register-perfiles");	var form = $("#form-create-perfiles");
   var div = $("#div-create-perfiles");   var grid = "#div-grid-perfiles";
   var index = $("#div-index-perfiles");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>