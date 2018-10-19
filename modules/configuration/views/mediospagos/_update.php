<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Mediospagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de mediospagos</h5>
	</div>

	<div class="mediospagos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-mediospagos']); ?>
												
						<?= $form->field($model, 'MEPA_ID')->hiddenInput()->label(false); ?>						
						
					    <?= $form->field($model, 'MEPA_NOMBRE')->textInput(['maxlength' => true]); ?>

						<?= $form->field($model, 'MEPA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
			
						<?= $form->field($model, 'MEPA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-mediospagos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-mediospagos").hide(); $("#div-index-mediospagos").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/mediospagos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-mediospagos').hide();
            $('#div-index-mediospagos').hide();
		    $('#div-update-mediospagos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#mediospagos-mepa_id').val(parsed.MEPA_ID)
					
				$('#mediospagos-mepa_nombre').val(parsed.MEPA_NOMBRE)
					
				$('#mediospagos-mepa_createby').val(parsed.MEPA_CREATEBY)
					
				$('#mediospagos-mepa_updateat').val(parsed.MEPA_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-mediospagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/mediospagos/updateajax']).'";
   var btn = $("#btn-update-mediospagos");	var form = $("#form-update-mediospagos");
   var grid = "#div-grid-mediospagos";       var div = $("#div-update-mediospagos");
   var index = $("#div-index-mediospagos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>