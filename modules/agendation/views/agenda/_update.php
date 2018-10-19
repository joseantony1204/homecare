<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de agenda</h5>
	</div>

	<div class="agenda-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-agenda']); ?>
												
						<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'AGEN_FECHAPROCESO')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_FECHA')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_HORAINICIO')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_HORAFINAL')->textInput(); ?>

    			<?= $form->field($model, 'FINA_ID')->textInput(); ?>

    			<?= $form->field($model, 'PERS_ID')->textInput(); ?>

    			<?= $form->field($model, 'PEEM_ID')->textInput(); ?>

    			<?= $form->field($model, 'ESCI_ID')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'AGEN_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-agenda', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-agenda").hide(); $("#div-index-agenda").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-agenda').hide();
            $('#div-index-agenda').hide();
		    $('#div-update-agenda').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#agenda-agen_id').val(parsed.AGEN_ID)
					
				$('#agenda-agen_fechaproceso').val(parsed.AGEN_FECHAPROCESO)
					
				$('#agenda-agen_fecha').val(parsed.AGEN_FECHA)
					
				$('#agenda-agen_horainicio').val(parsed.AGEN_HORAINICIO)
					
				$('#agenda-agen_horafinal').val(parsed.AGEN_HORAFINAL)
					
				$('#agenda-fina_id').val(parsed.FINA_ID)
					
				$('#agenda-pers_id').val(parsed.PERS_ID)
					
				$('#agenda-peem_id').val(parsed.PEEM_ID)
					
				$('#agenda-esci_id').val(parsed.ESCI_ID)
					
				$('#agenda-agen_createby').val(parsed.AGEN_CREATEBY)
					
				$('#agenda-agen_updateat').val(parsed.AGEN_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-agenda").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/agendation/agenda/updateajax']).'";
   var btn = $("#btn-update-agenda");	var form = $("#form-update-agenda");
   var grid = "#div-grid-agenda";       var div = $("#div-update-agenda");
   var index = $("#div-index-agenda");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>