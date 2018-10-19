<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de signosvitales</h5>
	</div>

	<div class="signosvitales-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-signosvitales']); ?>
												
						<?= $form->field($model, 'ATSV_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATSV_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATSV_PRESIONHH')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_PRESIONMM')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_PESO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_TALLA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_IMC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_FRECUENCIAC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_FRECUENCIAR')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_PERIMETROA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_PERIMETROC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_PERIMETROB')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATSV_TEMPERATURA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATSV_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATSV_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-signosvitales', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-signosvitales").hide(); $("#div-index-signosvitales").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/signosvitales/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-signosvitales').hide();
            $('#div-index-signosvitales').hide();
		    $('#div-update-signosvitales').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#signosvitales-atsv_id').val(parsed.ATSV_ID)
					
				$('#signosvitales-atsv_presionhh').val(parsed.ATSV_PRESIONHH)
					
				$('#signosvitales-atsv_presionmm').val(parsed.ATSV_PRESIONMM)
					
				$('#signosvitales-atsv_peso').val(parsed.ATSV_PESO)
					
				$('#signosvitales-atsv_talla').val(parsed.ATSV_TALLA)
					
				$('#signosvitales-atsv_imc').val(parsed.ATSV_IMC)
					
				$('#signosvitales-atsv_frecuenciac').val(parsed.ATSV_FRECUENCIAC)
					
				$('#signosvitales-atsv_frecuenciar').val(parsed.ATSV_FRECUENCIAR)
					
				$('#signosvitales-atsv_perimetroa').val(parsed.ATSV_PERIMETROA)
					
				$('#signosvitales-atsv_perimetroc').val(parsed.ATSV_PERIMETROC)
					
				$('#signosvitales-atsv_perimetrob').val(parsed.ATSV_PERIMETROB)
					
				$('#signosvitales-atsv_temperatura').val(parsed.ATSV_TEMPERATURA)
					
				$('#signosvitales-agen_id').val(parsed.AGEN_ID)
					
				$('#signosvitales-atsv_createby').val(parsed.ATSV_CREATEBY)
					
				$('#signosvitales-atsv_updateat').val(parsed.ATSV_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-signosvitales").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/signosvitales/updateajax']).'";
   var btn = $("#btn-update-signosvitales");	var form = $("#form-update-signosvitales");            var div = $("#div-update-signosvitales");
   var grid = "#div-grid-signosvitales";
   var index = $("#div-index-signosvitales");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>