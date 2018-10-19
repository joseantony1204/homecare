<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de epss</h5>
	</div>

	<div class="epss-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-epss']); ?>
												
						<?= $form->field($model, 'EPSS_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'EPSS_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'EPSS_CODIGO')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'EPSS_DIRECCION')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'EPSS_TELEFONO')->textInput(['maxlength' => true]); ?>
    	
				<?= $form->field($model, 'EPSS_CREATEBY')->hiddenInput(['value' =>Yii::$app->user->getId()])->label(false); ?>
				<?= $form->field($model, 'EPSS_UPDATEAT')->hiddenInput(['value' =>date('Y-m-d H:i:s')])->label(false); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-epss', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-epss").hide(); $("#div-index-epss").show();', 'title' => 'Cancelar' ]); ?></td>
							</tr>
						</table>

						<?php ActiveForm::end(); ?>
					</td>      
				</tr>
			</table>
		</div>
   </div>
</div>

<script type="application/javascript">
function setupdate(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/configuration/epss/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-epss').hide();
            $('#div-index-epss').hide();
		    $('#div-update-epss').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#epss-epss_id').val(parsed.EPSS_ID)
					
				$('#epss-epss_nombre').val(parsed.EPSS_NOMBRE)
					
				$('#epss-epss_codigo').val(parsed.EPSS_CODIGO)
					
				$('#epss-epss_direccion').val(parsed.EPSS_DIRECCION)
					
				$('#epss-epss_telefono').val(parsed.EPSS_TELEFONO)
					
				$('#epss-epss_createby').val(parsed.EPSS_CREATEBY)
					
				$('#epss-epss_updateat').val(parsed.EPSS_UPDATEAT)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-epss").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/configuration/epss/updateajax']).'";
   var btn = $("#btn-update-epss");	var form = $("#form-update-epss");            var div = $("#div-update-epss");
   var grid = "#div-grid-epss";
   var index = $("#div-index-epss");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>