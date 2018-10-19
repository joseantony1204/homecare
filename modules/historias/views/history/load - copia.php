<?php

use yii\helpers\Html;
use yii\widgets\DetailView; 

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */

$this->title = "Historia de Medicina General";
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p align="right">
        <?= Html::a('Update', ['update', 'id' => $History->AGEN_ID], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::button('<span class="btn-label"><i class="fa fa-lock"></i></span>Cerrar Historia', 
									[ 
										'class' => 'btn btn-info waves-effect waves-light', 
										'id' => 'btn-create-history', 
										'title' => 'Agregar history',
									]
							   ); 
		?>
		

		
    </p>
	
	<ul class="nav nav-tabs customtab2" role="tablist">
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#gral" role="tab"><span class="hidden-sm-up"><i class="ti-face-smile"></i></span> <span class="hidden-xs-down">Generalidades</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dgts" role="tab"><span class="hidden-sm-up"><i class="ti-heart"></i></span> <span class="hidden-xs-down">Diagnósticos</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rcts" role="tab"><span class="hidden-sm-up"><i class="ti-pencil-alt"></i></span> <span class="hidden-xs-down">Recetarios</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#exmn" role="tab"><span class="hidden-sm-up"><i class="ti-archive"></i></span> <span class="hidden-xs-down">Laboratorios</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rmsn" role="tab"><span class="hidden-sm-up"><i class="ti-new-window"></i></span> <span class="hidden-xs-down">Remisiones</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prct" role="tab"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">Procedimientos</span></a> </li>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
		
		<div class="tab-pane active" id="gral" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_general',[
															'Generalidades' => $Generalidades,
															'Antfamiliares' => $Antfamiliares,
															'Antpersonales' => $Antpersonales,
															'Antginecologicos' => $Antginecologicos,
															'Habitos' => $Habitos,
															'Revsistemas' => $Revsistemas,
															'Signosvitales' => $Signosvitales,
															'Exafisicos' => $Exafisicos,
															'Plan' => $Plan,
															'Testfindrisk' => $Testfindrisk,
														  ]); ?>
			</div>
		</div>
		
		<div class="tab-pane p-20" id="dgts" role="tabpanel">			
				<?php echo $this->render('_hstdiagnosticos',[
															'searchModel'=>$searchModelDiagnosticos,
															'dataProvider'=>$dataProviderDiagnosticos,
															'Diagnosticos'=>$Diagnosticos,
												 ]); ?>
			
		</div>
		
		<div class="tab-pane p-20" id="rcts" role="tabpanel">
				<?php echo $this->render('_hstrecetarios',[
															'searchModel'=>$searchModelRecetarios,
															'dataProvider'=>$dataProviderRecetarios,
															'Recetarios'=>$Recetarios,
												 ]); ?>
		</div>
		
		<div class="tab-pane p-20" id="exmn" role="tabpanel">
				<?php echo $this->render('_hstexamenes',[
														'searchModel'=>$searchModelExamanes,
														'dataProvider'=>$dataProviderExamanes,
														'Examanes'=>$Examanes,
												 ]); ?>
		</div>
		
		<div class="tab-pane p-20" id="rmsn" role="tabpanel">
				<?php echo $this->render('_hstremisiones',[
															'searchModel'=>$searchModelRemisiones,
															'dataProvider'=>$dataProviderRemisiones,
															'Remisiones'=>$Remisiones,
												 ]); ?>
		</div>
		
		<div class="tab-pane p-20" id="prct" role="tabpanel">
				<?php echo $this->render('_hstprocedimientos',[
															'searchModel'=>$searchModelProcedimientos,
															'dataProvider'=>$dataProviderProcedimientos,
															'Procedimientos'=>$Procedimientos,
												 ]); ?>
		</div>
		
	</div>