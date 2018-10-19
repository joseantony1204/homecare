<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Testfindrisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	
	<?php $form = ActiveForm::begin(['id' => 'form-update-testfindrisk']); ?>
	<?= $form->field($model, 'ATTF_ID')->hiddenInput()->label(false); ?>
		
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_EDAD')->dropDownList(
																	   [ 
																		'0' => 'Menos de 45 años (0 p.)', 
																		'2' => '45-54 años (2 p.)',
																		'3' => '55-64 años (3 p.)',
																		'4' => 'Mas de 64 años (4 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>	
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_EDADPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
	</div>

	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_PESO')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_TALLA')->textInput(['maxlength' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_IMC')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_IMCTOTAL')->dropDownList(
																	   [ 
																		'0' => 'Menor de 25 kg/m² años (0 p.)', 
																		'1' => 'Entre 25-30 kg/m² años (1 p.)',
																		'3' => 'Mayor de 30 kg/m² años (3 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_IMCPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>		
	</div>
	
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_PC')->dropDownList(
																	   [ 
																		'0' => 'Menos de 94 cm (0 p.)', 
																		'3' => 'Entre 94-102 cm (3 p.)',
																		'4' => 'Mas de 102 cm (4 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_PCPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>		
	</div>
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_PCMUJERES')->dropDownList(
																	   [ 
																		'0' => 'Menos de 80 cm (0 p.)', 
																		'3' => 'Entre 80-88 cm (3 p.)',
																		'4' => 'Mas de 88 cm (4 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_PCPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>		
	</div>
	

	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_ACTIVIDADFISICA')->dropDownList(
																	   [ 
																		'0'=>'Si (0 p.)',
																		'2'=>'No (2 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_ACTIVIDADFISICAPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>		
	</div>
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_CONSUMEVERDURAS')->dropDownList(
																	   [ 
																		'0'=>'Todos los dias (0 p.)',
																		'1'=>'No todos los dias (1 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_CONSUMEVERDURASPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>		
	</div>
	
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_TOMAMEDICAMENTOS')->dropDownList(
																	   [ 
																		'0'=>'No (0 p.)',
																		'2'=>'Si (2 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_TOMAMEDICAMENTOSPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
	</div>
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_GLUCOSA')->dropDownList(
																	   [ 
																		'0'=>'No (0 p.)',
																		'5'=>'Si (5 p.)',
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>	
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_GLUCOSAPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>
	
	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATTF_DIABETESPARIENTES')->dropDownList(
																	   [ 
																		'0'=>'No (0 p.)',
																		'3'=>'Si: abuelos, tia, tio, primo hermano (3 p.)',			
																		'5'=>'Si: padres, hermanos o hijos (5 p.)',	
																	   ], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>				
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_DIABETESPARIENTESPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?= $form->field($model, 'ATTF_TOTALPNTS')->textInput(['maxlength' => true, 'readonly' => true, 'class' =>'form-control required']); ?>
			</div>
		</div>	
	</div>
	
	<div class="card">
		<div class="card-body">
			<strong>Más de 14 puntos es riesgo de diabetes.</strong>
			<strong>El test FINDRISK no puede reemplazar un diagnóstico facultativo. Por este motivo, debería consultar con su médico el resultado obtenido.</strong>
        </div>
    </div>
            
				
	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATTF_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATTF_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

	<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
								[ 
									'class' => 'btn btn-success waves-effect waves-light', 
									'id' => 'btn-update-testfindrisk', 
									'title' => 'Actualizar',
								]
						   ); 
	?>																
	<?php ActiveForm::end(); ?>
</div>


<?php
$this->registerJs(' 
 $("#btn-update-testfindrisk").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/testfindrisk/updateajax']).'";
   var btn = $("#btn-update-testfindrisk");	var form = $("#form-update-testfindrisk");            
   var div = $("#div-update-testfindrisk");
   var grid = "#div-grid-testfindrisk";
   var index = $("#div-index-testfindrisk");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>

<?php
$this->registerJs(' 

$("#testfindrisk-attf_edad").change(function() {
   var edad = $(this).find("option:selected").val();
   $("#testfindrisk-attf_edadpnts").val(edad);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_imctotal").change(function() {
   var imc = $(this).find("option:selected").val();
   $("#testfindrisk-attf_imcpnts").val(imc);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_pc").change(function() {
   var pc = $(this).find("option:selected").val();
   $("#testfindrisk-attf_pcpnts").val(pc);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_pcmujeres").change(function() {
   var pcm = $(this).find("option:selected").val();
   $("#testfindrisk-attf_pcpnts").val(pcm);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_actividadfisica").change(function() {
   var acf = $(this).find("option:selected").val();
   $("#testfindrisk-attf_actividadfisicapnts").val(acf);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_consumeverduras").change(function() {
   var cv = $(this).find("option:selected").val();
   $("#testfindrisk-attf_consumeverduraspnts").val(cv);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_tomamedicamentos").change(function() {
   var medic = $(this).find("option:selected").val();
   $("#testfindrisk-attf_tomamedicamentospnts").val(medic);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_glucosa").change(function() {
   var gluc = $(this).find("option:selected").val();
   $("#testfindrisk-attf_glucosapnts").val(gluc);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_diabetesparientes").change(function() {
   var diabp = $(this).find("option:selected").val();
   $("#testfindrisk-attf_diabetesparientespnts").val(diabp);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});

$("#testfindrisk-attf_diabetesparientes").change(function() {
   var diabp = $(this).find("option:selected").val();
   $("#testfindrisk-attf_diabetesparientespnts").val(diabp);
 
   var edad2 = $("#testfindrisk-attf_edadpnts").val();	 
   var imc2 = $("#testfindrisk-attf_imcpnts").val();	 
   var pc2 = $("#testfindrisk-attf_pcpnts").val();	 
   var acf2 = $("#testfindrisk-attf_actividadfisicapnts").val();	 
   var cv2 = $("#testfindrisk-attf_consumeverduraspnts").val();	 
   var medic2 = $("#testfindrisk-attf_tomamedicamentospnts").val();	 
   var gluc2 = $("#testfindrisk-attf_glucosapnts").val();	 
   var diabp2 = $("#testfindrisk-attf_diabetesparientespnts").val();	 
   
   $("#testfindrisk-attf_totalpnts").val(parseInt(edad2)+parseInt(imc2)+parseInt(pc2)+parseInt(acf2)+parseInt(cv2)+parseInt(medic2)+parseInt(gluc2)+parseInt(diabp2));
});
	
$("#testfindrisk-attf_talla").keyup(function() {
   var talla = parseInt($("#testfindrisk-attf_talla").val());      
   var peso = parseInt($("#testfindrisk-attf_peso").val());
   var medisigvtamts = (talla/100);
   
   if(medisigvtamts>0){
	 var medisigimc =  peso/(medisigvtamts*medisigvtamts);
	 $("#testfindrisk-attf_imc").val(medisigimc);
   } 
});

$("#testfindrisk-attf_peso").keyup(function() {
   var talla = parseInt($("#testfindrisk-attf_talla").val());      
   var peso = parseInt($("#testfindrisk-attf_peso").val());
   var medisigvtamts = (talla/100);
   
   if(medisigvtamts>0){
	 var medisigimc =  peso/(medisigvtamts*medisigvtamts);
	 $("#testfindrisk-attf_imc").val(medisigimc);
   }   
});	
');
?>
