<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de revsistemas</h5>
	</div>

	<div class="revsistemas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-revsistemas']); ?>
												
						<?= $form->field($model, 'ATRS_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATRS_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATRS_GENERAL')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_RESPIRATORIO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_CARDIOVASCULAR')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_GASTROINTESTINAL')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_GENITOURINARIO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_ENDOCRINO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATRS_NEUROLOGICO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATRS_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATRS_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-revsistemas', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-revsistemas").hide(); $("#div-index-revsistemas").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/revsistemas/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-revsistemas').hide();
            $('#div-index-revsistemas').hide();
		    $('#div-update-revsistemas').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#revsistemas-atrs_id').val(parsed.ATRS_ID)
					
				$('#revsistemas-atrs_general').val(parsed.ATRS_GENERAL)
					
				$('#revsistemas-atrs_respiratorio').val(parsed.ATRS_RESPIRATORIO)
					
				$('#revsistemas-atrs_cardiovascular').val(parsed.ATRS_CARDIOVASCULAR)
					
				$('#revsistemas-atrs_gastrointestinal').val(parsed.ATRS_GASTROINTESTINAL)
					
				$('#revsistemas-atrs_genitourinario').val(parsed.ATRS_GENITOURINARIO)
					
				$('#revsistemas-atrs_endocrino').val(parsed.ATRS_ENDOCRINO)
					
				$('#revsistemas-atrs_neurologico').val(parsed.ATRS_NEUROLOGICO)
					
				$('#revsistemas-agen_id').val(parsed.AGEN_ID)
					
				$('#revsistemas-atrs_createby').val(parsed.ATRS_CREATEBY)
					
				$('#revsistemas-atrs_updateat').val(parsed.ATRS_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-revsistemas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/revsistemas/updateajax']).'";
   var btn = $("#btn-update-revsistemas");	var form = $("#form-update-revsistemas");            var div = $("#div-update-revsistemas");
   var grid = "#div-grid-revsistemas";
   var index = $("#div-index-revsistemas");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>