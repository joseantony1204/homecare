<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Estadospagos;


/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(['id' => 'form-update-pagos']); ?>											
<?= $form->field($model, 'PAGO_ID')->hiddenInput()->label(false); ?>						
					
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
								]); 
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
								]); 
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
								]); 
							?>			
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?= $form->field($model, 'PAGO_VALOR')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>								
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
			</section>
		</div>
	</div>
</div>

<?= $form->field($model, 'AFIL_ID')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'PAGO_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'PAGO_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

<?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-pagos', 'title' => 'Actualizar' ]); ?>
<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-pagos").hide(); $("#div-index-pagos").show()', 'title' => 'Cancelar' ]); ?>
<?php ActiveForm::end(); ?>
					

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/pagos/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-pagos').hide();
            $('#div-index-pagos').hide();
		    $('#div-update-pagos').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#pagos-pago_id').val(parsed.PAGO_ID)
					
				$('#pagos-pago_fecha').val(parsed.PAGO_FECHA)
					
				$('#pagos-pago_fechainicio').val(parsed.PAGO_FECHAINICIO)
					
				$('#pagos-pago_fechafinal').val(parsed.PAGO_FECHAFINAL)
					
				$('#pagos-espa_id').val(parsed.ESPA_ID)
				
				$('#pagos-afil_id').val(parsed.AFIL_ID)
					
				$('#pagos-pago_createby').val(parsed.PAGO_CREATEBY)
					
				$('#pagos-pago_updateat').val(parsed.PAGO_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-pagos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/pagos/updateajax']).'";
   var btn = $("#btn-update-pagos");	var form = $("#form-update-pagos");
   var grid = "#div-grid-pagos";       var div = $("#div-update-pagos");
   var index = $("#div-index-pagos");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>