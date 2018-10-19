<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Testfindrisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de testfindrisk</h5>
	</div>

	<div class="testfindrisk-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-testfindrisk']); ?>
												
						<?= $form->field($model, 'ATTF_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATTF_EDAD')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_EDADPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_PESO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_TALLA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_IMC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_IMCTOTAL')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_IMCPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_PC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_PCMUJERES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_PCPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_ACTIVIDADFISICA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_ACTIVIDADFISICAPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_CONSUMEVERDURAS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_CONSUMEVERDURASPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_TOMAMEDICAMENTOS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_TOMAMEDICAMENTOSPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_GLUCOSA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_GLUCOSAPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_DIABETESPARIENTES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_DIABETESPARIENTESPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATTF_TOTALPNTS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATTF_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATTF_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-testfindrisk', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-testfindrisk").hide(); $("#div-index-testfindrisk").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/testfindrisk/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-testfindrisk').hide();
            $('#div-index-testfindrisk').hide();
		    $('#div-update-testfindrisk').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#testfindrisk-attf_id').val(parsed.ATTF_ID)
					
				$('#testfindrisk-attf_edad').val(parsed.ATTF_EDAD)
					
				$('#testfindrisk-attf_edadpnts').val(parsed.ATTF_EDADPNTS)
					
				$('#testfindrisk-attf_peso').val(parsed.ATTF_PESO)
					
				$('#testfindrisk-attf_talla').val(parsed.ATTF_TALLA)
					
				$('#testfindrisk-attf_imc').val(parsed.ATTF_IMC)
					
				$('#testfindrisk-attf_imctotal').val(parsed.ATTF_IMCTOTAL)
					
				$('#testfindrisk-attf_imcpnts').val(parsed.ATTF_IMCPNTS)
					
				$('#testfindrisk-attf_pc').val(parsed.ATTF_PC)
					
				$('#testfindrisk-attf_pcmujeres').val(parsed.ATTF_PCMUJERES)
					
				$('#testfindrisk-attf_pcpnts').val(parsed.ATTF_PCPNTS)
					
				$('#testfindrisk-attf_actividadfisica').val(parsed.ATTF_ACTIVIDADFISICA)
					
				$('#testfindrisk-attf_actividadfisicapnts').val(parsed.ATTF_ACTIVIDADFISICAPNTS)
					
				$('#testfindrisk-attf_consumeverduras').val(parsed.ATTF_CONSUMEVERDURAS)
					
				$('#testfindrisk-attf_consumeverduraspnts').val(parsed.ATTF_CONSUMEVERDURASPNTS)
					
				$('#testfindrisk-attf_tomamedicamentos').val(parsed.ATTF_TOMAMEDICAMENTOS)
					
				$('#testfindrisk-attf_tomamedicamentospnts').val(parsed.ATTF_TOMAMEDICAMENTOSPNTS)
					
				$('#testfindrisk-attf_glucosa').val(parsed.ATTF_GLUCOSA)
					
				$('#testfindrisk-attf_glucosapnts').val(parsed.ATTF_GLUCOSAPNTS)
					
				$('#testfindrisk-attf_diabetesparientes').val(parsed.ATTF_DIABETESPARIENTES)
					
				$('#testfindrisk-attf_diabetesparientespnts').val(parsed.ATTF_DIABETESPARIENTESPNTS)
					
				$('#testfindrisk-attf_totalpnts').val(parsed.ATTF_TOTALPNTS)
					
				$('#testfindrisk-agen_id').val(parsed.AGEN_ID)
					
				$('#testfindrisk-attf_createby').val(parsed.ATTF_CREATEBY)
					
				$('#testfindrisk-attf_updateat').val(parsed.ATTF_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-testfindrisk").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/testfindrisk/updateajax']).'";
   var btn = $("#btn-update-testfindrisk");	var form = $("#form-update-testfindrisk");            var div = $("#div-update-testfindrisk");
   var grid = "#div-grid-testfindrisk";
   var index = $("#div-index-testfindrisk");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>