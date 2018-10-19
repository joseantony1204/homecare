<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de recomendaciones</h5>
	</div>

	<div class="recomendaciones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-recomendaciones']); ?>
												
						<?= $form->field($model, 'ATRE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATRE_RECOMENDACIONES')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATRE_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-recomendaciones', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-recomendaciones").hide(); $("#div-index-recomendaciones").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/recomendaciones/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-recomendaciones').hide();
            $('#div-index-recomendaciones').hide();
		    $('#div-update-recomendaciones').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#recomendaciones-atre_id').val(parsed.ATRE_ID)
					
				$('#recomendaciones-atre_recomendaciones').val(parsed.ATRE_RECOMENDACIONES)
					
				$('#recomendaciones-agen_id').val(parsed.AGEN_ID)
					
				$('#recomendaciones-atre_createby').val(parsed.ATRE_CREATEBY)
					
				$('#recomendaciones-atre_updateat').val(parsed.ATRE_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-recomendaciones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/recomendaciones/updateajax']).'";
   var btn = $("#btn-update-recomendaciones");	var form = $("#form-update-recomendaciones");            var div = $("#div-update-recomendaciones");
   var grid = "#div-grid-recomendaciones";
   var index = $("#div-index-recomendaciones");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>