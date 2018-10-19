<?php
$this->registerJs("
 
 $('#btn-create-beneficiarios').on('click', function(){ 
    $('#div-create-beneficiarios').show();
    $('#div-index-beneficiarios').hide();		
    $('#div-update-beneficiarios').hide();		
 });
 
 $('#btn-refresh-grid-beneficiarios').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-beneficiarios'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-beneficiarios').click(function(){
        $('#create-modal-beneficiarios').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-beneficiarios').click(function () {
        $('#update-modal-beneficiarios').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\afiliaciones\models\BeneficiariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficiarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiarios-index">
    <div class="table-responsive">
		<table width="100%" border="0" align="center">
			<tr>
				<td>			
					<table width="100%" border="0" align="center" class="table">
						<tr>
							<td width="100%" align="left" colspan="4">
								<div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar beneficiarios</h3></strong></div>					
							</td>				
						</tr>
						<tr>
							<td width="5%" align="center">						
								<?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-beneficiarios', 'value' => Url::to(['beneficiarios/create']), ]); ?>								
								<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-beneficiarios', 'title' => 'Agregar beneficiarios' ]); ?>   			 
							</td>
							
							<td width="5%" align="center">
							   <?php echo Html::button('<i class="fa fa-repeat"></i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-beneficiarios', 'title' => 'Actualizar grid' ]); ?>							  			 
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
					<div id="div-update-beneficiarios" class="div-update-beneficiarios" style="display:none" >
						<?php echo $this->render('_update',['model'=>$Beneficiarios]); ?>
					</div><!-- update-form -->
				</td>
			</tr>
			
			<tr>
				<td>
					<div id="div-create-beneficiarios" class="div-create-beneficiarios" style="display:none" >
						<?php echo $this->render('_create',['model'=>$Beneficiarios]); ?>
		
					</div><!-- create-form -->
				</td>
			</tr>
				
			<tr>
				<td>
					<div id="div-index-beneficiarios">
					<?php Pjax::begin(['id' => 'div-grid-beneficiarios']); ?>			
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

			            'BENE_ID',
            'BENE_PRIMERNOMBRE',
            'BENE_SEGUNDONOMBRE',
            'BENE_PRIMERAPELLIDO',
            'BENE_SEGUNDOAPELLIDO',
            // 'BENE_FECHAINGRESO',
            // 'PERS_ID',
            // 'AFIL_ID',
            // 'BENE_CREATEBY',
            // 'BENE_UPDATEAT',
			
			
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
													   'onClick'=>'setupdate('.$model->BENE_ID.'); return false;',
													  ]);
									},
									
									'updateByModal' => function($url,$model,$key){
										return Html::button('<i class="fa fa-pencil"></i>',[
											'value'=>Yii::$app->urlManager->createUrl('afiliaciones/beneficiarios/update?id='.$key),
											'class'=>'btn-update-modal-beneficiarios btn btn-success',
											'data-placement'=>'bottom',
											'title'=>'Update',
											'data-toggle' => 'modal',
											'data-target' => '#btn-update-modal-beneficiarios',
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
		'id'     => 'create-modal-beneficiarios',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-beneficiarios").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-beneficiarios',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-beneficiarios").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>