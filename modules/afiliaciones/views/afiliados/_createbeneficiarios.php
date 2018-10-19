<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\Generos;
use app\modules\configuration\models\Estadosciviles;
use app\modules\configuration\models\Epss;
use app\modules\configuration\models\Estractos;
use app\modules\configuration\models\Zonas;
use app\modules\configuration\models\Nivelesestudios;


/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['id' => 'form-create-beneficiarios',
								 'enableClientValidation' => true, 
								]); 
?>

<?= $form->field($Personas, 'PERS_ID')->hiddenInput()->label(false); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 2. Infomación básica del beneficiarios</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">
							<?php 
							$Tiposidentificaciones=Tiposidentificaciones::find()->all();
							$listData=ArrayHelper::map($Tiposidentificaciones,'TIID_ID','TIID_DETALLE');
							echo $form->field($Personas, 'TIID_ID')->dropDownList($listData, ['class' => 'custom-select form-control required'])->label('Tipo de Identificacion*');
							?>		
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Identificacion*'); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">
							<?= $form->field($Personas, 'PERS_LUGAREXPEDICION')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>		
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 							   
							   echo $form->field($Personas,'PERS_FECHAEXPEDICION')->
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
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERNOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Nombre*'); ?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SEGUNDONOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control required'])->label('Apellido*'); ?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SEGUNDOAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php 							   
							   echo $form->field($Personas,'PERS_FECHANACIMIENTO')->
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
								])->label('Fecha Nacimiento*'); 
							?>				
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Generos=Generos::find()->all();
							$listData=ArrayHelper::map($Generos,'TIGE_ID','TIGE_DETALLE');
							echo $form->field($Personas, 'TIGE_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Estadosciviles=Estadosciviles::find()->all();
							$listData=ArrayHelper::map($Estadosciviles,'ESCI_ID','ESCI_NOMBRE');
							echo $form->field($Personas, 'ESCI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Estractos=Estractos::find()->all();
							$listData=ArrayHelper::map($Estractos,'ESTR_ID','ESTR_NOMBRE');
							echo $form->field($Personas, 'ESTR_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Nivelesestudios=Nivelesestudios::find()->all();
							$listData=ArrayHelper::map($Nivelesestudios,'NIES_ID','NIES_NOMBRE');
							echo $form->field($Personas, 'NIES_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_EMAIL')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_TELEFONOMOVIL')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_TELEFONO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
				</div>
					
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SENDMAIL')->checkBox(['uncheck' => null, 'selected' => true]); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_SENDSMS')->checkBox(['uncheck' => null, 'selected' => true]); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
											
						</div>
					</div>
					
				</div>
				
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_DIRECCION')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_BARRIO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?php 
							$Zonas=Zonas::find()->all();
							$listData=ArrayHelper::map($Zonas,'ZONA_ID','ZONA_NOMBRE');
							echo $form->field($Personas, 'ZONA_ID')->dropDownList($listData, ['class' => 'custom-select form-control']);
							?>				
						</div>
					</div>
					
				</div>
				
			</section>
		</div>
	</div>
</div>
						
<?= $form->field($Personas, 'PERS_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($Personas, 'PERS_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'BENE_FECHAINGRESO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>    

<?= $form->field($model, 'AFIL_ID')->hiddenInput()->label(false); ?>						

<?= $form->field($model, 'BENE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'BENE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

<div class="form-group">
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-beneficiarios', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-beneficiarios").hide(); $("#div-search-beneficiarios").show();', 'title' => 'Cancelar' ]); ?>					
</div>

<?php ActiveForm::end(); ?>
					

<?php
$this->registerJs(' 
 $("#btn-register-beneficiarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/afiliaciones/beneficiarios/createajax']).'";
   var btn = $("#btn-register-beneficiarios");	var form = $("#form-create-beneficiarios");
   var div = $("#div-create-beneficiarios");   var grid = "#div-grid-beneficiarios";
   var index = $("#div-index-beneficiarios");
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>