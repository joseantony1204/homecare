<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antginecologicos</h5>
	</div>

	<div class="antginecologicos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-antginecologicos']); ?>
												
						<?= $form->field($model, 'ATAG_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATAG_MENARGUIA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_CICLOS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_FUM')->textInput(); ?>

    			<?= $form->field($model, 'ATAG_GRAVIDA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_PARTOS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_ABORTO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_CESARIA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_LACTANDO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_DISMINORREA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_EPI')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_COMPANEROS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_MASHIJOS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_ENFESEXU')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAG_OTROS')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATAG_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATAG_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-antginecologicos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-antginecologicos").hide(); $("#div-index-antginecologicos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/antginecologicos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-antginecologicos').hide();
            $('#div-index-antginecologicos').hide();
		    $('#div-update-antginecologicos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#antginecologicos-atag_id').val(parsed.ATAG_ID)
					
				$('#antginecologicos-atag_menarguia').val(parsed.ATAG_MENARGUIA)
					
				$('#antginecologicos-atag_ciclos').val(parsed.ATAG_CICLOS)
					
				$('#antginecologicos-atag_fum').val(parsed.ATAG_FUM)
					
				$('#antginecologicos-atag_gravida').val(parsed.ATAG_GRAVIDA)
					
				$('#antginecologicos-atag_partos').val(parsed.ATAG_PARTOS)
					
				$('#antginecologicos-atag_aborto').val(parsed.ATAG_ABORTO)
					
				$('#antginecologicos-atag_cesaria').val(parsed.ATAG_CESARIA)
					
				$('#antginecologicos-atag_lactando').val(parsed.ATAG_LACTANDO)
					
				$('#antginecologicos-atag_disminorrea').val(parsed.ATAG_DISMINORREA)
					
				$('#antginecologicos-atag_epi').val(parsed.ATAG_EPI)
					
				$('#antginecologicos-atag_companeros').val(parsed.ATAG_COMPANEROS)
					
				$('#antginecologicos-atag_mashijos').val(parsed.ATAG_MASHIJOS)
					
				$('#antginecologicos-atag_enfesexu').val(parsed.ATAG_ENFESEXU)
					
				$('#antginecologicos-atag_otros').val(parsed.ATAG_OTROS)
					
				$('#antginecologicos-pers_id').val(parsed.PERS_ID)
					
				$('#antginecologicos-atag_createby').val(parsed.ATAG_CREATEBY)
					
				$('#antginecologicos-atag_updateat').val(parsed.ATAG_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-antginecologicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antginecologicos/updateajax']).'";
   var btn = $("#btn-update-antginecologicos");	var form = $("#form-update-antginecologicos");            var div = $("#div-update-antginecologicos");
   var grid = "#div-grid-antginecologicos";
   var index = $("#div-index-antginecologicos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>