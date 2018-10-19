<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de procedimientos</h5>
	</div>

	<div class="procedimientos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-procedimientos']); ?>
												
						<?= $form->field($model, 'ATPR_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATPR_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATPR_FECHASOLICITUD')->textInput(); ?>

    			<?= $form->field($model, 'ATPR_RESULTADOS')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATPR_FECHAPROCESO')->textInput(); ?>

    			<?= $form->field($model, 'ATPR_ESTADO')->textInput(); ?>

    			<?= $form->field($model, 'PROC_ID')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATPR_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATPR_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-procedimientos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-procedimientos").hide(); $("#div-index-procedimientos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/procedimientos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-procedimientos').hide();
            $('#div-index-procedimientos').hide();
		    $('#div-update-procedimientos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#procedimientos-atpr_id').val(parsed.ATPR_ID)
					
				$('#procedimientos-atpr_observaciones').val(parsed.ATPR_OBSERVACIONES)
					
				$('#procedimientos-atpr_fechasolicitud').val(parsed.ATPR_FECHASOLICITUD)
					
				$('#procedimientos-atpr_resultados').val(parsed.ATPR_RESULTADOS)
					
				$('#procedimientos-atpr_fechaproceso').val(parsed.ATPR_FECHAPROCESO)
					
				$('#procedimientos-atpr_estado').val(parsed.ATPR_ESTADO)
					
				$('#procedimientos-proc_id').val(parsed.PROC_ID)
					
				$('#procedimientos-agen_id').val(parsed.AGEN_ID)
					
				$('#procedimientos-atpr_createby').val(parsed.ATPR_CREATEBY)
					
				$('#procedimientos-atpr_updateat').val(parsed.ATPR_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-procedimientos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/procedimientos/updateajax']).'";
   var btn = $("#btn-update-procedimientos");	var form = $("#form-update-procedimientos");            var div = $("#div-update-procedimientos");
   var grid = "#div-grid-procedimientos";
   var index = $("#div-index-procedimientos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>