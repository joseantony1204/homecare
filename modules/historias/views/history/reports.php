<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */

$this->title = "Descarga de reportes";
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?php if (Yii::$app->session->hasFlash('emailSend')): ?>
	 <div class="alert alert-success">
            Documento enviado correctamente!!!
      </div>
	<?php endif; ?>
	
	<div class="card-body">
	
	<?php $form = ActiveForm::begin([
											'id' => 'form-reports', 
											'method'=>'post',
											]); ?>
											
	<?php $model->AGEN_OPCION = 1; ?>
	<?= $form->field($model, 'AGEN_OPCION')->radioList(
													  [
													  '1'=>'Historia clínica',
													  '2'=>'Recetario',
													  '3'=>'Remisiones',
													  '4'=>'Laboratorios',
													  '5'=>'Procedimientos',
													  '6'=>'Imagenes diagnósticas',
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
</div>



