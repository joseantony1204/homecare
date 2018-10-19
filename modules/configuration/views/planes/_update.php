<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Modalidadplan;
use app\modules\configuration\models\Tipoplan;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Planes */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['id' => 'form-update-planes']); ?>
												
<?= $form->field($model, 'PLAN_ID')->hiddenInput()->label(false); ?>						

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<?= $form->field($model, 'PLAN_NOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
		</div>
	</div>	
</div>

<div class="row">	
	<div class="col-md-6">
		<div class="form-group">		
			<?= $form->field($model, 'PLAN_DESCRIPCION')->textarea(['rows' => 1, 'class' =>'form-control']); ?>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">			
			<?php 
			$Modalidadplan=Modalidadplan::find()->all();
			$listData=ArrayHelper::map($Modalidadplan,'MOPL_ID','MOPL_NOMBRE');
			echo $form->field($model, 'MOPL_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
			?>									
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">		
			<?= $form->field($model, 'PLAN_VALOR')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">			
			<?php 
			$Tipoplan=Tipoplan::find()->all();
			$listData=ArrayHelper::map($Tipoplan,'TIPL_ID','TIPL_NOMBRE');
			echo $form->field($model, 'TIPL_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
			?>									
		</div>
	</div>	
</div>						
					    

										
<?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-planes', 'title' => 'Actualizar' ]); ?>
<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-planes").hide(); $("#div-index-planes").show()', 'title' => 'Cancelar' ]); ?>
							

<?php ActiveForm::end(); ?>

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/planes/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-planes').hide();
            $('#div-index-planes').hide();
		    $('#div-update-planes').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#planes-plan_id').val(parsed.PLAN_ID)
					
				$('#planes-plan_nombre').val(parsed.PLAN_NOMBRE)
					
				$('#planes-plan_descripcion').val(parsed.PLAN_DESCRIPCION)
					
				$('#planes-plan_valor').val(parsed.PLAN_VALOR)
					
				$('#planes-mopl_id').val(parsed.MOPL_ID)
					
				$('#planes-tipl_id').val(parsed.TIPL_ID)
					
				$('#planes-plan_createby').val(parsed.PLAN_CREATEBY)
					
				$('#planes-plan_updateat').val(parsed.PLAN_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-planes").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/planes/updateajax']).'";
   var btn = $("#btn-update-planes");	var form = $("#form-update-planes");
   var grid = "#div-grid-planes";       var div = $("#div-update-planes");
   var index = $("#div-index-planes");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>