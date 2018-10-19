<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de bancos</h5>
	</div>

	<div class="bancos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-bancos']); ?>
												
						<?= $form->field($model, 'BANC_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'BANC_NIT')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BANC_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BANC_DIRECCION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BANC_TELEFONO')->textInput(['maxlength' => true]); ?>
				
				<?= $form->field($model, 'BANC_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'BANC_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-bancos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-bancos").hide(); $("#div-index-bancos").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/bancos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-bancos').hide();
            $('#div-index-bancos').hide();
		    $('#div-update-bancos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#bancos-banc_id').val(parsed.BANC_ID)
					
				$('#bancos-banc_nit').val(parsed.BANC_NIT)
					
				$('#bancos-banc_nombre').val(parsed.BANC_NOMBRE)
					
				$('#bancos-banc_direccion').val(parsed.BANC_DIRECCION)
					
				$('#bancos-banc_telefono').val(parsed.BANC_TELEFONO)
					
				$('#bancos-banc_createby').val(parsed.BANC_CREATEBY)
					
				$('#bancos-banc_updateat').val(parsed.BANC_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-bancos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/bancos/updateajax']).'";
   var btn = $("#btn-update-bancos");	var form = $("#form-update-bancos");
   var grid = "#div-grid-bancos";       var div = $("#div-update-bancos");
   var index = $("#div-index-bancos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>