<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Afiliados */

$this->title = $model->AFIL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Afiliados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliados-view">
    
	<ul class="nav nav-tabs customtab2" role="tablist">
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bnf" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Beneficiarios</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pagos" role="tab"><span class="hidden-sm-up"><i class="ti-money "></i></span> <span class="hidden-xs-down">Pagos</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cuentas" role="tab"><span class="hidden-sm-up"><i class="ti-credit-card"></i></span> <span class="hidden-xs-down">Cuentas para débito</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reportes" role="tab"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">Reportes</span></a> </li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	
		<div class="tab-pane active p-20" id="bnf" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_beneficiarios',[
													'Afiliados' => $Afiliados,
													'searchModel' => $searchModel,
													'dataProvider' => $dataProvider,
													'Personascreate' => $Personascreate,
													'Personas' => $Personas,
													'Beneficiarios' => $Beneficiarios,
												 ]); ?>
			</div>
		</div>
		
		<div class="tab-pane p-20" id="pagos" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_pagos',[
													'Afiliados'=>$Afiliados,
													'Personas'=>$Personas,
													'searchModel'=>$searchModelPagos,
													'dataProvider'=>$dataProviderPagos,
													'Pagos'=>$Pagos
												 ]); ?>
			</div>
		</div>
		
		<div class="tab-pane p-20" id="cuentas" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_cuentas',[
													'Afiliados'=>$Afiliados,
													'Personas'=>$Personas,
													'searchModel'=>$searchModelCuentasbancarias,
													'dataProvider'=>$dataProviderCuentasbancarias,
													'Cuentasbancarias'=>$Cuentasbancarias
												 ]); ?>
			</div>
		</div>
		
		<div class="tab-pane p-20" id="reportes" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_reports',[
													'model'=>$Afiliados,
													'Personas'=>$Personas,
												 ]); ?>
			</div>
		</div>
		
	</div>
	
</div>
