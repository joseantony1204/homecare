<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de remisiones</h5>
	</div>

	<div class="remisiones-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-remisiones']); ?>
												
						<?= $form->field($model, 'ATRM_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATRM_REMITIDOA')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRM_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATRM_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATRM_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-remisiones', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-remisiones").hide(); $("#div-index-remisiones").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/remisiones/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-remisiones').hide();
            $('#div-index-remisiones').hide();
		    $('#div-update-remisiones').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#remisiones-atrm_id').val(parsed.ATRM_ID)
					
				$('#remisiones-atrm_remitidoa').val(parsed.ATRM_REMITIDOA)
					
				$('#remisiones-atrm_observaciones').val(parsed.ATRM_OBSERVACIONES)
					
				$('#remisiones-agen_id').val(parsed.AGEN_ID)
					
				$('#remisiones-atrm_createby').val(parsed.ATRM_CREATEBY)
					
				$('#remisiones-atrm_updateat').val(parsed.ATRM_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-remisiones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/remisiones/updateajax']).'";
   var btn = $("#btn-update-remisiones");	var form = $("#form-update-remisiones");            var div = $("#div-update-remisiones");
   var grid = "#div-grid-remisiones";
   var index = $("#div-index-remisiones");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>