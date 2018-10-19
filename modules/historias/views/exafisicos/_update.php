<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de exafisicos</h5>
	</div>

	<div class="exafisicos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-exafisicos']); ?>
												
						<?= $form->field($model, 'ATEF_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'ATEF_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATEF_ASPECTO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_ESTADO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_CABEZA')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_VISUAL')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_CUELLO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_TORAX')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_ABDOMEN')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_GENITOURINARIO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_OSTEOMUSCULAR')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_PIELYFANERAZ')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'ATEF_NEUROLOGICO')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'AGEN_ID')->textInput(); ?>

    			<?= $form->field($model, 'ATEF_CREATEBY')->textInput(); ?>

    			<?= $form->field($model, 'ATEF_UPDATEAT')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-exafisicos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-exafisicos").hide(); $("#div-index-exafisicos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/exafisicos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-exafisicos').hide();
            $('#div-index-exafisicos').hide();
		    $('#div-update-exafisicos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#exafisicos-atef_id').val(parsed.ATEF_ID)
					
				$('#exafisicos-atef_aspecto').val(parsed.ATEF_ASPECTO)
					
				$('#exafisicos-atef_estado').val(parsed.ATEF_ESTADO)
					
				$('#exafisicos-atef_cabeza').val(parsed.ATEF_CABEZA)
					
				$('#exafisicos-atef_visual').val(parsed.ATEF_VISUAL)
					
				$('#exafisicos-atef_cuello').val(parsed.ATEF_CUELLO)
					
				$('#exafisicos-atef_torax').val(parsed.ATEF_TORAX)
					
				$('#exafisicos-atef_abdomen').val(parsed.ATEF_ABDOMEN)
					
				$('#exafisicos-atef_genitourinario').val(parsed.ATEF_GENITOURINARIO)
					
				$('#exafisicos-atef_osteomuscular').val(parsed.ATEF_OSTEOMUSCULAR)
					
				$('#exafisicos-atef_pielyfaneraz').val(parsed.ATEF_PIELYFANERAZ)
					
				$('#exafisicos-atef_neurologico').val(parsed.ATEF_NEUROLOGICO)
					
				$('#exafisicos-agen_id').val(parsed.AGEN_ID)
					
				$('#exafisicos-atef_createby').val(parsed.ATEF_CREATEBY)
					
				$('#exafisicos-atef_updateat').val(parsed.ATEF_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-exafisicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/exafisicos/updateajax']).'";
   var btn = $("#btn-update-exafisicos");	var form = $("#form-update-exafisicos");            var div = $("#div-update-exafisicos");
   var grid = "#div-grid-exafisicos";
   var index = $("#div-index-exafisicos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>