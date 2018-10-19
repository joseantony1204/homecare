<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Generos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de generos</h5>
	</div>

	<div class="generos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-generos']); ?>
												
						<?= $form->field($model, 'TIGE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'TIGE_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'TIGE_DETALLE')->textInput(['maxlength' => true]); ?>

    			
				<?= $form->field($model, 'TIGE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'TIGE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-generos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-generos").hide(); $("#div-index-generos").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/generos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-generos').hide();
            $('#div-index-generos').hide();
		    $('#div-update-generos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#generos-tige_id').val(parsed.TIGE_ID)
					
				$('#generos-tige_nombre').val(parsed.TIGE_NOMBRE)
					
				$('#generos-tige_detalle').val(parsed.TIGE_DETALLE)
					
				$('#generos-tige_createby').val(parsed.TIGE_CREATEBY)
					
				$('#generos-tige_updateat').val(parsed.TIGE_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-generos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/generos/updateajax']).'";
   var btn = $("#btn-update-generos");	var form = $("#form-update-generos");
   var grid = "#div-grid-generos";       var div = $("#div-update-generos");
   var index = $("#div-index-generos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>