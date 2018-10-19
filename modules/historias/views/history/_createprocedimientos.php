<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	
	<?php $form = ActiveForm::begin(['id' => 'form-create-procedimientos']); ?>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<label for="history-diag_id">Procedimiento <span class="danger">*</span></label>
				<?php 
					echo \yii\jui\AutoComplete::widget([    
					'clientOptions' => [
					'source' => \yii\helpers\Url::to(['/historias/procedimientos/autocomplete']),
					'minLength'=>'3', 
					'autoFill'=>true,
					'select' => new \yii\web\JsExpression("function( event, ui ) {
									$('#procedimientos-proc_id').val(ui.item.id);
								 }")],
					'options' => [
									'class' => 'custom-search form-control required',
									'placeholder'=>'Escriba algo para comenzar la busqueda...'
								 ]			 
					]);		
					
				?>
				<?= Html::activeHiddenInput($model, 'PROC_ID')?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATPR_CANTIDAD')->textInput(['value' =>1, 'maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
		
		<div class="col-md-6">
			<div class="form-group">
				<?php 							   
				   $model->ATPR_FECHASOLICITUD = date('Y-m-d H:i:s');
				   echo $form->field($model,'ATPR_FECHASOLICITUD')->
					widget(DatePicker::className(),[
						'dateFormat' => 'yyyy-MM-dd',
						'clientOptions' => [
							'yearRange' => '-115:+0',
							//'showWeek' => true,
							//'firstDay' => 1,      
							'showButtonPanel' => true,  
							//'buttonImageOnly' => true,
							//'showOn' =>"button",
							//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
							//'buttonText' =>"Seleccionar fecha",
						],
						'options' => ['class' => 'form-control required',]
					]); 
				?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
				<?= $form->field($model, 'ATPR_OBSERVACIONES')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>

	<?= $form->field($model, 'ATPR_RESULTADOS')->hiddenInput()->label(false); ?>
	
	<?= $form->field($model, 'ATPR_FECHAPROCESO')->hiddenInput()->label(false); ?>
	
	<?= $form->field($model, 'ATPR_ESTADO')->hiddenInput(['value' =>0])->label(false); ?>



	<div class="form-group">
		<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-procedimientos', 'title' => 'Guardar' ]); ?>						
		<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-procedimientos").hide(); $("#div-index-procedimientos").show();', 'title' => 'Cancelar' ]); ?>
	</div>

	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATPR_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATPR_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

																	
	<?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-procedimientos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/procedimientos/createajax']).'";
   var btn = $("#btn-register-procedimientos");	var form = $("#form-create-procedimientos");
   var div = $("#div-create-procedimientos");   var grid = "#div-grid-procedimientos";
   var index = $("#div-index-procedimientos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>