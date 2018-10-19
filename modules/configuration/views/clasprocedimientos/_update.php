<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tiposprocedimientos;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de Procedimientos</h5>
	</div>

	<div class="clasprocedimientos-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-clasprocedimientos']); ?>
												
						<?= $form->field($model, 'PROC_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'PROC_NOMBRE')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PROC_DESCRIPCION')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PROC_CUPS')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'PROC_SOAT')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'PROC_VALOR')->textInput(); ?>

    			<?= $form->field($model, 'PROC_REFERENCIA')->textarea(['rows' => 6]); ?>

    			<?= $form->field($model, 'PROC_UNIDAD')->textInput(['maxlength' => true]); ?>

    			<?php 
				$Tiposprocedimientos=Tiposprocedimientos::find()->all();
				$listData=ArrayHelper::map($Tiposprocedimientos,'TIPR_ID','TIPR_NOMBRE');
				echo $form->field($model, 'TIPR_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
				?>

    			<?= $form->field($model, 'ARLA_ID')->hiddenInput()->label(false); ?>
    			<?= $form->field($model, 'NILA_ID')->hiddenInput()->label(false); ?>
				
    			<?= $form->field($model, 'PROC_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'PROC_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-clasprocedimientos', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-clasprocedimientos").hide(); $("#div-index-clasprocedimientos").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/clasprocedimientos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-clasprocedimientos').hide();
            $('#div-index-clasprocedimientos').hide();
		    $('#div-update-clasprocedimientos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#clasprocedimientos-proc_id').val(parsed.PROC_ID)
					
				$('#clasprocedimientos-proc_nombre').val(parsed.PROC_NOMBRE)
					
				$('#clasprocedimientos-proc_descripcion').val(parsed.PROC_DESCRIPCION)
					
				$('#clasprocedimientos-proc_cups').val(parsed.PROC_CUPS)
					
				$('#clasprocedimientos-proc_soat').val(parsed.PROC_SOAT)
					
				$('#clasprocedimientos-proc_valor').val(parsed.PROC_VALOR)
					
				$('#clasprocedimientos-proc_referencia').val(parsed.PROC_REFERENCIA)
					
				$('#clasprocedimientos-proc_unidad').val(parsed.PROC_UNIDAD)
					
				$('#clasprocedimientos-tipr_id').val(parsed.TIPR_ID)
					
				$('#clasprocedimientos-arla_id').val(parsed.ARLA_ID)
					
				$('#clasprocedimientos-nila_id').val(parsed.NILA_ID)
					
				$('#clasprocedimientos-proc_createby').val(parsed.PROC_CREATEBY)
					
				$('#clasprocedimientos-proc_updateat').val(parsed.PROC_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-clasprocedimientos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/clasprocedimientos/updateajax']).'";
   var btn = $("#btn-update-clasprocedimientos");	var form = $("#form-update-clasprocedimientos");            var div = $("#div-update-clasprocedimientos");
   var grid = "#div-grid-clasprocedimientos";
   var index = $("#div-index-clasprocedimientos");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>