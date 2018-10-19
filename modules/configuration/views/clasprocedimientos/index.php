<?php
$this->registerJs("
 
 $('#btn-create-clasprocedimientos').on('click', function(){ 
    $('#div-create-clasprocedimientos').show();
    $('#div-index-clasprocedimientos').hide();		
    $('#div-update-clasprocedimientos').hide();		
 });
 
 $('#btn-refresh-grid-clasprocedimientos').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-clasprocedimientos'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-clasprocedimientos').click(function(){
        $('#create-modal-clasprocedimientos').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-clasprocedimientos').click(function () {
        $('#update-modal-clasprocedimientos').modal('show').find('#updateContent').load($(this).attr('value'));
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
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tiposprocedimientos;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\configuration\models\ClasprocedimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clasprocedimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasprocedimientos-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar Procedimientos</h3></strong></div>					
						</td>				
					</tr>
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-clasprocedimientos', 'value' => Url::to(['clasprocedimientos/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"> Nuevo Procedimiento</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-clasprocedimientos', 'title' => 'Agregar clasprocedimientos' ]); ?>   			 
						</td>
						
						<td width="5%" align="center">
						   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-clasprocedimientos', 'title' => 'Actualizar grid' ]); ?>							  			 
						</td>
						<td width="5%" align="center">							
							<div class="input-group-btn">
								<button data-toggle="dropdown" type="button" class="btn btn-danger dropdown-toggle"><i class="fa fa-share"></i><span class="caret"></span> Descargas</button>
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
				<div id="div-update-clasprocedimientos" class="div-update-clasprocedimientos" style="display:none" >
					<?php echo $this->render('_update',['model'=>$Clasprocedimientos]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-clasprocedimientos" class="div-create-clasprocedimientos" style="display:none" >
					<?php echo $this->render('_create',['model'=>$Clasprocedimientos]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-clasprocedimientos">
				<?php Pjax::begin(['id' => 'div-grid-clasprocedimientos']); ?>			
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

						'PROC_NOMBRE:ntext',
						//'PROC_DESCRIPCION:ntext',
						'PROC_CUPS',
						'PROC_SOAT',
						'PROC_VALOR',
						[
							'attribute' => 'TIPR_ID',
							'filter' => Html::activeDropDownList($searchModel, 'TIPR_ID', ArrayHelper::map(Tiposprocedimientos::find()->asArray()->all(), 'TIPR_ID', 'TIPR_NOMBRE'),['class'=>'form-control','prompt' => 'Filtrar por...']),
							'value' =>'tiposprocedimientos.TIPR_NOMBRE'							
						],
						// 'PROC_REFERENCIA:ntext',
						// 'PROC_UNIDAD',
						// 'ARLA_ID',
						// 'NILA_ID',
						// 'PROC_CREATEBY',
						// 'PROC_UPDATEAT',
		
		
					   [
					        'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
                            'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{update}{delete}',
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
												   'onClick'=>'setupdate('.$model->PROC_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('configuration/clasprocedimientos/update?id='.$key),
										'class'=>'btn-update-modal-clasprocedimientos btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-clasprocedimientos',
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
            </div>			 
            </td>			 
        </tr>
    </table>
	</div>
</div>

<?php
Modal::begin([
		'header' => '',
		'id'     => 'create-modal-clasprocedimientos',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-clasprocedimientos").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-clasprocedimientos',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-clasprocedimientos").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>