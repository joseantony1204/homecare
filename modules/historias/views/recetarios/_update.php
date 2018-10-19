<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recetarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de recetarios</h5>
	</div>

	<div class="recetarios-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-recetarios']); ?>
												
						<?= $form->field($model, 'ATRE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATRE_CANTIDAD')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_TOMACADA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_TOMACADADESCRIPCION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_DURACION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_DURACIONDESCRIPCION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_DETALLES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_VIASUMINISTRO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATRE_FECHAINICIO')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_FORMULA')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'MEDI_ID')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-recetarios', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-recetarios").hide(); $("#div-index-recetarios").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/recetarios/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-recetarios').hide();
            $('#div-index-recetarios').hide();
		    $('#div-update-recetarios').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#recetarios-atre_id').val(parsed.ATRE_ID)
					
				$('#recetarios-atre_cantidad').val(parsed.ATRE_CANTIDAD)
					
				$('#recetarios-atre_tomacada').val(parsed.ATRE_TOMACADA)
					
				$('#recetarios-atre_tomacadadescripcion').val(parsed.ATRE_TOMACADADESCRIPCION)
					
				$('#recetarios-atre_duracion').val(parsed.ATRE_DURACION)
					
				$('#recetarios-atre_duraciondescripcion').val(parsed.ATRE_DURACIONDESCRIPCION)
					
				$('#recetarios-atre_detalles').val(parsed.ATRE_DETALLES)
					
				$('#recetarios-atre_viasuministro').val(parsed.ATRE_VIASUMINISTRO)
					
				$('#recetarios-atre_fechainicio').val(parsed.ATRE_FECHAINICIO)
					
				$('#recetarios-atre_formula').val(parsed.ATRE_FORMULA)
					
				$('#recetarios-medi_id').val(parsed.MEDI_ID)
					
				$('#recetarios-agen_id').val(parsed.AGEN_ID)
					
				$('#recetarios-atre_createby').val(parsed.ATRE_CREATEBY)
					
				$('#recetarios-atre_updateat').val(parsed.ATRE_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-recetarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/recetarios/updateajax']).'";
   var btn = $("#btn-update-recetarios");	var form = $("#form-update-recetarios");            var div = $("#div-update-recetarios");
   var grid = "#div-grid-recetarios";
   var index = $("#div-index-recetarios");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>