<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Estadospagos;
use app\modules\configuration\models\Mediospagos;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['id' => 'form-create-pagos', 'options' => ['enctype' => 'multipart/form-data'],]); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span>Agregar pagos al afiliado</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">										
					<div class="col-md-6">
						<div class="form-group">
							<?php 
							   $model->PAGO_FECHA = date('Y-m-d');
							   echo $form->field($model,'PAGO_FECHA')->
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
									'options' => ['class' => 'form-control',]
								])->label('Fecha de pago*'); 
							?>									
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Mediospagos=Mediospagos::find()->all();
							$listData=ArrayHelper::map($Mediospagos,'MEPA_ID','MEPA_NOMBRE');
							echo $form->field($model, 'MEPA_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>			
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php 
							   $model->PAGO_FECHAINICIO = date('Y-m-d');
							   echo $form->field($model,'PAGO_FECHAINICIO')->
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
									'options' => ['class' => 'form-control',]
								])->label('Desde*'); 
							?>									
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							   $model->PAGO_FECHAFINAL = date('Y-m-d');
							   echo $form->field($model,'PAGO_FECHAFINAL')->
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
									'options' => ['class' => 'form-control',]
								])->label('Hasta*'); 
							?>			
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?= $form->field($model, 'PAGO_VALOR')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Valor pagado*'); ?>								
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Estadospagos=Estadospagos::find()->all();
							$listData=ArrayHelper::map($Estadospagos,'ESPA_ID','ESPA_NOMBRE');
							echo $form->field($model, 'ESPA_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>			
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'PAGO_SOPORTE')->fileInput(['data-max-file-size' => '2M', 'class' => 'dropify'])->label('Comprobante de pago'); ?>                       
                     </div>
				</div>	
				
			</section>
		</div>
	</div>
</div>

<?= $form->field($model, 'AFIL_ID')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'PAGO_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'PAGO_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

<div class="form-group">
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-pagos', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-pagos").hide(); $("#div-index-pagos").show();', 'title' => 'Cancelar' ]); ?>					
</div>

<?php ActiveForm::end(); ?>

<?php
$this->registerJs(' 
 $("#btn-register-pagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/pagos/createajax']).'";
   var btn = $("#btn-register-pagos"); var form = new FormData(document.getElementById("form-create-pagos"));
   var div = $("#div-create-pagos");   var form2 = $("#form-create-pagos");
   var grid = "#div-grid-pagos"; var index = $("#div-index-pagos");
   var file = $("#pagos-pago_soporte"); 
   juploadform(url,btn,form,form2,div,grid,index,file);  
 }); 
 ');
?>
