<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Causasexternas;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

		<?php $form = ActiveForm::begin(['id' => 'form-update-generalidades']); ?>
		<?= $form->field($model, 'ATGE_ID')->hiddenInput()->label(false); ?>						
		
		<div class="row">									
			<div class="col-md-6">
				<div class="form-group">
					<?php 							   
					   echo $form->field($model,'ATGE_FECHA')->
						widget(DatePicker::className(),[
							'dateFormat' => 'yyyy-MM-dd',
							'clientOptions' => [
								'yearRange' => '-115:+0',
								'value' => date('Y-m-d'),
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
			
			<div class="col-md-6">
				<div class="form-group">
					<?php 
						$Causasexternas=Causasexternas::find()->all();
						$listData=ArrayHelper::map($Causasexternas,'CAEX_ID','CAEX_NOMBRE');
						echo $form->field($model, 'CAEX_ID')->dropDownList($listData, ['class' => 'custom-select form-control required' ]);
					?>
				</div>
			</div>									
		</div>
		
		<div class="row">									
			<div class="col-md-6">
				<div class="form-group">
					<?= $form->field($model, 'ATGE_MOTIVO')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">							
					<?= $form->field($model, 'ATGE_ENFERMEDAD')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
				</div>
			</div>	
		</div>		
	

		<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
		<?= $form->field($model, 'ATGE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
		<?= $form->field($model, 'ATGE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
		
		<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
									[ 
										'class' => 'btn btn-success waves-effect waves-light', 
										'id' => 'btn-update-generalidades', 
										'title' => 'Actualizar',
									]
							   ); 
		?>						
		<?php ActiveForm::end(); ?>
					
</div>



<?php
$this->registerJs(' 
 $("#btn-update-generalidades").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/generalidades/updateajax']).'";
   var btn = $("#btn-update-generalidades");	var form = $("#form-update-generalidades");
   
   jqueryupdate(url,btn,form);   
 }); 
 ');
?>