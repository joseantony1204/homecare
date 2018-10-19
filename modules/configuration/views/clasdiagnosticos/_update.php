<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasdiagnosticos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de clasdiagnosticos</h5>
	</div>

	<div class="clasdiagnosticos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-clasdiagnosticos']); ?>
												
						<?= $form->field($model, 'DIAG_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'DIAG_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'DIAG_CODIGO')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'DIAG_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
    <?= $form->field($model, 'DIAG_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-clasdiagnosticos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-clasdiagnosticos").hide(); $("#div-index-clasdiagnosticos").show();', 'title' => 'Cancelar' ]); ?></td>
							</tr>
						</table>

						<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/clasdiagnosticos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-clasdiagnosticos').hide();
            $('#div-index-clasdiagnosticos').hide();
		    $('#div-update-clasdiagnosticos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#clasdiagnosticos-diag_id').val(parsed.DIAG_ID)
					
				$('#clasdiagnosticos-diag_nombre').val(parsed.DIAG_NOMBRE)
					
				$('#clasdiagnosticos-diag_codigo').val(parsed.DIAG_CODIGO)
					
				$('#clasdiagnosticos-diag_createby').val(parsed.DIAG_CREATEBY)
					
				$('#clasdiagnosticos-diag_updateat').val(parsed.DIAG_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-clasdiagnosticos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/clasdiagnosticos/updateajax']).'";
   var btn = $("#btn-update-clasdiagnosticos");	var form = $("#form-update-clasdiagnosticos");            var div = $("#div-update-clasdiagnosticos");
   var grid = "#div-grid-clasdiagnosticos";
   var index = $("#div-index-clasdiagnosticos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>