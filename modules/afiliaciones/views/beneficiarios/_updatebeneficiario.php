<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de beneficiarios</h5>
	</div>

	<div class="beneficiarios-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-beneficiarios']); ?>
												
						<?= $form->field($model, 'BENE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'BENE_PRIMERNOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BENE_SEGUNDONOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BENE_PRIMERAPELLIDO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BENE_SEGUNDOAPELLIDO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'BENE_FECHAINGRESO')->textInput(); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    			<?= $form->field($model, 'BENE_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'BENE_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-beneficiarios', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-beneficiarios").hide(); $("#div-index-beneficiarios").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/beneficiarios/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-beneficiarios').hide();
            $('#div-index-beneficiarios').hide();
		    $('#div-update-beneficiarios').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#beneficiarios-bene_id').val(parsed.BENE_ID)
					
				$('#beneficiarios-bene_primernombre').val(parsed.BENE_PRIMERNOMBRE)
					
				$('#beneficiarios-bene_segundonombre').val(parsed.BENE_SEGUNDONOMBRE)
					
				$('#beneficiarios-bene_primerapellido').val(parsed.BENE_PRIMERAPELLIDO)
					
				$('#beneficiarios-bene_segundoapellido').val(parsed.BENE_SEGUNDOAPELLIDO)
					
				$('#beneficiarios-bene_fechaingreso').val(parsed.BENE_FECHAINGRESO)
					
				$('#beneficiarios-pers_id').val(parsed.PERS_ID)
					
				$('#beneficiarios-afil_id').val(parsed.AFIL_ID)
					
				$('#beneficiarios-bene_createby').val(parsed.BENE_CREATEBY)
					
				$('#beneficiarios-bene_updateat').val(parsed.BENE_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-beneficiarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/beneficiarios/updateajax']).'";
   var btn = $("#btn-update-beneficiarios");	var form = $("#form-update-beneficiarios");
   var grid = "#div-grid-beneficiarios";       var div = $("#div-update-beneficiarios");
   var index = $("#div-index-beneficiarios");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>