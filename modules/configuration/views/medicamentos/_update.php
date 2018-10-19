<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Medicamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de medicamentos</h5>
	</div>

	<div class="medicamentos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-medicamentos']); ?>
												
						<?= $form->field($model, 'MEDI_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'MEDI_CODIGOATC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'MEDI_DESCRIPCIONATC')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'MEDI_PRINCIPIOACTIVO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'MEDI_CONCENTRACION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'MEDI_FORMAFARMACEUTICA')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'MEDI_ACLARACION')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'MEDI_LISTA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'MEDI_VALOR')->textInput(['maxlength' => true]); ?>

				<?= $form->field($model, 'MEDI_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'MEDI_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-medicamentos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-medicamentos").hide(); $("#div-index-medicamentos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/medicamentos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-medicamentos').hide();
            $('#div-index-medicamentos').hide();
		    $('#div-update-medicamentos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#medicamentos-medi_id').val(parsed.MEDI_ID)
					
				$('#medicamentos-medi_codigoatc').val(parsed.MEDI_CODIGOATC)
					
				$('#medicamentos-medi_descripcionatc').val(parsed.MEDI_DESCRIPCIONATC)
					
				$('#medicamentos-medi_principioactivo').val(parsed.MEDI_PRINCIPIOACTIVO)
					
				$('#medicamentos-medi_concentracion').val(parsed.MEDI_CONCENTRACION)
					
				$('#medicamentos-medi_formafarmaceutica').val(parsed.MEDI_FORMAFARMACEUTICA)
					
				$('#medicamentos-medi_aclaracion').val(parsed.MEDI_ACLARACION)
					
				$('#medicamentos-medi_lista').val(parsed.MEDI_LISTA)
					
				$('#medicamentos-medi_valor').val(parsed.MEDI_VALOR)
					
				$('#medicamentos-medi_createby').val(parsed.MEDI_CREATEBY)
					
				$('#medicamentos-medi_updateat').val(parsed.MEDI_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-medicamentos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/medicamentos/updateajax']).'";
   var btn = $("#btn-update-medicamentos");	var form = $("#form-update-medicamentos");            var div = $("#div-update-medicamentos");
   var grid = "#div-grid-medicamentos";
   var index = $("#div-index-medicamentos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>