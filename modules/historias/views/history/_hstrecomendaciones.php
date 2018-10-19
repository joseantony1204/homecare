<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">

		<?php $form = ActiveForm::begin(['id' => 'form-update-recomendaciones']); ?>
		<?= $form->field($model, 'ATRE_ID')->hiddenInput()->label(false); ?>		
		
		<div class="row">			
			<div class="col-md-12">
				<div class="form-group">							
					<?= $form->field($model, 'ATRE_RECOMENDACIONES')->textarea(['rows' => 2, 'class' =>'form-control required']); ?>
				</div>
			</div>	
		</div>		
	

		<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
		<?= $form->field($model, 'ATRE_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
		<?= $form->field($model, 'ATRE_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
		
		<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
									[ 
										'class' => 'btn btn-success waves-effect waves-light', 
										'id' => 'btn-update-recomendaciones', 
										'title' => 'Actualizar',
									]
							   ); 
		?>						
		<?php ActiveForm::end(); ?>
					
</div>

<div class="card">
		<div class="card-body">
			<h2>¡NOS PREOCUPAMOS POR EL BIENESTAR DE TU SALUD DESDE CASA!</h2> 
		</div>
</div>



<?php
$this->registerJs(' 
 $("#btn-update-recomendaciones").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/recomendaciones/updateajax']).'";
   var btn = $("#btn-update-recomendaciones");	var form = $("#form-update-recomendaciones");
   
   jqueryupdate(url,btn,form);   
 }); 
 ');
?>