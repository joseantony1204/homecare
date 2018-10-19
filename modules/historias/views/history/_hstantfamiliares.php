<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antfamiliares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">	

		<?php $form = ActiveForm::begin(['id' => 'form-update-antfamiliares']); ?>
								
		<?= $form->field($model, 'ATAF_ID')->hiddenInput()->label(false); ?>

		<div class="row">									
			<div class="col-md-4">
				<div class="form-group">
					<?php					
						echo $form->field($model, 'ATAF_HIPERTENSION')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																		   ['class' => 'custom-select form-control required' ]
																		   );

					?>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">							
					<?php					
						echo $form->field($model, 'ATAF_DIABETES')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																		   ['class' => 'custom-select form-control required' ]
																		   );

					?>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
					<?php					
						echo $form->field($model, 'ATAF_CONVULSIVO')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																		   ['class' => 'custom-select form-control required' ]
																		   );

					?>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">							
					<?php					
						echo $form->field($model, 'ATAF_MALFORMACIONES')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																		   ['class' => 'custom-select form-control required' ]
																		   );

					?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php					
						echo $form->field($model, 'ATAF_CANCER')->dropDownList([ 'NO' => 'NO', 'SI' => 'SI'], 
																		   ['class' => 'custom-select form-control required' ]
																		   );

					?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?= $form->field($model, 'ATAF_OTROS')->textarea(['rows' => 1, 'class' =>'form-control required']); ?>
				</div>
			</div>
			
		</div>
		
		<div class="row">		
							
		</div>
				
		<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>
		<?= $form->field($model, 'ATAF_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
		<?= $form->field($model, 'ATAF_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>		

		<?php echo Html::button('<span class="btn-label"><i class="fa fa-edit"></i></span>Actualizar', 
									[ 
										'class' => 'btn btn-success waves-effect waves-light', 
										'id' => 'btn-update-antfamiliares', 
										'title' => 'Actualizar',
									]
							   ); 
		?>																
        <?php ActiveForm::end(); ?>
</div>


<?php
$this->registerJs(' 
 $("#btn-update-antfamiliares").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/antfamiliares/updateajax']).'";
   var btn = $("#btn-update-antfamiliares");	var form = $("#form-update-antfamiliares");            
   var div = $("#div-update-antfamiliares");
   var grid = "#div-grid-antfamiliares";
   var index = $("#div-index-antfamiliares");
   
   jqueryupdate(url,btn,form);
 }); 
 ');
?>