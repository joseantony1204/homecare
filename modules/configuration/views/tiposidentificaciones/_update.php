<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Tiposidentificaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de tiposidentificaciones</h5>
	</div>

	<div class="tiposidentificaciones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-tiposidentificaciones']); ?>
												
						<?= $form->field($model, 'TIID_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'TIID_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'TIID_DETALLE')->textInput(['maxlength' => true]); ?>

				
				<?= $form->field($model, 'TIID_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'TIID_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-tiposidentificaciones', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-tiposidentificaciones").hide(); $("#div-index-tiposidentificaciones").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/tiposidentificaciones/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-tiposidentificaciones').hide();
            $('#div-index-tiposidentificaciones').hide();
		    $('#div-update-tiposidentificaciones').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#tiposidentificaciones-tiid_id').val(parsed.TIID_ID)
					
				$('#tiposidentificaciones-tiid_nombre').val(parsed.TIID_NOMBRE)
					
				$('#tiposidentificaciones-tiid_detalle').val(parsed.TIID_DETALLE)
					
				$('#tiposidentificaciones-tiid_createby').val(parsed.TIID_CREATEBY)
					
				$('#tiposidentificaciones-tiid_updateat').val(parsed.TIID_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-tiposidentificaciones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/tiposidentificaciones/updateajax']).'";
   var btn = $("#btn-update-tiposidentificaciones");	var form = $("#form-update-tiposidentificaciones");
   var grid = "#div-grid-tiposidentificaciones";       var div = $("#div-update-tiposidentificaciones");
   var index = $("#div-index-tiposidentificaciones");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>