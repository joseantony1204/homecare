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

<?php $form = ActiveForm::begin(['id' => 'form-create-planes']); ?>

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

<?= $form->field($model, 'PLAN_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'PLAN_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

<div class="form-group">
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-planes', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-planes").hide(); $("#div-index-planes").show();', 'title' => 'Cancelar' ]); ?>					
</div>

<?php ActiveForm::end(); ?>
					

<?php
$this->registerJs(' 
 $("#btn-register-planes").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/planes/createajax']).'";
   var btn = $("#btn-register-planes");	var form = $("#form-create-planes");
   var div = $("#div-create-planes");   var grid = "#div-grid-planes";
   var index = $("#div-index-planes");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>