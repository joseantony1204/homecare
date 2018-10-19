<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\afiliaciones\models\BeneficiariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Descarga de reportes";
?>
<div class="reportes-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down">
									<strong>
										<h3>
											<i class="fa fa-cogs"></i> Administrar reportes de: 
											( 
											<?php echo $Personas->PERS_PRIMERNOMBRE; ?>
											<?php echo $Personas->PERS_SEGUNDONOMBRE; ?>
											<?php echo $Personas->PERS_PRIMERAPELLIDO; ?>
											<?php echo $Personas->PERS_SEGUNDOAPELLIDO; ?>
											)
										</h3>
									</strong>
								</div>					
							</td>				
						</tr>						           
					</table>
				</td>
			</tr>
			
			<tr>
				<td>
					<div class="card-body">	
						<?php $form = ActiveForm::begin([
																'id' => 'form-reports', 
																'method'=>'post',
																]); ?>
																
						<?php $model->AFIL_OPCION = 1; ?>
						<?= $form->field($model, 'AFIL_OPCION')->radioList(
																		  [
																		  '1'=>'Soporte de vinculación',
																		  //'2'=>'Pagos',
																		  ], 
																		  ['separator' => '<br><br>']
																		  )->label(false); 
						?>
						
						
						<div class="row button-group">			
							<div class="col-lg-2 col-md-4">
								<?= Html::submitButton('<i class="fa fa-download"> Descargar</i>',					 
										[
										'class' => 'btn btn-block btn-success',
										'name' => 'btn-reports-download', 
										'value' => '1', 
										'title' => 'Descargar', 
										]
										); 
								?>
							</div>
							
							<div class="col-lg-2 col-md-4">
								<?= Html::submitButton('<i class="fa fa-envelope"> Email</i>', 
										[
										'class' => 'btn btn-block btn-info',
										'name' => 'btn-reports-sendmail',  
										'value' => '2',  
										'title' => 'Enviar por Email' 
										]
										); 
								?>
							</div>
						</div>	
						
						<?php ActiveForm::end(); ?>
					</div>
				</td>
			</tr>		
		</table>
	</div>
</div>