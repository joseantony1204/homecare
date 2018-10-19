<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\configuration\models\Estadoscitas;
/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(['id' => 'form-update-history']); ?>
												
<?= $form->field($model, 'AGEN_ID')->hiddenInput()->label(false); ?>						

<div class="row">										
	<div class="col-md-6">
		<div class="form-group">
			<?php 							   
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
					'options' => [
									'class' => 'form-control required',
									'onchange' =>'setCalendar(event);',
								]
				])->label('Fecha para la cita*'); 
			?>
		</div>
	</div>
</div>

<div class="row">	
	<div class="col-md-6">
		<div class="form-group">
			<?php 
			$Estadoscitas=Estadoscitas::find()->all();
			$listData=ArrayHelper::map($Estadoscitas,'ESCI_ID','ESCI_NOMBRE');
			echo $form->field($model, 'ESCI_ID')->dropDownList($listData,
			[
			'class' => 'custom-select form-control required',			
			])->label('Estado*');
			?>
		</div>
	</div>
	
</div>					
				
				
<?= $form->field($model, 'PERS_ID')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'FINA_ID')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'EMPL_ID')->hiddenInput()->label(false); ?>						
<?= $form->field($model, 'AGEN_HORAINICIO')->hiddenInput()->label(false); ?>						
<?= $form->field($model, 'AGEN_HORAFINAL')->hiddenInput()->label(false); ?>						
<?= $form->field($model, 'AGEN_FECHAPROCESO')->hiddenInput()->label(false); ?>						

<?= $form->field($model, 'AGEN_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
<?= $form->field($model, 'AGEN_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>
						

<?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-history', 'title' => 'Actualizar' ]); ?>
<?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-history").hide(); $("#div-index-history").show()', 'title' => 'Cancelar' ]); ?>


<?php ActiveForm::end(); ?>
					

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/historias/history/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-history').hide();
		    $('#div-update-history').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#history-agen_id').val(parsed.AGEN_ID)
					
				$('#history-agen_fechaproceso').val(parsed.AGEN_FECHAPROCESO)
					
				$('#history-agen_fecha').val(parsed.AGEN_FECHA)
					
				$('#history-agen_horainicio').val(parsed.AGEN_HORAINICIO)
					
				$('#history-agen_horafinal').val(parsed.AGEN_HORAFINAL)
					
				$('#history-fina_id').val(parsed.FINA_ID)
					
				$('#history-pers_id').val(parsed.PERS_ID)
					
				$('#history-empl_id').val(parsed.EMPL_ID)
					
				$('#history-esci_id').val(parsed.ESCI_ID)
					
				$('#history-agen_createby').val(parsed.AGEN_CREATEBY)
					
				$('#history-agen_updateat').val(parsed.AGEN_UPDATEAT)
							}			
		},
    });
}
</script>


<?php
$this->registerJs(' 
 $("#btn-update-history").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/historias/history/updateajax']).'";
   var btn = $("#btn-update-history");	var form = $("#form-update-history");
   var grid = "#div-grid-history";       var div = $("#div-update-history");
   var index = $("#div-index-history");
   
   jupdateform(url,btn,form,div,grid,index);   
 }); 
 ');
?>