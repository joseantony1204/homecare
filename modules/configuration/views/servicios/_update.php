<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tiposfinalidades;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Servicios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de servicios</h5>
	</div>

	<div class="servicios-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-servicios']); ?>
												
						<?= $form->field($model, 'FINA_ID')->hiddenInput()->label(false); ?>						
						
			    <?= $form->field($model, 'FINA_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?php 
				$Tiposfinalidades=Tiposfinalidades::find()->all();
				$listData=ArrayHelper::map($Tiposfinalidades,'TIFI_ID','TIFI_NOMBRE');
				echo $form->field($model, 'TIFI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
				?>
				
				<?= $form->field($model, 'FINA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'FINA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-servicios', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-servicios").hide(); $("#div-index-servicios").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/servicios/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-servicios').hide();
            $('#div-index-servicios').hide();
		    $('#div-update-servicios').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#servicios-fina_id').val(parsed.FINA_ID)
					
				$('#servicios-fina_nombre').val(parsed.FINA_NOMBRE)
					
				$('#servicios-tifi_id').val(parsed.TIFI_ID)
					
				$('#servicios-fina_createby').val(parsed.FINA_CREATEBY)
					
				$('#servicios-fina_updateat').val(parsed.FINA_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-servicios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/servicios/updateajax']).'";
   var btn = $("#btn-update-servicios");	var form = $("#form-update-servicios");            var div = $("#div-update-servicios");
   var grid = "#div-grid-servicios";
   var index = $("#div-index-servicios");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>