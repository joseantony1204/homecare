<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Causasexternas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de causasexternas</h5>
	</div>

	<div class="causasexternas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-causasexternas']); ?>
												
						<?= $form->field($model, 'CAEX_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'CAEX_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'CAEX_CODIGO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'CAEX_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'CAEX_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-causasexternas', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-causasexternas").hide(); $("#div-index-causasexternas").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/causasexternas/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-causasexternas').hide();
            $('#div-index-causasexternas').hide();
		    $('#div-update-causasexternas').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#causasexternas-caex_id').val(parsed.CAEX_ID)
					
				$('#causasexternas-caex_nombre').val(parsed.CAEX_NOMBRE)
					
				$('#causasexternas-caex_codigo').val(parsed.CAEX_CODIGO)
					
				$('#causasexternas-caex_createby').val(parsed.CAEX_CREATEBY)
					
				$('#causasexternas-caex_updateat').val(parsed.CAEX_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-causasexternas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/causasexternas/updateajax']).'";
   var btn = $("#btn-update-causasexternas");	var form = $("#form-update-causasexternas");            var div = $("#div-update-causasexternas");
   var grid = "#div-grid-causasexternas";
   var index = $("#div-index-causasexternas");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>