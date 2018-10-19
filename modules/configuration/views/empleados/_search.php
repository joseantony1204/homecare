<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\AfiliadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="search-empleados" class="empleados-search">

    <?php $form = ActiveForm::begin([
		'id' => 'form-search-empleados', 
		'enableClientValidation' => true, 
														
    ]); ?>

    <?= $form->field($Personas, 'PERS_IDENTIFICACION') ?>    

    <div class="form-group">
        <?php echo Html::button('<i class="fa fa-search"> Buscar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-search-empleados', 'title' => 'Buscar' ]); ?>						
		<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-search-empleados").hide(); $("#div-index-empleados").show();', 'title' => 'Cancelar' ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(' 
 $("#btn-search-empleados").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/empleados/search']).'";
   var form = $("#form-search-empleados");
   var form_afiliados = $("#form-create-empleados");

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
					alert("AFILIADO EXISTENTE:\n--------------------------\n\nEl número de identificación ingresado pertenece a una persona que ya esta registrada como empleado en la base de datos.");							
					}else if(parsed.info == "false"){
						$("#div-search-empleados").hide();
						form_afiliados[0].reset();				
						$("#div-create-empleados").show();
						$("#personascreate-pers_identificacion").val(parsed.PERS_IDENTIFICACION);
						$("#personascreate-pers_identificacion").attr("readonly", "readonly");
					}else if(parsed.info == "person"){
						$("#div-search-empleados").hide();
						form_afiliados[0].reset();
						$("#div-create-empleados").show();				
						alert("PERSONA ENCONTRADA:\n--------------------------\n\nEl número de identificación ingresado pertenece a una persona registrada en base de datos.\nA continuación se mostrara la información, completela y de click en el boton guardar para ingresar a esa persona como empleado.\nDe lo contrario cancele esta operación.");
						$("#personascreate-pers_identificacion").attr("readonly", "readonly");
						$("#personascreate-pers_id").val(parsed.PERS_ID)
						$("#personascreate-pers_identificacion").val(parsed.PERS_IDENTIFICACION)
						$("#personascreate-pers_lugarexpedicion").val(parsed.PERS_LUGAREXPEDICION)
						$("#personascreate-pers_fechaexpedicion").val(parsed.PERS_FECHAEXPEDICION)						
						$("#personascreate-pers_primernombre").val(parsed.PERS_PRIMERNOMBRE)
						$("#personascreate-pers_segundonombre").val(parsed.PERS_SEGUNDONOMBRE)
						$("#personascreate-pers_primerapellido").val(parsed.PERS_PRIMERAPELLIDO)
						$("#personascreate-pers_segundoapellido").val(parsed.PERS_SEGUNDOAPELLIDO)
						$("#personascreate-pers_fechanacimiento").val(parsed.PERS_FECHANACIMIENTO)
						$("#personascreate-pers_direccion").val(parsed.PERS_DIRECCION)
						$("#personascreate-pers_barrio").val(parsed.PERS_BARRIO)
						$("#personascreate-zona_id").val(parsed.ZONA_ID)
						$("#personascreate-pers_telefono").val(parsed.PERS_TELEFONO)
						$("#personascreate-pers_telefonomovil").val(parsed.PERS_TELEFONOMOVIL)
						$("#personascreate-pers_sendsms").val(parsed.PERS_SENDSMS)
						$("#personascreate-pers_email").val(parsed.PERS_EMAIL)
						$("#personascreate-pers_sendmail").val(parsed.PERS_SENDMAIL)
						$("#personascreate-pers_pathimg").val(parsed.PERS_PATHIMG)
						$("#personascreate-pers_cualotraeps").val(parsed.PERS_CUALOTRAEPS)
						$("#personascreate-epss_id").val(parsed.EPSS_ID)
						$("#personascreate-estr_id").val(parsed.ESTR_ID)
						$("#personascreate-nies_id").val(parsed.NIES_ID)
						$("#personascreate-esci_id").val(parsed.ESCI_ID)
						$("#personascreate-tiid_id").val(parsed.TIID_ID)
						$("#personascreate-tige_id").val(parsed.TIGE_ID)
						$("#personascreate-pais_id").val(parsed.PAIS_ID)
						$("#personascreate-depa_id").val(parsed.DEPA_ID)
						$("#personascreate-muni_id").val(parsed.MUNI_ID)
						$("#personascreate-pers_createby").val(parsed.PERS_CREATEBY)
						$("#personascreate-pers_upfateat").val(parsed.PERS_UPDATEAT)					
						
					}
				}
		    }	
		
		}	
	});
   
   
 }); 
 ');
?>
