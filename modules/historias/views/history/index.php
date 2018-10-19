<?php
$this->registerJs("
 
 $('#btn-create-history').on('click', function(){ 
    $('#div-create-history').show();
    $('#div-index-history').hide();		
    $('#div-update-history').hide();		
 });
 
 $('#btn-refresh-grid-history').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-history'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-history').click(function(){
        $('#create-modal-history').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-history').click(function () {
        $('#update-modal-history').modal('show').find('#updateContent').load($(this).attr('value'));
    });
});

 "); 
?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\historias\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administración de historias</h3></strong></div>					
						</td>				
					</tr>           
				</table>
            </td>
        </tr>
		
		<tr>
			<td>
				<div id="div-update-history" class="div-update-history" style="display:none" >
					<?php echo $this->render('_update',['model'=>$History]); ?>
				</div><!-- update-form -->
			</td>
		</tr>
		
			
		<tr>
            <td>
				<div id="div-index-history">
				<?php Pjax::begin(['id' => 'div-grid-history']); ?>			
					<?= GridView::widget([
				    'dataProvider' => $dataProvider,
					'showFooter'=>true,
					'showOnEmpty'=>true,
					'showHeader' => true,
					'emptyCell'=>'-',
				    'filterModel' => $searchModel,
        
					'columns' => [
					   ['class' => 'yii\grid\SerialColumn'],
					   ['class' => 'yii\grid\CheckboxColumn'],

						[
							'attribute'=>'AGEN_FECHA',
							'value'=>'AGEN_FECHA',
							'filter' => \yii\jui\DatePicker::widget([
									'language' => 'en',
									'dateFormat' => 'yyyy-MM-dd',
									'model' => $searchModel,
									'attribute' => 'AGEN_FECHA',
									'options' => ['class' => 'form-control',]
							]),
							'format' => 'html',

						],
						
						[
							'attribute' => 'ESCI_ID',
							'value' =>'estadoscitas.ESCI_NOMBRE'							
						],
						
						[
							'attribute' => 'FINA_ID',						
							'value' => function($model) { return $model->servicios->tiposfinalidades->TIFI_NOMBRE. " -- " . $model->servicios->FINA_NOMBRE;},						
						],
						
						[
							'attribute' => 'PERS_IDENTIFICACION',
							'value' =>'persona.PERS_IDENTIFICACION'							
						],
						
						[
						'attribute' => 'PERS_PRIMERNOMBRE',
						'value' =>'persona.PERS_PRIMERNOMBRE'							
						],
						[
							'attribute' => 'PERS_PRIMERAPELLIDO',
							'value' =>'persona.PERS_PRIMERAPELLIDO'							
						],
						
						'AGEN_HORAINICIO',
						/*'AGEN_HORAFINAL',
						
						[
							'attribute' => 'EMPL_ID',
							'value' => function($model) { return $model->empleados->persona->PERS_PRIMERNOMBRE. " " . $model->empleados->persona->PERS_PRIMERAPELLIDO;},						
						],*/
		
					   [
					        'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
                            'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{update}{view}{delete}',
							'buttons' => [
							 
							   'view' =>function ($url, $model) {
										$url = Url::to(['load', 'token' => $model->AGEN_TOKEN]);
										return Html::a('<span class="fa fa-external-link"></span>', $url, [
											'title' => Yii::t('app', 'Abrir historia clinica'),
											'class'=>'btn btn-info',                                   
											]
										);
								},
								
								'update' =>function ($url, $model) {
									return Html::button('<i class="fa fa-pencil"></i>', 
												 [ 
												   'class' => 'btn btn-success', 
												   'title' => Yii::t('app', 'Editar'),	
												   'onClick'=>'setupdate('.$model->AGEN_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/history/update?id='.$key),
										'class'=>'btn-update-modal-history btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-history',
										'data-pjax' => '0',
									]);
								},
								
								'delete' =>function ($url, $model) {									
									return $model->ESCI_ID != 5 ? Html::a('<span class="fa fa-trash"></span>', $url, [
											'title' => Yii::t('app', 'Eliminar'),
											'class'=>'btn btn-warning',
											'data-confirm' =>\Yii::t('yii', 'Estas seguro de eliminar este elemento?'),
											'data-method' => 'post',
											'data-pjax' => '0',
												
									]) : '';								
								},
							
							],
					   ],
				    ],
			    ]); 
				?>
								
				<?php Pjax::end(); ?>
            </div>			 
            </td>			 
        </tr>
    </table>
	</div>
</div>

<?php
Modal::begin([
		'header' => '',
		'id'     => 'create-modal-history',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-history").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-history',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-history").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>