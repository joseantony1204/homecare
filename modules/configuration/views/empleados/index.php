<?php
$this->registerJs("
 
 $('#btn-create-empleados').on('click', function(){ 
    $('#div-search-empleados').show();
	$('#div-create-empleados').hide();
    $('#div-index-empleados').hide();		
    $('#div-update-empleados').hide();		
 });
 
 $('#btn-refresh-grid-empleados').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-empleados'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-empleados').click(function(){
        $('#create-modal-empleados').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-empleados').click(function () {
        $('#update-modal-empleados').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\configuration\models\EmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar Empleados</h3></strong></div>					
						</td>				
					</tr>
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-empleados', 'value' => Url::to(['empleados/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"> Nuevo Empleado</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-empleados', 'title' => 'Agregar empleados' ]); ?>   			 
						</td>
						
						<td width="5%" align="center">
						   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-empleados', 'title' => 'Actualizar grid' ]); ?>							  			 
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
				<div id="div-update-empleados" class="div-update-empleados" style="display:none" >
					<?php echo $this->render('_update',['Personas'=>$Personas,'model'=>$Empleados]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-empleados" class="div-create-empleados" style="display:none" >
					<?php echo $this->render('_create',['Personas'=>$Personascreate,'model'=>$Empleados]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
		
		<tr>
			<td>
				<div id="div-search-empleados" class="div-search-empleados" style="display:none" >
					<?php echo $this->render('_search',['Personas'=>$Personas,'model'=>$Empleados]); ?>
	
				</div><!-- search-form -->
			</td>
		</tr>
			
		<tr>
            <td>
				<div id="div-index-empleados">
				<?php Pjax::begin(['id' => 'div-grid-empleados']); ?>			
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
							'attribute'=>'persona.PERS_PATHIMG',
							'format'=>'raw',
							'value' => function ($data){
								$url = \Yii::getAlias('@web/uploads/personas/').$data->persona->PERS_PATHIMG;
								return Html::img($url, ['alt'=>'Foto','width'=>'70','height'=>'70']);
							}
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
						
						[
							'attribute' => 'CARG_ID',
							'value' =>'cargos.CARG_NOMBRE'							
						],
						
						[
							'attribute' => 'ESTA_ID',
							'value' =>'estadosempleados.ESTA_NOMBRE'							
						],
						
						'EMPL_FECHAINGRESO',					
						
						// 'EMPL_CREATEBY',
						// 'EMPL_UPDATEAT',
		
		
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
												   'onClick'=>'setupdate('.$model->EMPL_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('configuration/empleados/update?id='.$key),
										'class'=>'btn-update-modal-empleados btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-empleados',
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
		'id'     => 'create-modal-empleados',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-empleados").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-empleados',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-empleados").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>