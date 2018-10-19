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

<?php $form = ActiveForm::begin(['id' => 'form-update-usuarios']); ?>
<?= $form->field($model, 'USUA_ID')->hiddenInput()->label(false); ?>						

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
							<?= $form->field($model, 'USUA_USUARIO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
						</div>
					</div>	
								
					<div class="col-md-6">
						<div class="form-group">							
							<?= $form->field($model, 'USUA_CLAVE')->passwordInput(['maxlength' => true, 'class' =>'form-control required']); ?>				
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
<?= $form->field($model, 'USUA_ULTIMOACCESO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>									
									
<?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-usuarios', 'title' => 'Actualizar' ]); ?>
<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-usuarios").hide(); $("#div-index-usuarios").show();', 'title' => 'Cancelar' ]); ?>
							

<?php ActiveForm::end(); ?>
					

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/usuarios/usuarios/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-usuarios').hide();
            $('#div-index-usuarios').hide();
		    $('#div-update-usuarios').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$("#personas-pers_identificacion").attr("readonly", "readonly");
				$("#personas-pers_primernombre").attr("readonly", "readonly");
				$("#personas-pers_primerapellido").attr("readonly", "readonly");
						
				$('#personas-pers_identificacion').val(parsed.PERS_IDENTIFICACION)
				$('#personas-pers_primernombre').val(parsed.PERS_PRIMERNOMBRE)						
				$('#personas-pers_primerapellido').val(parsed.PERS_PRIMERAPELLIDO)
				
				$('#usuarios-usua_id').val(parsed.USUA_ID)					
				$('#usuarios-usua_usuario').val(parsed.USUA_USUARIO)					
				$('#usuarios-usua_ultimoacceso').val(parsed.USUA_ULTIMOACCESO)				
				$('#usuarios-uses_id').val(parsed.USES_ID)					
				$('#usuarios-pers_id').val(parsed.PERS_ID)					
				$('#usuarios-uspe_id').val(parsed.USPE_ID)					
				$('#usuarios-usua_fechacambio').val(parsed.USUA_FECHACAMBIO)					
				$('#usuarios-usua_registradopor').val(parsed.USUA_REGISTRADOPOR)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-usuarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/usuarios/usuarios/updateajax']).'";
   var btn = $("#btn-update-usuarios");	var form = $("#form-update-usuarios");            var div = $("#div-update-usuarios");
   var grid = "#div-grid-usuarios";
   var index = $("#div-index-usuarios");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>