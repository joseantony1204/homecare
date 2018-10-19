<?php
$this->registerJs("
 
 $('#btn-create-signosvitales').on('click', function(){ 
    $('#div-create-signosvitales').show();
    $('#div-index-signosvitales').hide();		
    $('#div-update-signosvitales').hide();		
 });
 
 $('#btn-refresh-grid-signosvitales').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-signosvitales'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-signosvitales').click(function(){
        $('#create-modal-signosvitales').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-signosvitales').click(function () {
        $('#update-modal-signosvitales').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\historias\models\SignosvitalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Signosvitales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signosvitales-index">
    
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar signosvitales</h3></strong></div>					
						</td>				
					</tr>
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-signosvitales', 'value' => Url::to(['signosvitales/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-signosvitales', 'title' => 'Agregar signosvitales' ]); ?>   			 
						</td>
						
						<td width="5%" align="center">
						   <?php echo Html::button('<i class="fa fa-repeat"></i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-signosvitales', 'title' => 'Actualizar grid' ]); ?>							  			 
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
				<div id="div-update-signosvitales" class="div-update-signosvitales" style="display:none" >
					<?php echo $this->render('_update',['model'=>$Signosvitales]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-signosvitales" class="div-create-signosvitales" style="display:none" >
					<?php echo $this->render('_create',['model'=>$Signosvitales]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-signosvitales">
				<?php Pjax::begin(['id' => 'div-grid-signosvitales']); ?>			
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

		            'ATSV_ID',
            'ATSV_PRESIONHH',
            'ATSV_PRESIONMM',
            'ATSV_PESO',
            'ATSV_TALLA',
            // 'ATSV_IMC',
            // 'ATSV_FRECUENCIAC',
            // 'ATSV_FRECUENCIAR',
            // 'ATSV_PERIMETROA',
            // 'ATSV_PERIMETROC',
            // 'ATSV_PERIMETROB',
            // 'ATSV_TEMPERATURA',
            // 'AGEN_ID',
            // 'ATSV_CREATEBY',
            // 'ATSV_UPDATEAT',
		
		
					   [
					        'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
                            'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{update}&nbsp;&nbsp;&nbsp;{delete}',
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
												   'onClick'=>'setupdate('.$model->ATSV_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('historias/signosvitales/update?id='.$key),
										'class'=>'btn-update-modal-signosvitales btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-signosvitales',
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

<?php
Modal::begin([
		'header' => '',
		'id'     => 'create-modal-signosvitales',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-signosvitales").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-signosvitales',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-signosvitales").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>