<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\Estadosafiliados;
use app\modules\configuration\models\Planes;
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
				
			</section>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> 3. Plan al cual se afilió</div>
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


				
<?php echo Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-view-search").hide();', 'title' => 'Cerrar' ]); ?>
						
