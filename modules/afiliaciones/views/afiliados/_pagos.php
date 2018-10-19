<?php
$this->registerJs("
 
 $('#btn-create-pagos').on('click', function(){ 
    $('#div-create-pagos').show();
    $('#div-index-pagos').hide();		
    $('#div-update-pagos').hide();		
 });
 
 $('#btn-refresh-grid-pagos').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-pagos'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-pagos').click(function(){
        $('#create-modal-pagos').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-pagos').click(function () {
        $('#update-modal-pagos').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\afiliaciones\models\PagosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down">
									<strong>
										<h3>
											<i class="fa fa-cogs"></i> Administrar pagos de: 
											( 
											<?php echo $Personas->PERS_PRIMERNOMBRE; ?>
											<?php echo $Personas->PERS_SEGUNDONOMBRE; ?>
											<?php echo $Personas->PERS_PRIMERAPELLIDO; ?>
											<?php echo $Personas->PERS_SEGUNDOAPELLIDO; ?>
											)
										</h3>
									</strong>
								</div>				
							</td>				
						</tr>
						<tr>
							<td width="5%" align="center">						
								<?php echo Html::button('<i class="fa fa-plus"> Nuevo Pago</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-pagos', 'title' => 'Agregar pagos' ]); ?>   			 
							</td>
							
							<td width="5%" align="center">
							   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar pestaña</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-pagos', 'title' => 'Actualizar grid' ]); ?>							  			 
							</td>
							<td width="5%" align="center">							
								<div class="input-group-btn">
									<button data-toggle="dropdown" type="button" class="btn btn-danger dropdown-toggle"><i class="fa fa-share"></i><span class="caret"></span> Descarga</button>
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
					<div id="div-update-pagos" class="div-update-pagos" style="display:none" >
						<?php //echo $this->render('_updatepagos',['model'=>$Pagos]); ?>
					</div><!-- update-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-create-pagos" class="div-create-pagos" style="display:none" >
						<?php echo $this->render('_createpagos',['model'=>$Pagos]); ?>
		
					</div><!-- create-form -->
				</td>
			</tr>
				
			<tr>
				<td>
					<div id="div-index-pagos">
					<?php Pjax::begin(['id' => 'div-grid-pagos']); ?>			
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
			            
						//'PAGO_FECHA',
						
						[
							'attribute'=>'MEPA_ID',
							'filter' =>false,
							'value' => 'mediospagos.MEPA_NOMBRE',
						],
						
						'PAGO_FECHAINICIO',
						'PAGO_FECHAFINAL',
						[
							'attribute'=>'PAGO_VALOR',
							'value' => 'PAGO_VALOR',					
							'format' => ['integer'],
							'contentOptions' => ['class' => 'text-right',],
						],
						
						[
							'attribute'=>'ESPA_ID',
							'filter' =>false,
							'value' => 'estadospagos.ESPA_NOMBRE',
						],
						
						[
							'label'=>'Soporte',
							'format' => 'raw',
							'value'=>function( $data ) {
								return !empty( $data->PAGO_SOPORTE ) ? Html::a('<span class="fa fa-folder-open"></span>', Url::toRoute(['/uploads/'.$data->PAGO_SOPORTE]), ['target' => '_blank', 'data-pjax'=>"0", 'class' => 'btn btn-info center-block']) : '';
							},
							'contentOptions' => ['class' => 'text-center',],
						],

						
				
            
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
													   'onClick'=>'setupdate('.$model->PAGO_ID.'); return false;',
													  ]);
									},
									
									'updateByModal' => function($url,$model,$key){
										return Html::button('<i class="fa fa-pencil"></i>',[
											'value'=>Yii::$app->urlManager->createUrl('afiliaciones/pagos/update?id='.$key),
											'class'=>'btn-update-modal-pagos btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-pagos',
											'data-pjax' => '0',
										]);
									},
									
									'delete' =>function ($url, $model) {
										$url = Url::to(['/afiliaciones/pagos/delete', 'id' => $model->PAGO_ID]);
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
