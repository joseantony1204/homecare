<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de citas</h5>
	</div>

	<div class="citas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-citas']); ?>
												
						<?= $form->field($model, 'CITA_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'CITA_FECHA')->textInput(); ?>

    			<?= $form->field($model, 'CITA_FECHAREGISTRO')->textInput(); ?>

    			<?= $form->field($model, 'CITA_LLEGADA')->textInput(); ?>

    			<?= $form->field($model, 'CIES_ID')->textInput(); ?>

    			<?= $form->field($model, 'CIFI_ID')->textInput(); ?>

    			<?= $form->field($model, 'CICE_ID')->textInput(); ?>

    			<?= $form->field($model, 'PEPA_ID')->textInput(); ?>

    			<?= $form->field($model, 'EMHO_ID')->textInput(); ?>

    			<?= $form->field($model, 'CIDI_ID')->textInput(); ?>

    			<?= $form->field($model, 'CICS_ID')->textInput(); ?>

    			<?= $form->field($model, 'CITA_FECHACAMBIO')->textInput(); ?>

    			<?= $form->field($model, 'CITA_REGISTRADOPOR')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-citas', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-citas").hide(); $("#div-index-citas").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/citas/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-citas').hide();
            $('#div-index-citas').hide();
		    $('#div-update-citas').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#citas-cita_id').val(parsed.CITA_ID)
					
				$('#citas-cita_fecha').val(parsed.CITA_FECHA)
					
				$('#citas-cita_fecharegistro').val(parsed.CITA_FECHAREGISTRO)
					
				$('#citas-cita_llegada').val(parsed.CITA_LLEGADA)
					
				$('#citas-cies_id').val(parsed.CIES_ID)
					
				$('#citas-cifi_id').val(parsed.CIFI_ID)
					
				$('#citas-cice_id').val(parsed.CICE_ID)
					
				$('#citas-pepa_id').val(parsed.PEPA_ID)
					
				$('#citas-emho_id').val(parsed.EMHO_ID)
					
				$('#citas-cidi_id').val(parsed.CIDI_ID)
					
				$('#citas-cics_id').val(parsed.CICS_ID)
					
				$('#citas-cita_fechacambio').val(parsed.CITA_FECHACAMBIO)
					
				$('#citas-cita_registradopor').val(parsed.CITA_REGISTRADOPOR)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-citas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/agendation/citas/updateajax']).'";
   var btn = $("#btn-update-citas");	var form = $("#form-update-citas");            var div = $("#div-update-citas");
   var grid = "#div-grid-citas";
   var index = $("#div-index-citas");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>