<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de pagos</h5>
	</div>

	<div class="pagos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-pagos']); ?>
												
						<?= $form->field($model, 'PAGO_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'PAGO_FECHA')->textInput(); ?>

    			<?= $form->field($model, 'PAGO_PERIODO')->textInput(); ?>

    			<?= $form->field($model, 'PAGO_MES')->textInput(); ?>

    			<?= $form->field($model, 'PAGO_ANIO')->textInput(); ?>

    			<?= $form->field($model, 'AFIL_ID')->textInput(); ?>

    			<?= $form->field($model, 'PAGO_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'PAGO_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-pagos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-pagos").hide(); $("#div-index-pagos").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/pagos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-pagos').hide();
            $('#div-index-pagos').hide();
		    $('#div-update-pagos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#pagos-pago_id').val(parsed.PAGO_ID)
					
				$('#pagos-pago_fecha').val(parsed.PAGO_FECHA)
					
				$('#pagos-pago_periodo').val(parsed.PAGO_PERIODO)
					
				$('#pagos-pago_mes').val(parsed.PAGO_MES)
					
				$('#pagos-pago_anio').val(parsed.PAGO_ANIO)
					
				$('#pagos-afil_id').val(parsed.AFIL_ID)
					
				$('#pagos-pago_createby').val(parsed.PAGO_CREATEBY)
					
				$('#pagos-pago_updateat').val(parsed.PAGO_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-pagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/pagos/updateajax']).'";
   var btn = $("#btn-update-pagos");	var form = $("#form-update-pagos");
   var grid = "#div-grid-pagos";       var div = $("#div-update-pagos");
   var index = $("#div-index-pagos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>