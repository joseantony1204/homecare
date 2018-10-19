<?php
$this->registerJs("
 
 $('#btn-create-recetarios').on('click', function(){ 
    $('#div-create-recetarios').show();
    $('#div-index-recetarios').hide();		
    $('#div-update-recetarios').hide();		
 });
 
 $('#btn-refresh-grid-recetarios').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-recetarios'});
	$('#msjbox').show().slideToggle(3000);
	
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-recetarios').click(function(){
        $('#create-modal-recetarios').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-recetarios').click(function () {
        $('#update-modal-recetarios').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\historias\models\RecetariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recetarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetarios-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">					
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-recetarios', 'value' => Url::to(['recetarios/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-recetarios', 'title' => 'Agregar recetarios' ]); ?>   			 
						</td>
						<td width="95%" align="center">&nbsp;</td>				
					</tr>            
				</table>
            </td>
        </tr>	
		
		
		<tr>
            <td>
			    <div id="div-create-recetarios" class="div-create-recetarios" style="display:none" >
					<?php echo $this->render('_createrecetarios',['model'=>$Recetarios]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-recetarios">
				<?php Pjax::begin(['id' => 'div-grid-recetarios']); ?>			
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
							'attribute' => 'MEDI_ID',
							'filter' =>false,							
							'value' =>'medicamentos.MEDI_DESCRIPCIONATC'							
						],
						'ATRE_CANTIDAD',
						'ATRE_FECHAINICIO',
						'ATRE_TOMACADA',
						'ATRE_TOMACADADESCRIPCION',
						//'ATRE_DURACION',
						// 'ATRE_DURACIONDESCRIPCION',
						// 'ATRE_DETALLES',
						// 'ATRE_VIASUMINISTRO',
						// 'ATRE_FORMULA:ntext',
						// 'AGEN_ID',
						// 'ATRE_CREATEBY',
						// 'ATRE_UPDATEAT',
		
		
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
												   'onClick'=>'setupdate('.$model->ATRE_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/recetarios/update?id='.$key),
										'class'=>'btn-update-modal-recetarios btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-recetarios',
										'data-pjax' => '0',
									]);
								},								
								
								
								'delete' =>function ($url, $model) {
									$url = Url::to(['/historias/recetarios/delete', 'id' => $model->ATRE_ID]);
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