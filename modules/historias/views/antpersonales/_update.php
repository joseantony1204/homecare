<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antpersonales</h5>
	</div>

	<div class="antpersonales-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-antpersonales']); ?>
												
						<?= $form->field($model, 'ATAP_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATAP_HIPERTENSION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_DIABETES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_ENETOMBOTICA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_CONVULSIONES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_VALVULOPATIAS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_HEPATICA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_CEFALEA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_MAMARIA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAP_OTROS')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATAP_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATAP_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-antpersonales', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-antpersonales").hide(); $("#div-index-antpersonales").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/antpersonales/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-antpersonales').hide();
            $('#div-index-antpersonales').hide();
		    $('#div-update-antpersonales').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#antpersonales-atap_id').val(parsed.ATAP_ID)
					
				$('#antpersonales-atap_hipertension').val(parsed.ATAP_HIPERTENSION)
					
				$('#antpersonales-atap_diabetes').val(parsed.ATAP_DIABETES)
					
				$('#antpersonales-atap_enetombotica').val(parsed.ATAP_ENETOMBOTICA)
					
				$('#antpersonales-atap_convulsiones').val(parsed.ATAP_CONVULSIONES)
					
				$('#antpersonales-atap_valvulopatias').val(parsed.ATAP_VALVULOPATIAS)
					
				$('#antpersonales-atap_hepatica').val(parsed.ATAP_HEPATICA)
					
				$('#antpersonales-atap_cefalea').val(parsed.ATAP_CEFALEA)
					
				$('#antpersonales-atap_mamaria').val(parsed.ATAP_MAMARIA)
					
				$('#antpersonales-atap_otros').val(parsed.ATAP_OTROS)
					
				$('#antpersonales-pers_id').val(parsed.PERS_ID)
					
				$('#antpersonales-atap_createby').val(parsed.ATAP_CREATEBY)
					
				$('#antpersonales-atap_updateat').val(parsed.ATAP_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-antpersonales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antpersonales/updateajax']).'";
   var btn = $("#btn-update-antpersonales");	var form = $("#form-update-antpersonales");            var div = $("#div-update-antpersonales");
   var grid = "#div-grid-antpersonales";
   var index = $("#div-index-antpersonales");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>