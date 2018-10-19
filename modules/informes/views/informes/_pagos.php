<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

$this->title = "Descarga de informes";
?>
			
	<?php $form = ActiveForm::begin([
											'id' => 'form-informes', 
											'method'=>'post',
											]); ?>
									
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">							
				<?php 							   
				   $model->INFO_FECHAINICIAL = date('Y-m-d');
				   echo $form->field($model,'INFO_FECHAINICIAL')->
					widget(DatePicker::className(),[
						'dateFormat' => 'yyyy-MM-dd',
						'clientOptions' => [
							'yearRange' => '-115:+0',
							'changeMonth'=> true,
							'changeYear'=> true,
							'autoSize'=>true,
							//'showWeek' => true,
							//'firstDay' => 1,      
							'showButtonPanel' => true,  
							//'buttonImageOnly' => true,
							//'showOn' =>"button",
							//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
							//'buttonText' =>"Seleccionar fecha",
						],
						'options' => ['class' => 'form-control required',]
					])->label('Desde:*'); 
				?>				
			</div>
		</div>	
		
		<div class="col-md-6">
			<div class="form-group">							
				<?php 							   
				   $model->INFO_FECHAFINAL = date('Y-m-d');
				   echo $form->field($model,'INFO_FECHAFINAL')->
					widget(DatePicker::className(),[
						'dateFormat' => 'yyyy-MM-dd',
						'clientOptions' => [
							'yearRange' => '-115:+0',
							'defaultDate' =>date("Y-m-d"),
							'changeMonth'=> true,
							'changeYear'=> true,
							'autoSize'=>true,
							//'showWeek' => true,
							//'firstDay' => 1,      
							'showButtonPanel' => true,  
							//'buttonImageOnly' => true,
							//'showOn' =>"button",
							//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
							//'buttonText' =>"Seleccionar fecha",
						],
						'options' => ['class' => 'form-control required',]
					])->label('Hasta:*');
				?>				
			</div>
		</div>	
	</div>
	<?= $form->field($model, 'INFO_OPCION')->hiddenInput(['value' =>1])->label(false); ?>
	<div class="row button-group">			
		<div class="col-lg-2 col-md-4">
			<?= Html::submitButton('<i class="fa fa-download"> Descargar</i>',					 
					[
					'class' => 'btn btn-block btn-success',
					'name' => 'btn-informes-download', 
					'value' => '1', 
					'title' => 'Descargar', 
					]
					); 
			?>
		</div>
	</div>	
	
	<?php ActiveForm::end(); ?>

				