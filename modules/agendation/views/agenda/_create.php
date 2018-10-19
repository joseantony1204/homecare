<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de agenda</h5>
	</div>

	<div class="agenda-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">
						<?php $form = ActiveForm::begin(['id' => 'form-create-agenda']); ?>
						
                        <?= $form->field($model, 'AGEN_FECHAPROCESO')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
						
						<?php 
							   $model->AGEN_FECHA = date('Y-m-d');
							   echo $form->field($model,'AGEN_FECHA')->
								widget(DatePicker::className(),[
									'dateFormat' => 'yyyy-MM-dd',
									'clientOptions' => [
										'yearRange' => '-115:+0',
										//'showWeek' => true,
										//'firstDay' => 1,      
										'showButtonPanel' => true,  
										//'buttonImageOnly' => true,
										//'showOn' =>"button",
										//'buttonImage'=>Yii::getAlias('@web/img/date.png'),
										//'buttonText' =>"Seleccionar fecha",
									],
									'options' => ['class' => 'form-control',]
								]); 
						?>						
						
						<div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
						 <?= $form->field($model, 'AGEN_HORAINICIO')->textInput(['style'=>'width:100px', 'readonly'=>'readonly']); ?>						
						</div>
						
						<div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
						 <?= $form->field($model, 'AGEN_HORAFINAL')->textInput(['style'=>'width:100px', 'readonly'=>'readonly']); ?>						
						</div>
						
						<?php /*
						echo  $form->field($model, 'AGEN_HORAINICIO')->widget(\janisto\timepicker\TimePicker::className(), [
							'language' => 'es',
							'mode' => 'time',
							'clientOptions'=>[
								'hour' => date('H'),
								'minute' => date('i'),
								'second' => date('s'),
								'showSecond' => true,
							]
						]);
						*/ ?>
						
						<?php /*
						echo $form->field($model, 'AGEN_HORAFINAL')->widget(\janisto\timepicker\TimePicker::className(), [
							'language' => 'es',
							'mode' => 'time',
							'clientOptions'=>[
								'hour' => date('H'),
								'minute' => date('i'),
								'second' => date('s'),
								'showSecond' => true,
							]
						]);
						*/ ?>
						
						<?= $form->field($model, 'FINA_ID')->textInput(); ?>

						<?= $form->field($model, 'PERS_ID')->textInput(); ?>

						<?= $form->field($model, 'PEEM_ID')->textInput(); ?>

						<?= $form->field($model, 'ESTA_ID')->hiddenInput(['value' =>1])->label(false); ?>
						
						<?= $form->field($model, 'AGEN_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
						
						<?= $form->field($model, 'AGEN_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

					<div class="form-group">
						<?php echo Html::button('<i class="fa fa-save"> Guardar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-register-agenda', 'title' => 'Guardar' ]); ?>						
						<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-agenda").hide(); $("#div-index-agenda").show();', 'title' => 'Cancelar' ]); ?>					
					</div>

						<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<?php
$this->registerJs(' 
 $("#btn-register-agenda").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/agendation/agenda/createajax']).'";
   var btn = $("#btn-register-agenda");	var form = $("#form-create-agenda");
   var div = $("#div-create-agenda");   var grid = "#div-grid-agenda";
   var index = $("#div-index-agenda");
   jsaveformagenda(url,btn,form,div,grid,index);
     
 }); 
 ');
?>