<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de habitos</h5>
	</div>

	<div class="habitos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-habitos']); ?>
												
						<?= $form->field($model, 'ATHA_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATHA_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATHA_ALCOHOL')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATHA_CIGARRILLO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATHA_DROGAS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATHA_OTROS')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATHA_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATHA_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-habitos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-habitos").hide(); $("#div-index-habitos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/habitos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-habitos').hide();
            $('#div-index-habitos').hide();
		    $('#div-update-habitos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#habitos-atha_id').val(parsed.ATHA_ID)
					
				$('#habitos-atha_alcohol').val(parsed.ATHA_ALCOHOL)
					
				$('#habitos-atha_cigarrillo').val(parsed.ATHA_CIGARRILLO)
					
				$('#habitos-atha_drogas').val(parsed.ATHA_DROGAS)
					
				$('#habitos-atha_otros').val(parsed.ATHA_OTROS)
					
				$('#habitos-pers_id').val(parsed.PERS_ID)
					
				$('#habitos-atha_createby').val(parsed.ATHA_CREATEBY)
					
				$('#habitos-atha_updateat').val(parsed.ATHA_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-habitos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/habitos/updateajax']).'";
   var btn = $("#btn-update-habitos");	var form = $("#form-update-habitos");            var div = $("#div-update-habitos");
   var grid = "#div-grid-habitos";
   var index = $("#div-index-habitos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>