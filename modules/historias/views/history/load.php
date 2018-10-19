<?php

use yii\helpers\Html;
use yii\widgets\DetailView; 

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */

$this->title = "Consulta Por: ".ucwords(strtolower($History->servicios->tiposfinalidades->TIFI_NOMBRE)).' De '.ucwords(strtolower($History->servicios->FINA_NOMBRE));

$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$datebirth = new DateTime ($History->persona->PERS_FECHANACIMIENTO);
$time = $History->persona->getTime($datebirth->format('d/m/Y'), date("d/m/Y"));
$edad = "$time[0] años con $time[1] meses y $time[2] días";
?>


	<div class="card">
		<div class="card-body">
			<h2><?= Html::encode($this->title) ?></h2> 
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="card-subtitle">Identificación: <code><?=$History->persona->PERS_IDENTIFICACION; ?></code></h4>
				</div>
				
				<div class="col-sm-6">
					<h4 class="card-subtitle">Paciante: <code><?=$History->persona->PERS_PRIMERNOMBRE; ?></code> <code><?=$History->persona->PERS_SEGUNDONOMBRE;?></code> <code><?=$History->persona->PERS_PRIMERAPELLIDO;?></code> <code><?=$History->persona->PERS_SEGUNDOAPELLIDO;?></code></h4>
				</div>
            </div>
        </div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="card-subtitle">Fecha Nacimiento: <code><?=$History->persona->PERS_FECHANACIMIENTO; ?></code></h4>
				</div>
				
				<div class="col-sm-6">
					<h4 class="card-subtitle">Edad: <code><?=$edad; ?></code></h4>
				</div>
            </div>
        </div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="card-subtitle">Sexo: <code><?=$History->persona->genero->TIGE_NOMBRE; ?></code></h4>
				</div>
				
				<div class="col-sm-6">
					<h4 class="card-subtitle">Estado: <code><?=$History->persona->afiliado->estadoafiliado->ESAF_NOMBRE; ?></code></h4>
				</div>
            </div>
        </div>
    </div>
	
	
	<?php if (Yii::$app->session->hasFlash('danger')): ?>
    <div class="alert alert-danger alert-dismissable">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		<?= Yii::$app->session->getFlash('danger') ?>
    </div>
	<?php endif; ?>
	
	<?php
	if((($History->servicios->FINA_ID ==1) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR (($History->servicios->FINA_ID ==6) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)) OR (($History->servicios->FINA_ID ==11) && ($History->servicios->tiposfinalidades->TIFI_ID ==1))) { //INICIO PRIMERA VEZ MEDICINA GENERAL
	?>	
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Familiares</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantfamiliares',['model'=>$Antfamiliares]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Personales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantpersonales',['model'=>$Antpersonales]); ?>			
					</section>
				</div>
			</div>
		</div>
		<?php if($History->persona->genero->TIGE_ID==2) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Ginecológicos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantginecologicos',['model'=>$Antginecologicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Hábitos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hsthabitos',['model'=>$Habitos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Revisión Sistemas</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrevsistemas',['model'=>$Revsistemas]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Signos Vitales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstsignosvitales',['model'=>$Signosvitales]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Examen Físico</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstexafisicos',['model'=>$Exafisicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Plan</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstplan',['model'=>$Plan]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recetarios</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecetarios',[
																		 'searchModel'=>$searchModelRecetarios,
																		 'dataProvider'=>$dataProviderRecetarios,
																		 'Recetarios'=>$Recetarios,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
				
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Remisiones</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstremisiones',[
																		 'searchModel'=>$searchModelRemisiones,
																		 'dataProvider'=>$dataProviderRemisiones,
																		 'Remisiones'=>$Remisiones,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Ordenes de procedimientos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstprocedimientos',[
																		 'searchModel'=>$searchModelProcedimientos,
																		 'dataProvider'=>$dataProviderProcedimientos,
																		 'Procedimientos'=>$Procedimientos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
	<?php
	} else if((($History->servicios->FINA_ID ==3) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)) OR (($History->servicios->FINA_ID ==7) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)) OR (($History->servicios->FINA_ID ==12) && ($History->servicios->tiposfinalidades->TIFI_ID ==2))){ //INICIO CONTROL MEDICINA GENERAL
	?>
	
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Revisión Sistemas</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrevsistemas',['model'=>$Revsistemas]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Signos Vitales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstsignosvitales',['model'=>$Signosvitales]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Examen Físico</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstexafisicos',['model'=>$Exafisicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Plan</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstplan',['model'=>$Plan]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recetarios</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecetarios',[
																		 'searchModel'=>$searchModelRecetarios,
																		 'dataProvider'=>$dataProviderRecetarios,
																		 'Recetarios'=>$Recetarios,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
				
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Remisiones</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstremisiones',[
																		 'searchModel'=>$searchModelRemisiones,
																		 'dataProvider'=>$dataProviderRemisiones,
																		 'Remisiones'=>$Remisiones,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Ordenes de procedimientos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstprocedimientos',[
																		 'searchModel'=>$searchModelProcedimientos,
																		 'dataProvider'=>$dataProviderProcedimientos,
																		 'Procedimientos'=>$Procedimientos,
																		]
													); 
							 ?>			
					</section>
				</div>
			</div>
		</div>
	
	<?php
	} else if(($History->servicios->FINA_ID ==14) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)){ //INICIO PRIMERA VEZ ASISTENCIA MEDICA TELEFONICA
	?>
	
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recomendaciones</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecomendaciones',['model'=>$Recomendaciones]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		<?php
		} else if(($History->servicios->FINA_ID ==15) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)){ //INICIO COTROL ASISTENCIA MEDICA TELEFONICA
		?>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recomendaciones</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecomendaciones',['model'=>$Recomendaciones]); ?>				
					</section>
				</div>
			</div>
		</div>
	
	<?php
	} else if(($History->servicios->FINA_ID ==4) && ($History->servicios->tiposfinalidades->TIFI_ID ==1)){ //INICIO PRIMERA VEZ ATENCION RIESGO CARDIOVASCULAR	
	?>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Familiares</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantfamiliares',['model'=>$Antfamiliares]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Personales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantpersonales',['model'=>$Antpersonales]); ?>			
					</section>
				</div>
			</div>
		</div>
		<?php if($History->persona->genero->TIGE_ID==2) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Ginecológicos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstantginecologicos',['model'=>$Antginecologicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Hábitos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hsthabitos',['model'=>$Habitos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Revisión Sistemas</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrevsistemas',['model'=>$Revsistemas]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Signos Vitales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstsignosvitales',['model'=>$Signosvitales]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Examen Físico</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstexafisicos',['model'=>$Exafisicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Test Findrisk</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hsttestfindrisk',['model'=>$Testfindrisk]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Plan</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstplan',['model'=>$Plan]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recetarios</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecetarios',[
																		 'searchModel'=>$searchModelRecetarios,
																		 'dataProvider'=>$dataProviderRecetarios,
																		 'Recetarios'=>$Recetarios,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
				
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Remisiones</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstremisiones',[
																		 'searchModel'=>$searchModelRemisiones,
																		 'dataProvider'=>$dataProviderRemisiones,
																		 'Remisiones'=>$Remisiones,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Ordenes de procedimientos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstprocedimientos',[
																		 'searchModel'=>$searchModelProcedimientos,
																		 'dataProvider'=>$dataProviderProcedimientos,
																		 'Procedimientos'=>$Procedimientos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
	
	
	<?php
	} else if(($History->servicios->FINA_ID ==5) && ($History->servicios->tiposfinalidades->TIFI_ID ==2)){ //INICIO CONTROL ATENCION RIESGO CARDIOVASCULAR		
	?>
	
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Generalidades</div>
				</div>			
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Revisión Sistemas</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrevsistemas',['model'=>$Revsistemas]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Signos Vitales</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstsignosvitales',['model'=>$Signosvitales]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Examen Físico</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstexafisicos',['model'=>$Exafisicos]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Test Findrisk</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hsttestfindrisk',['model'=>$Testfindrisk]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Plan</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstplan',['model'=>$Plan]); ?>			
					</section>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Diagnósticos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstdiagnosticos',[
																		 'searchModel'=>$searchModelDiagnosticos,
																		 'dataProvider'=>$dataProviderDiagnosticos,
																		 'Diagnosticos'=>$Diagnosticos,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Recetarios</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstrecetarios',[
																		 'searchModel'=>$searchModelRecetarios,
																		 'dataProvider'=>$dataProviderRecetarios,
																		 'Recetarios'=>$Recetarios,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
				
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Remisiones</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstremisiones',[
																		 'searchModel'=>$searchModelRemisiones,
																		 'dataProvider'=>$dataProviderRemisiones,
																		 'Remisiones'=>$Remisiones,
																		]
													); 
							?>			
					</section>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-header">
					<div class="widget-title"> <span class="icon"><i class="fa fa-align-justify"></i></span> Ordenes de procedimientos</div>
				</div>
				<div class="card card-body">	
					<section>					
							<?php echo $this->render('_hstprocedimientos',[
																		 'searchModel'=>$searchModelProcedimientos,
																		 'dataProvider'=>$dataProviderProcedimientos,
																		 'Procedimientos'=>$Procedimientos,
																		]
													); 
							 ?>			
					</section>
				</div>
			</div>
		</div>
	
	
	<?php
	} 	
	?>
	
	
		<p align="center">
			<?= Html::a('<span class="btn-label"><i class="fa fa-lock"></i></span>Cerrar historia', 
						['close', 'token' => $History->AGEN_TOKEN], 
						['class' => 'btn btn-primary btn-lg waves-effect waves-light']
						); 
			?>
		</p>	

	

