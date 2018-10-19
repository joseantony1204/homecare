<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\usuarios\models\Perfiles;
use app\modules\usuarios\models\Estados;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['id' => 'form-create-usuarios']); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 1. Asignar usuario y contraseña</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">				
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
								
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERNOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<?= $form->field($Personas, 'PERS_PRIMERAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
				</div>
				
				<div class="row">				
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'USUA_USUARIO')->textInput(['required' =>true, 'maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
								
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'USUA_CLAVE')->passwordInput(['required' =>true, 'maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>
				</div>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 2. Perfil y estado del usuario</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">				
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Perfiles=Perfiles::find()->all();
							$listData=ArrayHelper::map($Perfiles,'USPE_ID','USPE_NOMBRE');
							echo $form->field($model, 'USPE_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>	
								
					<div class="col-md-6">
						<div class="form-group">							
							<?php 
							$Estados=Estados::find()->all();
							$listData=ArrayHelper::map($Estados,'USES_ID','USES_NOMBRE');
							echo $form->field($model, 'USES_ID')->dropDownList($listData, ['class' => 'custom-select form-control required']);
							?>				
						</div>
					</div>	
				</div>			
			</section>
		</div>
	</div>
</div>

<?= $form->field($model, 'USUA_REGISTRADOPOR')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'USUA_FECHACAMBIO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'USUA_FECHAALTA')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'USUA_FECHABAJA')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'USUA_ULTIMOACCESO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'USUA_NUMINTENTOS')->hiddenInput(['value' =>0])->label(false); ?>
<?= $form->field($model, 'USUA_SESSION')->hiddenInput(['value' =>'00'])->label(false); ?>
<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>

<div class="form-group">
	<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-usuarios', 'title' => 'Guardar' ]); ?>						
	<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-usuarios").hide(); $("#div-index-usuarios").show();', 'title' => 'Cancelar' ]); ?>					
</div>
<?php ActiveForm::end(); ?>
					

<?php
$this->registerJs(' 
 $("#btn-register-usuarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/usuarios/usuarios/createajax']).'";
   var btn = $("#btn-register-usuarios");	var form = $("#form-create-usuarios");
   var div = $("#div-create-usuarios");   var grid = "#div-grid-usuarios";
   var index = $("#div-index-usuarios");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>