<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\AfiliadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="search-usuarios" class="usuarios-search">

    <?php $form = ActiveForm::begin([
		'id' => 'form-search-usuarios', 
		'enableClientValidation' => true, 
														
    ]); ?>

    <div class="row">				
		<div class="col-md-4">
			<div class="form-group">							
				<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
			</div>
		</div>	
					
		<div class="col-md-4">
			<div class="form-group">							
				<?= $form->field($Personas, 'PERS_PRIMERNOMBRE')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
			</div>
		</div>
				
		<div class="col-md-4">
			<div class="form-group">							
				<?= $form->field($Personas, 'PERS_PRIMERAPELLIDO')->textInput(['maxlength' => true, 'class' =>'form-control']); ?>				
			</div>
		</div>	
	</div>   

    <div class="form-group">
        <?php echo Html::button('<i class="fa fa-search"> Buscar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-search-usuarios', 'title' => 'Buscar' ]); ?>						
		<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-search-usuarios").hide(); $("#div-index-usuarios").show();', 'title' => 'Cancelar' ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(' 
 $("#btn-search-usuarios").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/usuarios/usuarios/search']).'";
   var form = $("#form-search-usuarios");
   var form_afiliados = $("#form-create-usuarios");

    $.ajax(
	{
	 url: url,
		type:"POST",
		data: form.serialize(),
		success:function(data){
			if(data != "")
		    {
				var parsed = JSON.parse(data);
				if(parsed!=null){
					if(parsed.info == "true"){
					alert("USUARIO EXISTENTE:\n--------------------------\n\nLos datos ingresado pertenece a una persona que ya tiene un usuario asignado en la base de datos.");							
					}else if(parsed.info == "false"){
					alert("USUARIO EXISTENTE:\n--------------------------\n\nLos datos ingresado no pertenecen a ninguna persona en la base de datos.");
					}else if(parsed.info == "person"){
						$("#div-search-usuarios").hide();
						form_afiliados[0].reset();
						$("#div-create-usuarios").show();				
						alert("PERSONA ENCONTRADA:\n--------------------------\n\nLos datos ingresados pertenecen a una persona registrada en base de datos.\nA continuación se mostrara la información, completela y de click en el boton guardar para asignarle un usuario y una contraseña.\nDe lo contrario cancele esta operación.");
						$("#personascreate-pers_identificacion").attr("readonly", "readonly");
						$("#personascreate-pers_primernombre").attr("readonly", "readonly");
						$("#personascreate-pers_primerapellido").attr("readonly", "readonly");
						$("#personascreate-pers_id").val(parsed.PERS_ID)
						$("#personascreate-pers_identificacion").val(parsed.PERS_IDENTIFICACION)						
						$("#personascreate-pers_primernombre").val(parsed.PERS_PRIMERNOMBRE)
						$("#personascreate-pers_primerapellido").val(parsed.PERS_PRIMERAPELLIDO)				
						$("#usuarioscreate-usua_usuario").val(parsed.PERS_IDENTIFICACION)						
						$("#usuarioscreate-pers_id").val(parsed.PERS_ID)						
						
					}
				}
		    }	
		
		}	
	});
   
   
 }); 
 ');
?>
