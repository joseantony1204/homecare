<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Estractos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de estractos</h5>
	</div>

	<div class="estractos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-estractos']); ?>
												
						<?= $form->field($model, 'ESTR_ID')->hiddenInput()->label(false); ?>						
						
						<?= $form->field($model, 'ESTR_NOMBRE')->textInput(['maxlength' => true]); ?>

						<?= $form->field($model, 'ESTR_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
			
						<?= $form->field($model, 'ESTR_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-estractos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-estractos").hide(); $("#div-index-estractos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/estractos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-estractos').hide();
            $('#div-index-estractos').hide();
		    $('#div-update-estractos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#estractos-estr_id').val(parsed.ESTR_ID)
					
				$('#estractos-estr_nombre').val(parsed.ESTR_NOMBRE)
					
				$('#estractos-estr_createby').val(parsed.ESTR_CREATEBY)
					
				$('#estractos-estr_updateat').val(parsed.ESTR_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-estractos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/estractos/updateajax']).'";
   var btn = $("#btn-update-estractos");	var form = $("#form-update-estractos");            var div = $("#div-update-estractos");
   var grid = "#div-grid-estractos";
   var index = $("#div-index-estractos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>