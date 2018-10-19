<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

	<?php $form = ActiveForm::begin(['id' => 'form-update-antginecologicos']); ?>												
	<?= $form->field($model, 'ATAG_ID')->hiddenInput()->label(false); ?>

	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_MENARGUIA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_CICLOS')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
												
		<div class="col-md-4">
			<div class="form-group">
				<?php 							   
				   echo $form->field($model,'ATAG_FUM')->
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
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_GRAVIDA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
												
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_PARTOS')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_ABORTO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">											
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATAG_CESARIA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
										
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAG_LACTANDO')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAG_DISMINORREA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
	</div>
	
	<div class="row">									
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAG_EPI')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAG_COMPANEROS')->dropDownList([ '<1' => '<1', '>1' => '>1'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
										
		<div class="col-md-4">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATAG_MASHIJOS')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
	</div>
		
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATAG_ENFESEXU')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	
		<div class="col-md-6">
			<div class="form-group">							
				<?= $form->field($model, 'ATAG_OTROS')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>		

	<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATAG_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATAG_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-antginecologicos', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>



<?php
$this->registerJs(' 
 $("#btn-update-antginecologicos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antginecologicos/updateajax']).'";
   var btn = $("#btn-update-antginecologicos");	var form = $("#form-update-antginecologicos");            
   var div = $("#div-update-antginecologicos");
   var grid = "#div-grid-antginecologicos";
   var index = $("#div-index-antginecologicos");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>