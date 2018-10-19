<?php
$this->registerJs("
 
 $('#btn-create-planes').on('click', function(){ 
    $('#div-create-planes').show();
    $('#div-index-planes').hide();		
    $('#div-update-planes').hide();		
 });
 
 $('#btn-refresh-grid-planes').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-planes'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-planes').click(function(){
        $('#create-modal-planes').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-planes').click(function () {
        $('#update-modal-planes').modal('show').find('#updateContent').load($(this).attr('value'));
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

use app\modules\configuration\models\Modalidadplan;
use app\modules\configuration\models\Tipoplan;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\configuration\models\PlanesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planes-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar planes</h3></strong></div>					
							</td>				
						</tr>
						<tr>
							<td width="5%" align="center">						
								<?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-planes', 'value' => Url::to(['planes/create']), ]); ?>								
								<?php echo Html::button('<i class="fa fa-plus"> Nuevo Plan</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-planes', 'title' => 'Agregar planes' ]); ?>   			 
							</td>
							
							<td width="5%" align="center">
							   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-planes', 'title' => 'Actualizar grid' ]); ?>							  			 
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
					<div id="div-update-planes" class="div-update-planes" style="display:none" >
						<?php echo $this->render('_update',['model'=>$Planes]); ?>
					</div><!-- update-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-create-planes" class="div-create-planes" style="display:none" >
						<?php echo $this->render('_create',['model'=>$Planes]); ?>
		
					</div><!-- create-form -->
				</td>
			</tr>
				
			<tr>
				<td>
					<div id="div-index-planes">
					<?php Pjax::begin(['id' => 'div-grid-planes']); ?>			
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

			            
							'PLAN_NOMBRE',
							//'PLAN_DESCRIPCION',						
							
							[
								'attribute' => 'MOPL_ID',
								'filter' => Html::activeDropDownList($searchModel, 'MOPL_ID', ArrayHelper::map(Modalidadplan::find()->asArray()->all(), 'MOPL_ID', 'MOPL_NOMBRE'),['class'=>'form-control','prompt' => 'Filtrar por...']),
								'value' =>'modalidadplan.MOPL_NOMBRE'							
							],
							
							[
								'attribute'=>'PLAN_VALOR',
								'value' => 'PLAN_VALOR',					
								'format' => ['integer'],
								'contentOptions' => ['class' => 'text-right',],
						    ],
							
							[
								'attribute' => 'TIPL_ID',
								'filter' => Html::activeDropDownList($searchModel, 'TIPL_ID', ArrayHelper::map(Tipoplan::find()->asArray()->all(), 'TIPL_ID', 'TIPL_NOMBRE'),['class'=>'form-control','prompt' => 'Filtrar por...']),
								'value' =>'tipoplan.TIPL_NOMBRE'							
							],																				
						
							
							// 'PLAN_CREATEBY',
							// 'PLAN_UPDATEAT',
			
			
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
													   'onClick'=>'setupdate('.$model->PLAN_ID.'); return false;',
													  ]);
									},
									
									'updateByModal' => function($url,$model,$key){
										return Html::button('<i class="fa fa-pencil"></i>',[
											'value'=>Yii::$app->urlManager->createUrl('configuration/planes/update?id='.$key),
											'class'=>'btn-update-modal-planes btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-planes',
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
		'id'     => 'create-modal-planes',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-planes").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-planes',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-planes").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>