<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Perfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
				<h5>Informacion de perfiles</h5>
	</div>

	<div class="perfiles-form">
        <div class="mycontentform">
			<table border="0" width="100%">
				<tr>
					<td width="100%">

						<?php $form = ActiveForm::begin(['id' => 'form-update-perfiles']); ?>
												
						<?= $form->field($model, 'USPE_ID')->hiddenInput()->label(false); ?>						
						
					    			<?= $form->field($model, 'USPE_NOMBRE')->textInput(['maxlength' => true]); ?>

    			<?= $form->field($model, 'USPE_FECHACAMBIO')->textInput(); ?>

    			<?= $form->field($model, 'USPE_REGISTRADOPOR')->textInput(); ?>

										
						<table border="0" width="100%">
							<tr>
								<td width="20%"><?php echo Html::button('<i class="fa fa-edit"> Actualizar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-update-perfiles', 'title' => 'Actualizar' ]); ?></td>
								<td width="80%"><?php echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-update-perfiles").hide(); $("#div-index-perfiles").show();', 'title' => 'Cancelar' ]); ?></td>
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
	var url = "<?=Yii::$app->urlManager->createUrl(["/usuarios/perfiles/getdata?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
            $('#div-create-perfiles').hide();
            $('#div-index-perfiles').hide();
		    $('#div-update-perfiles').show();							
		    var parsed = JSON.parse(data);
            if(parsed!=null){
					
				$('#perfiles-uspe_id').val(parsed.USPE_ID)
					
				$('#perfiles-uspe_nombre').val(parsed.USPE_NOMBRE)
					
				$('#perfiles-uspe_fechacambio').val(parsed.USPE_FECHACAMBIO)
					
				$('#perfiles-uspe_registradopor').val(parsed.USPE_REGISTRADOPOR)
							}			
		},
    });
}
</script>

<?php
$this->registerJs(' 
 $("#btn-update-perfiles").on("click", function(){ 
   var url = "'.Yii::$app->urlManager->createUrl(['/usuarios/perfiles/updateajax']).'";
   var btn = $("#btn-update-perfiles");	var form = $("#form-update-perfiles");            var div = $("#div-update-perfiles");
   var grid = "#div-grid-perfiles";
   var index = $("#div-index-perfiles");
   
   jupdateform(url,btn,form,div,grid,index);
 }); 
 ');
?>