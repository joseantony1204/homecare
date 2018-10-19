<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de diagnosticos</h5>
	</div>

	<div class="diagnosticos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-diagnosticos']); ?>
												
						<?= $form->field($model, 'ATDI_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATDI_RIESGOVICTIMA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATDI_RIESGOVICTIMAVIO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'DIAG_ID')->textInput(); ?>

    			<?= $form->field($model, 'CLDI_ID')->textInput(); ?>

    			<?= $form->field($model, 'TIDI_ID')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATDI_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATDI_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-diagnosticos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-diagnosticos").hide(); $("#div-index-diagnosticos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/diagnosticos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-diagnosticos').hide();
            $('#div-index-diagnosticos').hide();
		    $('#div-update-diagnosticos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#diagnosticos-atdi_id').val(parsed.ATDI_ID)
					
				$('#diagnosticos-atdi_riesgovictima').val(parsed.ATDI_RIESGOVICTIMA)
					
				$('#diagnosticos-atdi_riesgovictimavio').val(parsed.ATDI_RIESGOVICTIMAVIO)
					
				$('#diagnosticos-diag_id').val(parsed.DIAG_ID)
					
				$('#diagnosticos-cldi_id').val(parsed.CLDI_ID)
					
				$('#diagnosticos-tidi_id').val(parsed.TIDI_ID)
					
				$('#diagnosticos-agen_id').val(parsed.AGEN_ID)
					
				$('#diagnosticos-atdi_createby').val(parsed.ATDI_CREATEBY)
					
				$('#diagnosticos-atdi_updateat').val(parsed.ATDI_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-diagnosticos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/diagnosticos/updateajax']).'";
   var btn = $("#btn-update-diagnosticos");	var form = $("#form-update-diagnosticos");            var div = $("#div-update-diagnosticos");
   var grid = "#div-grid-diagnosticos";
   var index = $("#div-index-diagnosticos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>