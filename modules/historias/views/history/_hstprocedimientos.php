<?php
$this->registerJs("
 
 $('#btn-create-procedimientos').on('click', function(){ 
    $('#div-create-procedimientos').show();
    $('#div-index-procedimientos').hide();		
    $('#div-update-procedimientos').hide();		
 });
 
 $('#btn-refresh-grid-procedimientos').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-procedimientos'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-procedimientos').click(function(){
        $('#create-modal-procedimientos').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-procedimientos').click(function () {
        $('#update-modal-procedimientos').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\historias\models\ProcedimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procedimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedimientos-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-procedimientos', 'value' => Url::to(['procedimientos/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-procedimientos', 'title' => 'Agregar procedimientos' ]); ?>   			 
						</td>
						<td width="95%" align="center">&nbsp;</td>				
					</tr>            
				</table>
            </td>
        </tr>	
		
		
		<tr>
            <td>
			    <div id="div-create-procedimientos" class="div-create-procedimientos" style="display:none" >
					<?php echo $this->render('_createprocedimientos',['model'=>$Procedimientos]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-procedimientos">
				<?php Pjax::begin(['id' => 'div-grid-procedimientos']); ?>			
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
							'attribute' => 'PROC_ID',
							'filter' =>false,							
							'value' =>'clasprocedimientos.PROC_NOMBRE'							
						],
						
						'ATPR_OBSERVACIONES:ntext',
						'ATPR_FECHASOLICITUD',
						'ATPR_ESTADO',
						//'ATPR_RESULTADOS:ntext',
						//'ATPR_FECHAPROCESO',
						// 'AGEN_ID',
						// 'ATPR_FECHACAMBIO',
						// 'ATPR_REGISTRADOPOR',
		
		
					   [
					        'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
                            'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{delete}',
							'buttons' => [
							 
							   'view' =>function ($url, $model) {
									return Html::a('<span class="fa fa-eye"></span>', $url, [
										'title' => Yii::t('app', 'Ver'),
										'class'=>'btn btn-info',                                   
										]
									);
								},
								
								'update' =>function ($url, $model) {
									return Html::button('<i class="fa fa-pencil"></i>', 
												 [ 
												   'class' => 'btn btn-success', 
												   'title' => Yii::t('app', 'Editar'),	
												   'onClick'=>'setupdate('.$model->ATPR_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/procedimientos/update?id='.$key),
										'class'=>'btn-update-modal-procedimientos btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-procedimientos',
										'data-pjax' => '0',
									]);
								},
								
								'delete' =>function ($url, $model) {
									$url = Url::to(['/historias/procedimientos/delete', 'id' => $model->ATPR_ID]);
									return Html::a('<span class="fa fa-trash"></span>', $url, [
										'title' => Yii::t('app', 'Eliminar'),
										'class'=>'btn btn-warning',
										'data-confirm' =>\Yii::t('yii', 'Estas seguro de eliminar este elemento?'),
										'data-method' => 'post',
										'data-pjax' => '0',
										]
									);
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
		'id'     => 'create-modal-procedimientos',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-procedimientos").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-procedimientos',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-procedimientos").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>