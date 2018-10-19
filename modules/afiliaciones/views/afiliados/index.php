<?php
$this->registerJs("
 
 $('#btn-create-afiliados').on('click', function(){ 
    $('#div-search-afiliados').show();
    $('#div-index-afiliados').hide();		
    $('#div-create-afiliados').hide();		
    $('#div-update-afiliados').hide();		
    $('#div-view-afiliados').hide();		
 });
 
 $('#btn-refresh-grid-afiliados').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-afiliados'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-afiliados').click(function(){
        $('#create-modal-afiliados').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-afiliados').click(function () {
        $('#update-modal-afiliados').modal('show').find('#updateContent').load($(this).attr('value'));
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
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;

use app\modules\configuration\models\Tipoplan;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\afiliaciones\models\AfiliadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Afiliados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliados-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar afiliados</h3></strong></div>					
							</td>				
						</tr>
						<tr>
							<td width="5%" align="center">						
								<?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-afiliados', 'value' => Url::to(['afiliados/create']), ]); ?>								
								<?php echo Html::button('<i class="fa fa-plus"> Nueva afiliacíon </i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-afiliados', 'title' => 'Agregar afiliados' ]); ?>   			 
							</td>
							
							<td width="5%" align="center">
							   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-afiliados', 'title' => 'Actualizar grid' ]); ?>							  			 
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
					<div id="div-view-afiliados" class="div-view-afiliados" style="display:none" >
						<?php echo $this->render('_view',['Personas'=>$Personas,'model'=>$Afiliados]); ?>
					</div><!-- view-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-update-afiliados" class="div-update-afiliados" style="display:none" >
						<?php echo $this->render('_update',['Personas'=>$Personas,'model'=>$Afiliados]); ?>
					</div><!-- update-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-create-afiliados" class="div-create-afiliados" style="display:none" >
					 <?php echo $this->render('_create',['Personas'=>$Personascreate,'model'=>$Afiliados,'Cuentasbancarias'=>$Cuentasbancarias]); ?>
					</div><!-- create-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-search-afiliados" class="div-search-afiliados" style="display:none" >
						<?php echo $this->render('_search',['Personas'=>$Personas,'model'=>$Afiliados]); ?>
		
					</div><!-- search-form -->
				</td>
			</tr>
				
			<tr>
				<td>
					<div id="div-index-afiliados">
					<?php Pjax::begin(['id' => 'div-grid-afiliados']); ?>			
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
							'attribute' => 'PERS_IDENTIFICACION',							
							'format' => 'raw',							
							'value' => function ($model) {
								 return Html::a($model->persona->PERS_IDENTIFICACION, 'javascript:void(0);',
													 [													
													   'title' => Yii::t('app', 'Ver'),	
													   'onClick'=>'viewdata('.$model->AFIL_ID.');',
													  ]
											   );
							 },
						],
						
						[
							'attribute' => 'PERS_PRIMERNOMBRE',
							'value' =>'persona.PERS_PRIMERNOMBRE'							
						],
						
						[
							'attribute' => 'PERS_PRIMERAPELLIDO',
							'value' =>'persona.PERS_PRIMERAPELLIDO'							
						],						
					    
						[
							'attribute' => 'ESAF_ID',
							'format' => 'image',    
							'value'=>function($data) { return $data->imgestado; },
							'contentOptions' => ['class' => 'text-center'],
						],
						
						[
							'attribute' => 'TIPL_ID',
							'filter' => Html::activeDropDownList($searchModel, 'TIPL_ID', ArrayHelper::map(Tipoplan::find()->asArray()->all(), 'TIPL_ID', 'TIPL_NOMBRE'),['class'=>'form-control','prompt' => 'Filtrar por...']),
							'value' =>'tipoplan.TIPL_NOMBRE'							
						],						
						
						
						// 'MEPA_ID',
						// 'AFIL_CREATEBY',
						// 'AFIL_UPDATEAT',
			
			
						   [
								'class' => 'yii\grid\ActionColumn',
								'header'=>'Acciones',
								'headerOptions' => ['width' => '200', 'style'=>'text-align: center;'],			
								'contentOptions' => ['class' => 'text-center',],
								'template' => '{view}{update}{delete}',
								'buttons' => [								  
								   'download' =>function ($url, $model) {
										return Html::a('<span class="fa fa-download"></span>', $url, [
											'title' => Yii::t('app', 'Descargar Afiliación'),
											'class'=>'btn btn-danger',                                   
											]
										);
									},
									
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
													   'onClick'=>'setupdate('.$model->AFIL_ID.'); return false;',
													  ]);
									},
									
									'updateByModal' => function($url,$model,$key){
										return Html::button('<i class="fa fa-pencil"></i>',[
											'value'=>Yii::$app->urlManager->createUrl('afiliaciones/afiliados/update?id='.$key),
											'class'=>'btn-update-modal-afiliados btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-afiliados',
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