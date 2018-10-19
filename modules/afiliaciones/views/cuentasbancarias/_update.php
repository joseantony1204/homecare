<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de cuentasbancarias</h5>
	</div>

	<div class="cuentasbancarias-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-cuentasbancarias']); ?>
												
						<?= $form->field($model, 'FOPA_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'FOPA_NUMEROCUENTA')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'FOPA_NUMEROSEGURIDAD')->textInput(); ?>

    			<?= $form->field($model, 'FOPA_FECHAVENCIMIENTO')->textInput(); ?>

    			<?= $form->field($model, 'FOPA_ACTUAL')->textInput(); ?>

    			<?= $form->field($model, 'BANC_ID')->textInput(); ?>

    			<?= $form->field($model, 'TICU_ID')->textInput(); ?>

    			<?= $form->field($model, 'PEPA_ID')->textInput(); ?>

    			<?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    			<?= $form->field($model, 'FOPA_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'FOMA_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-cuentasbancarias', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-cuentasbancarias").hide(); $("#div-index-cuentasbancarias").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/cuentasbancarias/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-cuentasbancarias').hide();
            $('#div-index-cuentasbancarias').hide();
		    $('#div-update-cuentasbancarias').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#cuentasbancarias-fopa_id').val(parsed.FOPA_ID)
					
				$('#cuentasbancarias-fopa_numerocuenta').val(parsed.FOPA_NUMEROCUENTA)
					
				$('#cuentasbancarias-fopa_numeroseguridad').val(parsed.FOPA_NUMEROSEGURIDAD)
					
				$('#cuentasbancarias-fopa_fechavencimiento').val(parsed.FOPA_FECHAVENCIMIENTO)
					
				$('#cuentasbancarias-fopa_actual').val(parsed.FOPA_ACTUAL)
					
				$('#cuentasbancarias-banc_id').val(parsed.BANC_ID)
					
				$('#cuentasbancarias-ticu_id').val(parsed.TICU_ID)
					
				$('#cuentasbancarias-pepa_id').val(parsed.PEPA_ID)
					
				$('#cuentasbancarias-afil_id').val(parsed.AFIL_ID)
					
				$('#cuentasbancarias-fopa_createby').val(parsed.FOPA_CREATEBY)
					
				$('#cuentasbancarias-foma_updateat').val(parsed.FOMA_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-cuentasbancarias").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/cuentasbancarias/updateajax']).'";
   var btn = $("#btn-update-cuentasbancarias");	var form = $("#form-update-cuentasbancarias");            var div = $("#div-update-cuentasbancarias");
   var grid = "#div-grid-cuentasbancarias";
   var index = $("#div-index-cuentasbancarias");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>