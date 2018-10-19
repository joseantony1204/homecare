<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Tiposcuentas;
use app\modules\configuration\models\Bancos;
use app\modules\configuration\models\Periocidadpagos;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-create-cuentasbancarias']); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span>Información debito</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<?php 
							$Tiposcuentas=Tiposcuentas::find()->all();
							$listData=ArrayHelper::map($Tiposcuentas,'TICU_ID','TICU_NOMBRE');
							echo $form->field($model, 'TICU_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>			
						</div>
					</div>
						
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($model, 'FOPA_NUMEROCUENTA')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
						
					<div class="col-md-4">
						<div class="form-group">
							<?php 							   
							   echo $form->field($model,'FOPA_FECHAVENCIMIENTO')->
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
							<?php 
							$Bancos=Bancos::find()->all();
							$listData=ArrayHelper::map($Bancos,'BANC_ID','BANC_NOMBRE');
							echo $form->field($model, 'BANC_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>			
						</div>
					</div>
						
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($model, 'FOPA_NUMEROSEGURIDAD')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>			
						</div>
					</div>
						
					<div class="col-md-4">
						<div class="form-group">
							<?php					
								echo $form->field($model, 'FOPA_ACTUAL')->dropDownList([ 'SI' => 'SI', 'NO' => 'NO'], 
																				   ['class' => 'custom-select form-control' ]
																				   );

							?>				
						</div>
					</div>
				</div>			
					
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php 
							$Periocidadpagos=Periocidadpagos::find()->all();
							$listData=ArrayHelper::map($Periocidadpagos,'PEPA_ID','PEPA_NOMBRE');
							echo $form->field($model, 'PEPA_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>			
						</div>
					</div>					
				</div>	
						
			</section>
		</div>
	</div>
</div>


<?= $form->field($model, 'AFIL_ID')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'FOPA_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'FOPA_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>


<div class="form-group">
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-cuentasbancarias', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-cuentasbancarias").hide(); $("#div-index-cuentasbancarias").show();', 'title' => 'Cancelar' ]); ?>					
</div>

<?php ActiveForm::end(); ?>
					

<?php
$this->registerJs(' 
 $("#btn-register-cuentasbancarias").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/cuentasbancarias/createajax']).'";
   var btn = $("#btn-register-cuentasbancarias");	var form = $("#form-create-cuentasbancarias");
   var div = $("#div-create-cuentasbancarias");   var grid = "#div-grid-cuentasbancarias";
   var index = $("#div-index-cuentasbancarias");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>