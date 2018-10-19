<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de generalidades</h5>
	</div>

	<div class="generalidades-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-generalidades']); ?>
												
						<?= $form->field($model, 'ATGE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATGE_FECHA')->textInput(); ?>

    			<?= $form->field($model, 'ATGE_MOTIVO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATGE_ENFERMEDAD')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'CAEX_ID')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATGE_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATGE_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-generalidades', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-generalidades").hide()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/generalidades/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-generalidades').hide();
		    $('#div-update-generalidades').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#generalidades-atge_id').val(parsed.ATGE_ID)
					
				$('#generalidades-atge_fecha').val(parsed.ATGE_FECHA)
					
				$('#generalidades-atge_motivo').val(parsed.ATGE_MOTIVO)
					
				$('#generalidades-atge_enfermedad').val(parsed.ATGE_ENFERMEDAD)
					
				$('#generalidades-caex_id').val(parsed.CAEX_ID)
					
				$('#generalidades-agen_id').val(parsed.AGEN_ID)
					
				$('#generalidades-atge_createby').val(parsed.ATGE_CREATEBY)
					
				$('#generalidades-atge_updateat').val(parsed.ATGE_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-generalidades").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/generalidades/updateajax']).'";
   var btn = $("#btn-update-generalidades");	var form = $("#form-update-generalidades");
   var grid = "#div-grid-generalidades";
   
   jupdateform(url,btn,form,grid);   
 }); 
 ');
?>