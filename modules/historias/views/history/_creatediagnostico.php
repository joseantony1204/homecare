<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\historias\models\Clasesdiagnosticos;
use app\modules\historias\models\Tiposdiagnosticos;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	
	<?php $form = ActiveForm::begin(['id' => 'form-create-diagnosticos']); ?>
	
	<div class="row">									
		<div class="col-md-12">
			<div class="form-group">
			   <label for="history-diag_id">Diagnosticos <span class="danger">*</span></label>
				<?php 
					echo \yii\jui\AutoComplete::widget([     
					'clientOptions' => [
					'source' => \yii\helpers\Url::to(['/historias/diagnosticos/autocomplete']),					
					'minLength'=>'3', 
					'autoFill'=>true,
					'select' => new \yii\web\JsExpression("function( event, ui ) {
									$('#diagnosticos-diag_id').val(ui.item.id);
								 }")],
					'options' => [
									'class' => 'custom-search form-control required',
									'placeholder'=>'Escriba algo para comenzar la busqueda...'
								 ]			 
					]);		
					
				?>
				<?= Html::activeHiddenInput($model, 'DIAG_ID')?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
				<?php 
					$Clasesdiagnosticos=Clasesdiagnosticos::find()->all();
					$listData=ArrayHelper::map($Clasesdiagnosticos,'CLDI_ID','CLDI_NOMBRE');
					echo $form->field($model, 'CLDI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required' ]);
				?>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<?php 
					$Tiposdiagnosticos=Tiposdiagnosticos::find()->all();
					$listData=ArrayHelper::map($Tiposdiagnosticos,'TIDI_ID','TIDI_NOMBRE');
					echo $form->field($model, 'TIDI_ID')->dropDownList($listData, ['class' => 'custom-select form-control required' ]);
				?>
			</div>
		</div>	
	</div>
	
	<div class="row">									
		<div class="col-md-6">
			<div class="form-group">
				<?php					
					echo $form->field($model, 'ATDI_RIESGOVICTIMA')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">							
				<?php					
					echo $form->field($model, 'ATDI_RIESGOVICTIMAVIO')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																	   ['class' => 'custom-select form-control required' ]
																	   );

				?>
			</div>
		</div>	
	</div>


	<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>
	<?= $form->field($model, 'ATDI_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
	<?= $form->field($model, 'ATDI_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

	<div class="form-group">
		<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-diagnosticos', 'title' => 'Guardar' ]); ?>						
		<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-diagnosticos").hide(); $("#div-index-diagnosticos").show();', 'title' => 'Cancelar' ]); ?>					
	</div>

	<?php ActiveForm::end(); ?>
					
</div>

<?php
$this->registerJs(' 
 $("#btn-register-diagnosticos").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/diagnosticos/createajax']).'";
   var btn = $("#btn-register-diagnosticos");	var form = $("#form-create-diagnosticos");
   var div = $("#div-create-diagnosticos");   var grid = "#div-grid-diagnosticos";
   var index = $("#div-index-diagnosticos");
   
   jsaveform(url,btn,form,div,grid,index);   
 }); 
 ');
?>