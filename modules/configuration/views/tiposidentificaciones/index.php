<?php
$this->registerJs("
 
 $('#btn-create-tiposidentificaciones').on('click', function(){ 
    $('#div-create-tiposidentificaciones').show();
    $('#div-index-tiposidentificaciones').hide();		
    $('#div-update-tiposidentificaciones').hide();		
 });
 
 $('#btn-refresh-grid-tiposidentificaciones').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-tiposidentificaciones'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-tiposidentificaciones').click(function(){
        $('#create-modal-tiposidentificaciones').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-tiposidentificaciones').click(function () {
        $('#update-modal-tiposidentificaciones').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\configuration\models\TiposidentificacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiposidentificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposidentificaciones-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar Tipos de Identificaciones</h3></strong></div>					
							</td>				
						</tr>
						<tr>
							<td width="5%" align="center">						
								<?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-tiposidentificaciones', 'value' => Url::to(['tiposidentificaciones/create']), ]); ?>							
								<?php echo Html::button('<i class="fa fa-plus"> Nuevo Tipo Identificacion</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-tiposidentificaciones', 'title' => 'Agregar tiposidentificaciones' ]); ?>   			 
							</td>
							
							<td width="5%" align="center">
							   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-tiposidentificaciones', 'title' => 'Actualizar grid' ]); ?>							  			 
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
					<div id="div-update-tiposidentificaciones" class="div-update-tiposidentificaciones" style="display:none" >
						<?php echo $this->render('_update',['model'=>$Tiposidentificaciones]); ?>
					</div><!-- update-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-create-tiposidentificaciones" class="div-create-tiposidentificaciones" style="display:none" >
						<?php echo $this->render('_create',['model'=>$Tiposidentificaciones]); ?>
			
					</div><!-- create-form -->
				</td>
			</tr>
				
			<tr>
				<td>
					<div id="div-index-tiposidentificaciones">
					<?php Pjax::begin(['id' => 'div-grid-tiposidentificaciones']); ?>			
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

				
						'TIID_NOMBRE',
						'TIID_DETALLE',
			
			
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
													   'onClick'=>'setupdate('.$model->TIID_ID.'); return false;',
													  ]);
									},
									
									'updateByModal' => function($url,$model,$key){
										return Html::button('<i class="fa fa-pencil"></i>',[
											'value'=>Yii::$app->urlManager->createUrl('configuration/tiposidentificaciones/update?id='.$key),
											'class'=>'btn-update-modal-tiposidentificaciones btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-tiposidentificaciones',
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
		'id'     => 'create-modal-tiposidentificaciones',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-tiposidentificaciones").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-tiposidentificaciones',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-tiposidentificaciones").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>