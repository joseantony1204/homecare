<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antfamiliares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de antfamiliares</h5>
	</div>

	<div class="antfamiliares-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-antfamiliares']); ?>
												
						<?= $form->field($model, 'ATAF_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATAF_HIPERTENSION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAF_DIABETES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAF_CONVULSIVO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAF_MALFORMACIONES')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAF_CANCER')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'ATAF_OTROS')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATAF_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATAF_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-antfamiliares', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-antfamiliares").hide(); $("#div-index-antfamiliares").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/antfamiliares/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-antfamiliares').hide();
            $('#div-index-antfamiliares').hide();
		    $('#div-update-antfamiliares').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#antfamiliares-ataf_id').val(parsed.ATAF_ID)
					
				$('#antfamiliares-ataf_hipertension').val(parsed.ATAF_HIPERTENSION)
					
				$('#antfamiliares-ataf_diabetes').val(parsed.ATAF_DIABETES)
					
				$('#antfamiliares-ataf_convulsivo').val(parsed.ATAF_CONVULSIVO)
					
				$('#antfamiliares-ataf_malformaciones').val(parsed.ATAF_MALFORMACIONES)
					
				$('#antfamiliares-ataf_cancer').val(parsed.ATAF_CANCER)
					
				$('#antfamiliares-ataf_otros').val(parsed.ATAF_OTROS)
					
				$('#antfamiliares-pers_id').val(parsed.PERS_ID)
					
				$('#antfamiliares-ataf_createby').val(parsed.ATAF_CREATEBY)
					
				$('#antfamiliares-ataf_updateat').val(parsed.ATAF_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-antfamiliares").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antfamiliares/updateajax']).'";
   var btn = $("#btn-update-antfamiliares");	var form = $("#form-update-antfamiliares");            var div = $("#div-update-antfamiliares");
   var grid = "#div-grid-antfamiliares";
   var index = $("#div-index-antfamiliares");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>