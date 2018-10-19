<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de personas</h5>
	</div>

	<div class="personas-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-personas']); ?>
												
						<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'PERS_FECHANACIMIENTO')->textInput(); ?>

    			<?= $form->field($model, 'PERS_DIRECCION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'PERS_TELEFONO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'PERS_SENDSMS')->textInput(); ?>

    			<?= $form->field($model, 'PERS_EMAIL')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PERS_SENDMAIL')->textInput(); ?>

    			<?= $form->field($model, 'PERS_PATHIMG')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ESCI_ID')->textInput(); ?>

    			<?= $form->field($model, 'TIID_ID')->textInput(); ?>

    			<?= $form->field($model, 'TIGE_ID')->textInput(); ?>

    			<?= $form->field($model, 'PAIS_ID')->textInput(); ?>

    			<?= $form->field($model, 'DEPA_ID')->textInput(); ?>

    			<?= $form->field($model, 'MUNI_ID')->textInput(); ?>

    			<?= $form->field($model, 'PERS_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'PERS_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-personas', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-personas").hide(); $("#div-index-personas").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/personas/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-personas').hide();
            $('#div-index-personas').hide();
		    $('#div-update-personas').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#personas-pers_id').val(parsed.PERS_ID)
					
				$('#personas-pers_identificacion').val(parsed.PERS_IDENTIFICACION)
					
				$('#personas-pers_fechanacimiento').val(parsed.PERS_FECHANACIMIENTO)
					
				$('#personas-pers_direccion').val(parsed.PERS_DIRECCION)
					
				$('#personas-pers_telefono').val(parsed.PERS_TELEFONO)
					
				$('#personas-pers_sendsms').val(parsed.PERS_SENDSMS)
					
				$('#personas-pers_email').val(parsed.PERS_EMAIL)
					
				$('#personas-pers_sendmail').val(parsed.PERS_SENDMAIL)
					
				$('#personas-pers_pathimg').val(parsed.PERS_PATHIMG)
					
				$('#personas-esci_id').val(parsed.ESCI_ID)
					
				$('#personas-tiid_id').val(parsed.TIID_ID)
					
				$('#personas-tige_id').val(parsed.TIGE_ID)
					
				$('#personas-pais_id').val(parsed.PAIS_ID)
					
				$('#personas-depa_id').val(parsed.DEPA_ID)
					
				$('#personas-muni_id').val(parsed.MUNI_ID)
					
				$('#personas-pers_createby').val(parsed.PERS_CREATEBY)
					
				$('#personas-pers_updateat').val(parsed.PERS_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-personas").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/personas/updateajax']).'";
   var btn = $("#btn-update-personas");	var form = $("#form-update-personas");
   var grid = "#div-grid-personas";       var div = $("#div-update-personas");
   var index = $("#div-index-personas");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>