<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Cargos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de cargos</h5>
	</div>

	<div class="cargos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-cargos']); ?>
												
						<?= $form->field($model, 'CARG_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'CARG_NOMBRE')->textInput(['maxlength' => true]); ?>

    		
				<?= $form->field($model, 'CARG_REGISTRADOPOR')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'CARG_FECHACAMBIO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-cargos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-cargos").hide(); $("#div-index-cargos").show()', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/cargos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-cargos').hide();
            $('#div-index-cargos').hide();
		    $('#div-update-cargos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#cargos-carg_id').val(parsed.CARG_ID)
					
				$('#cargos-carg_nombre').val(parsed.CARG_NOMBRE)
					
				$('#cargos-carg_fechacambio').val(parsed.CARG_FECHACAMBIO)
					
				$('#cargos-carg_registradopor').val(parsed.CARG_REGISTRADOPOR)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-cargos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/cargos/updateajax']).'";
   var btn = $("#btn-update-cargos");	var form = $("#form-update-cargos");
   var grid = "#div-grid-cargos";       var div = $("#div-update-cargos");
   var index = $("#div-index-cargos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>