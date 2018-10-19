<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\AgendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<strong><h3>&nbsp;&nbsp;&nbsp;&nbsp;Busqueda de Afiliados o Beneficiarios</h3></strong>
				
<?php Pjax::begin(['id' => 'div-grid-personas']); ?>
	<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'showFooter'=>true,
	'showOnEmpty'=>true,
	'showHeader' => true,
	'emptyCell'=>'-',
	'filterModel' => $searchModel,

	'columns' => [
		['class' => 'yii\grid\SerialColumn'],						   


		[
			'attribute' => 'PERS_IDENTIFICACION',
			'value' =>'PERS_IDENTIFICACION'							
		],
		[
			'attribute' => 'PERS_PRIMERNOMBRE',
			'value' =>'PERS_PRIMERNOMBRE'							
		],
		[
			'attribute' => 'PERS_PRIMERAPELLIDO',
			'value' =>'PERS_PRIMERAPELLIDO'							
		],		
		
		'AFIL_FECHAINGRESO',
		
		[
			'attribute' => 'ESAF_ID',
			'format' => 'image',    
			'value'=>function($data) { return $data->imgestado; },
			'contentOptions' => ['class' => 'text-center'],
		],				


	    [
			'class' => 'yii\grid\ActionColumn',
			'header'=>'Acciones',
			'headerOptions' => ['width' => '200', 'style'=>'text-align: center;'],			
			'contentOptions' => ['class' => 'text-center',],
			'template' => '{view}',
			'buttons' => [
			
				'view' =>function ($url, $model) {
					return Html::button('<i class="fa fa-mail-forward"> Agendar</i>', 
								 [ 
								   'class' => 'btn btn-info', 
								   'title' => Yii::t('app', 'Editar'),	
								   'onClick'=>'setafiliado('.$model->PERS_ID.'); return false;',
								  ]);
				},				
			
			],
	    ],
		],
	]); 
	?>			
<?php Pjax::end(); ?>


<!--div class="form-group">
	<?php //echo Html::button('<i class="fa fa-search"> Buscar</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-personas-search', 'title' => 'Guardar' ]); ?>						
	<?php //echo Html::button('<i class="fa fa-ban"> Cancelar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#div-create-agenda").hide(); $("#div-index-agenda").show(); $("#div-index-afiliados").hide();', 'title' => 'Cancelar' ]); ?>					
</div--->

<script type="application/javascript">
function setafiliado(id){
	var url = "<?=Yii::$app->urlManager->createUrl(["/agendation/agenda/getafiliado?id="])?>"+id;
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		success:function(data){
			$('#form-wizard-content').show();
			var parsed = JSON.parse(data);
            if(parsed!=null){					
				$("#agenda-pers_id").val(parsed.PERS_ID);
				$('#personas-pers_identificacion').val(parsed.PERS_IDENTIFICACION);
				$('#personas-pers_primernombre').val(parsed.PERS_PRIMERNOMBRE);
				$('#personas-pers_segundonombre').val(parsed.PERS_SEGUNDONOMBRE);
				$('#personas-pers_primerapellido').val(parsed.PERS_PRIMERAPELLIDO);
				$('#personas-pers_segundoapellido').val(parsed.PERS_SEGUNDOAPELLIDO);
				$('#personas-pers_fechanacimiento').val(parsed.PERS_FECHANACIMIENTO);
				$('#personas-pers_telefonomovil').val(parsed.PERS_TELEFONOMOVIL);
				$('#personas-pers_sendsms').val(parsed.PERS_SENDSMS);			
				$('#personas-pers_direccion').val(parsed.PERS_DIRECCION);
				$('#personas-pers_email').val(parsed.PERS_EMAIL);			
				$('#personas-pers_sendmail').val(parsed.PERS_SENDMAIL);			
            }
        },
    });
}
</script>
	

