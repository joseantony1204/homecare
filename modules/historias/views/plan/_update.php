<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de plan</h5>
	</div>

	<div class="plan-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-plan']); ?>
												
						<?= $form->field($model, 'ATPL_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATPL_DESCRIPCION')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATPL_OBSERVACIONES')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATPL_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATPL_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-plan', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-plan").hide(); $("#div-index-plan").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/plan/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-plan').hide();
            $('#div-index-plan').hide();
		    $('#div-update-plan').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#plan-atpl_id').val(parsed.ATPL_ID)
					
				$('#plan-atpl_descripcion').val(parsed.ATPL_DESCRIPCION)
					
				$('#plan-atpl_observaciones').val(parsed.ATPL_OBSERVACIONES)
					
				$('#plan-agen_id').val(parsed.AGEN_ID)
					
				$('#plan-atpl_createby').val(parsed.ATPL_CREATEBY)
					
				$('#plan-atpl_updateat').val(parsed.ATPL_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-plan").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/plan/updateajax']).'";
   var btn = $("#btn-update-plan");	var form = $("#form-update-plan");            var div = $("#div-update-plan");
   var grid = "#div-grid-plan";
   var index = $("#div-index-plan");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>