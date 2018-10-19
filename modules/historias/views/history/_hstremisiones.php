<?php
$this->registerJs("
 
 $('#btn-create-remisiones').on('click', function(){ 
    $('#div-create-remisiones').show();
    $('#div-index-remisiones').hide();		
    $('#div-update-remisiones').hide();		
 });
 
 $('#btn-refresh-grid-remisiones').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-remisiones'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-remisiones').click(function(){
        $('#create-modal-remisiones').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-remisiones').click(function () {
        $('#update-modal-remisiones').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\historias\models\RemisionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Remisiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remisiones-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-remisiones', 'value' => Url::to(['remisiones/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-remisiones', 'title' => 'Agregar remisiones' ]); ?>   			 
						</td>
						<td width="95%" align="center">&nbsp;</td>				
					</tr>            
				</table>
            </td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-remisiones" class="div-create-remisiones" style="display:none" >
					<?php echo $this->render('_createremisiones',['model'=>$Remisiones]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-remisiones">
				<?php Pjax::begin(['id' => 'div-grid-remisiones']); ?>			
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

						'ATRM_REMITIDOA:ntext',
						'ATRM_OBSERVACIONES:ntext',						
						// 'ATRM_UPDATEAT',
		
		
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
												   'onClick'=>'setupdate('.$model->ATRM_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/remisiones/update?id='.$key),
										'class'=>'btn-update-modal-remisiones btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-remisiones',
										'data-pjax' => '0',
									]);
								},
								
								'delete' =>function ($url, $model) {
									$url = Url::to(['/historias/remisiones/delete', 'id' => $model->ATRM_ID]);
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
		'id'     => 'create-modal-remisiones',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-remisiones").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-remisiones',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-remisiones").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>