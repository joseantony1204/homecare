<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\agendation\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda de hoy';
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
								<div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar agenda de hoy</h3></strong></div>					
							</td>				
						</tr>          
					</table>
				</td>
			</tr>	
			
				
			<tr>
				<td>
					<div id="div-index-agenda">
					<?php Pjax::begin(['id' => 'div-grid-agenda']); ?>			
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
							'AGEN_HORAFINAL',
							
							[
								'attribute' => 'EMPL_ID',
								'value' => function($model) { return $model->empleados->persona->PERS_PRIMERNOMBRE. " " . $model->empleados->persona->PERS_PRIMERAPELLIDO;},						
							],
										
						   [
								'class' => 'yii\grid\ActionColumn',
								'header'=>'Acciones',
								'headerOptions' => ['width' => '120', 'style'=>'text-align: center;'],			
								'contentOptions' => ['class' => 'text-center',],
								'template' => '{recordatorio}{view}',
								'buttons' => [
								 
								   'recordatorio' =>function ($url, $model) {
										return Html::a('<span class="fa fa-download"></span>', $url, [
											'title' => Yii::t('app', 'Descargar recordatorio'),
											'class'=>'btn btn-danger',                                   
											]
										);
									},					
									
									
									'view' =>function ($url, $model) {
										$url = Url::to(['/historias/history/load', 'token' => $model->AGEN_TOKEN]);
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
											'value'=>Yii::$app->urlManager->createUrl('afiliaciones/agenda/update?id='.$key),
											'class'=>'btn-update-modal-agenda btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-agenda',
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