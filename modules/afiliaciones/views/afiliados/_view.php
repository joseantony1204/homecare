<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\Generos;
use app\modules\configuration\models\Estadosciviles;
use app\modules\configuration\models\Estadosafiliados;
use app\modules\configuration\models\Planes;
use app\modules\configuration\models\Epss;
use app\modules\configuration\models\Estractos;
use app\modules\configuration\models\Zonas;
use app\modules\configuration\models\Nivelesestudios;
use app\modules\configuration\models\Tipoplan;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Afiliados */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 1. Estado inicial del afiliado</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<strong>Estado</strong>
							<div id="ESAF_ID"></div>
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
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 2. Infomación básica del cliente</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">
							<strong>Tipo Identificacion</strong>
							<div id="TIID_ID"></div>		
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<strong>Identificacion</strong>
							<div id="PERS_IDENTIFICACION"></div>
						</div>
					</div>	
				</div>
				
				<div class="row">									
					<div class="col-md-6">
						<div class="form-group">
						    <strong>Lugar Expedición</strong>
							<div id="PERS_LUGAREXPEDICION"></div>								
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>F. Expedición</strong>
							<div id="PERS_FECHAEXPEDICION"></div>			
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<strong>Nombre</strong>
							<div id="PERS_PRIMERNOMBRE"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<strong>S. Nombre</strong>
							<div id="PERS_SEGUNDONOMBRE"></div>
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Apellido</strong>
							<div id="PERS_PRIMERAPELLIDO"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>S. Apellido</strong>
							<div id="PERS_SEGUNDOAPELLIDO"></div>
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<strong>F. Nacimiento</strong>
							<div id="PERS_FECHANACIMIENTO"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Sexo</strong>
							<div id="TIGE_ID"></div>
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Estado Civil</strong>
							<div id="ESCI_ID"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Estrato</strong>
							<div id="ESTR_ID"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Nivel de Estudio</strong>
							<div id="NIES_ID"></div>
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Email</strong>
							<div id="PERS_EMAIL"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Celular</strong>
							<div id="PERS_TELEFONOMOVIL"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Telefono</strong>
							<div id="PERS_TELEFONO"></div>
						</div>
					</div>
				</div>			
				
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Direccion</strong>
							<div id="PERS_DIRECCION"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Barrio</strong>
							<div id="PERS_BARRIO"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">							
							<strong>Zona</strong>
							<div id="ZONA_ID"></div>
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
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 3. Servicio de salud actual</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">				
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Eps</strong>
							<div id="EPSS_ID"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Cual Otra Eps?</strong>
							<div id="PERS_CUALOTRAEPS"></div>
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
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 4. Persona de contacto</div>
		</div>			
		<div class="card card-body">	
			<section>
			
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Persona contacto</strong>
							<div id="AFIL_PERSONACONTACTO"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Parentesco</strong>
							<div id="AFIL_PARENTESCOPERSONACONTACTO"></div>
						</div>
					</div>
					
				</div>
				
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Celular</strong>
							<div id="AFIL_MOVILPERSONACONTACTO"></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">							
							<strong>Telefono Fijo</strong>
							<div id="AFIL_FIJOPERSONACONTACTO"></div>
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
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 5. Plan al cual se afilió</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">					
							<strong>Tipo Afiliado</strong>
							<div id="TIPL_ID"></div>
						</div>
					</div>					
					
					<div class="col-md-6">
						<div class="form-group">
							<strong>Plan</strong>
							<div id="PLAN_ID"></div>
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
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 6. Asesor comercial</div>
		</div>			
		<div class="card card-body">	
			<section>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<strong>Asesor comercial</strong>
							<div id="AFIL_ASESOR"></div>
						</div>
					</div>
					
				</div>			
			</section>
		</div>
	</div>
</div>

				
<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-view-afiliados").hide(); $("#div-index-afiliados").show()', 'title' => 'Cancelar' ]); ?>
						
					

<script type="application/javascript">
function viewdata(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/afiliados/getdataview?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-search-afiliados').hide();
            $('#div-create-afiliados').hide();
            $('#div-index-afiliados').hide();
		    $('#div-update-afiliados').hide();							
		    $('#div-view-afiliados').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){				
								
								$('#PERS_IDENTIFICACION').empty();
								$('#PERS_IDENTIFICACION').append(parsed.PERS_IDENTIFICACION)
								$("#PERS_LUGAREXPEDICION").empty();
								$("#PERS_LUGAREXPEDICION").append(parsed.PERS_LUGAREXPEDICION)
								$("#PERS_FECHAEXPEDICION").empty();
								$("#PERS_FECHAEXPEDICION").append(parsed.PERS_FECHAEXPEDICION)
								$('#PERS_PRIMERNOMBRE').empty();					
								$('#PERS_PRIMERNOMBRE').append(parsed.PERS_PRIMERNOMBRE)					
								$('#PERS_SEGUNDONOMBRE').empty();					
								$('#PERS_SEGUNDONOMBRE').append(parsed.PERS_SEGUNDONOMBRE)					
								$('#PERS_PRIMERAPELLIDO').empty();					
								$('#PERS_PRIMERAPELLIDO').append(parsed.PERS_PRIMERAPELLIDO)					
								$('#PERS_SEGUNDOAPELLIDO').empty();
								$('#PERS_SEGUNDOAPELLIDO').append(parsed.PERS_SEGUNDOAPELLIDO)
								$('#PERS_FECHANACIMIENTO').empty();
								$('#PERS_FECHANACIMIENTO').append(parsed.PERS_FECHANACIMIENTO)
								$('#PERS_DIRECCION').empty();
								$('#PERS_DIRECCION').append(parsed.PERS_DIRECCION)
								$("#PERS_BARRIO").empty();
								$("#PERS_BARRIO").append(parsed.PERS_BARRIO)
								$("#ZONA_ID").empty();
								$("#ZONA_ID").append(parsed.ZONA_ID)
								$('#PERS_TELEFONO').empty();
								$('#PERS_TELEFONO').append(parsed.PERS_TELEFONO)
								$("#PERS_TELEFONOMOVIL").empty();
								$("#PERS_TELEFONOMOVIL").append(parsed.PERS_TELEFONOMOVIL)
								$('#PERS_EMAIL').empty();
								$('#PERS_EMAIL').append(parsed.PERS_EMAIL)
								$("#PERS_CUALOTRAEPS").empty();
								$("#PERS_CUALOTRAEPS").append(parsed.PERS_CUALOTRAEPS)
								$("#EPSS_ID").empty();
								$("#EPSS_ID").append(parsed.EPSS_ID)
								$("#ESTR_ID").empty();
								$("#ESTR_ID").append(parsed.ESTR_ID)
								$("#NIES_ID").empty();
								$("#NIES_ID").append(parsed.NIES_ID)
								$('#ESCI_ID').empty();
								$('#ESCI_ID').append(parsed.ESCI_ID)
								$('#TIID_ID').empty();
								$('#TIID_ID').append(parsed.TIID_ID)
								$('#TIGE_ID').empty();
								$('#TIGE_ID').append(parsed.TIGE_ID)
								
																				
								$('#AFIL_FECHAINGRESO').empty();				
								$('#AFIL_FECHAINGRESO').append(parsed.AFIL_FECHAINGRESO)				
								$('#TIPL_ID').empty();				
								$('#TIPL_ID').append(parsed.TIPL_ID)					
								$('#PLAN_ID').empty();					
								$('#PLAN_ID').append(parsed.PLAN_ID)					
								$('#ESAF_ID').empty();				
								$('#ESAF_ID').append(parsed.ESAF_ID)					
								$('#AFIL_PERSONACONTACTO').empty();					
								$('#AFIL_PERSONACONTACTO').append(parsed.AFIL_PERSONACONTACTO)					
								$('#AFIL_PARENTESCOPERSONACONTACTO').empty();					
								$('#AFIL_PARENTESCOPERSONACONTACTO').append(parsed.AFIL_PARENTESCOPERSONACONTACTO)					
								$('#AFIL_MOVILPERSONACONTACTO').empty();				
								$('#AFIL_MOVILPERSONACONTACTO').append(parsed.AFIL_MOVILPERSONACONTACTO)					
								$('#AFIL_FIJOPERSONACONTACTO').empty();					
								$('#AFIL_FIJOPERSONACONTACTO').append(parsed.AFIL_FIJOPERSONACONTACTO)					
								$('#AFIL_ASESOR').empty();	
								$('#AFIL_ASESOR').append(parsed.AFIL_ASESOR)	
							}			
		},
    });
}
</script>
