<?php
$this->registerJs("
 
 $('#btn-create-generalidades').on('click', function(){ 
    $('.div-create-generalidades').toggle();
    $('#div-update-generalidades').hide();		
 });
 
 $('#btn-refresh-grid-generalidades').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-generalidades'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-generalidades').click(function(){
        $('#create-modal-generalidades').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-generalidades').click(function () {
        $('#update-modal-generalidades').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\historias\models\GeneralidadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generalidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalidades-index">
    
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar generalidades</h3></strong></div>					
						</td>				
					</tr>
					<tr>
						<td width="5%" align="center">						
						    <?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-generalidades', 'value' => Url::to(['generalidades/create']), ]); ?>							
							<?php /*echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-generalidades', 'title' => 'Agregar generalidades' ]);*/ ?>   			 
						</td>
						
						<td width="5%" align="center">
						   <?php echo Html::button('<i class="fa fa-repeat"></i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-generalidades', 'title' => 'Actualizar grid' ]); ?>							  			 
						</td>
						<td width="5%" align="center">							
							<div class="input-group-btn">
								<button data-toggle="dropdown" type="button" class="btn btn-danger dropdown-toggle"><i class="fa fa-share"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li class="dropdown-header">Exportar datos</li>
									<li><a href="#"><i class="text-success fa fa-file-excel-o"></i>Excel</a></li>
									<li><a href="#"><i class="text-danger fa fa-file-pdf-o"></i>PDF</a></li>
									<li><a href="#"><i class="text-muted fa fa-file-text-o"></i>Text</a></li>                                  
									<li><a href="#"><i class="text-primary fa fa-file-code-o"></i>CSV</a></li>                                  
								</ul>
							</div>                                                      
						</td>
						<td width="85%" align="center">&nbsp;</td>				
					</tr>            
				</table>
            </td>
        </tr>	
		
		<tr>
            <td>
				<div id="div-update-generalidades" class="div-update-generalidades" style="display:none" >
					<?php echo $this->render('_update',['model'=>$Generalidades]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-generalidades" class="div-create-generalidades" style="display:none" >
					<?php echo $this->render('_create',['model'=>$Generalidades]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<?php Pjax::begin(['id' => 'div-grid-generalidades']); ?>			
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

		            'ATGE_ID',
            'ATGE_FECHA',
            'ATGE_MOTIVO:ntext',
            'ATGE_ENFERMEDAD:ntext',
            'CAEX_ID',
            // 'AGEN_ID',
            // 'ATGE_CREATEBY',
            // 'ATGE_UPDATEAT',
		
		
					   [
					        'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
                            'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{updateByModal}&nbsp;&nbsp;&nbsp;{delete}',
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
												   'onClick'=>'setupdate('.$model->ATGE_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/generalidades/update?id='.$key),
										'class'=>'btn-update-modal-generalidades btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-generalidades',
										'data-pjax' => '0',
									]);
								},
								
								'delete' =>function ($url, $model) {
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
            </td>			 
        </tr>
    </table>
</div>

<?php
Modal::begin([
		'header' => '',
		'id'     => 'create-modal-generalidades',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-generalidades").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-generalidades',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-generalidades").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>