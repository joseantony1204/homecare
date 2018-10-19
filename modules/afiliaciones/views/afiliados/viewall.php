<?php
$this->registerJs("
 
 $('#btn-create-personas').on('click', function(){ 
    $('#div-create-personas').show();
    $('#div-index-personas').hide();		
    $('#div-update-personas').hide();		
 });
 
 $('#btn-refresh-grid-personas').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-personas'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-personas').click(function(){
        $('#create-modal-personas').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-personas').click(function () {
        $('#update-modal-personas').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\usuarios\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar afiliados y beneficiarios</h3></strong></div>					
						</td>				
					</tr>           
				</table>
            </td>
        </tr>
	
		<tr>
			<td>
				<div id="div-view-personas" class="div-view-personas" style="display:none" >
					<?php echo $this->render('_viewall',['Personas'=>$Personas,'model'=>$Afiliados]); ?>
				</div><!-- view-form -->
			</td>
		</tr>		
		
			
		<tr>
            <td>
				<div id="div-index-personas">
				<?php Pjax::begin(['id' => 'div-grid-personas']); ?>
					<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'showFooter'=>true,
					'showOnEmpty'=>true,
					'showHeader' => true,
					'emptyCell'=>'-',
					'filterModel' => $searchModel,

					'columns' => [
						['class' => 'yii\grid\SerialColumn'],						   


						[
							'attribute' => 'PERS_IDENTIFICACION',
							'value' =>'PERS_IDENTIFICACION'							
						],
						[
							'attribute' => 'PERS_PRIMERNOMBRE',
							'value' =>'PERS_PRIMERNOMBRE'							
						],
						[
							'attribute' => 'PERS_PRIMERAPELLIDO',
							'value' =>'PERS_PRIMERAPELLIDO'							
						],		
						
						'AFIL_FECHAINGRESO',
						
						[
							'attribute' => 'ESAF_ID',
							'format' => 'image',    
							'value'=>function($data) { return $data->imgestado; },
							'contentOptions' => ['class' => 'text-center'],
						],				


						[
							'class' => 'yii\grid\ActionColumn',
							'header'=>'Acciones',
							'headerOptions' => ['width' => '200', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{view}',
							'buttons' => [
							
								'view' =>function ($url, $model) {
									return Html::button('<i class="fa fa-eye"></i>', 
												 [ 
												   'class' => 'btn btn-info', 
												   'title' => Yii::t('app', 'Editar'),	
												   'onClick'=>'viewalldata('.$model->PERS_ID.'); return false;',
												  ]);
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
		'id'     => 'create-modal-personas',
		'size'   => 'model-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#create-modal-personas").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    
    echo "<div id='createContent'></div>";    
Modal::end();            

Modal::begin([
        'header'=>'',
        'id'=>'update-modal-personas',
        'size'=>'modal-lg',
		'footer' => Html::button('<i class="fa fa-ban"> Cerrar</i>', [ 'class' => 'btn btn-danger', 'onClick' => '$("#update-modal-personas").modal("hide")', 'title' => 'Cerrar' ]),
    ]);
    echo "<div id='updateContent'></div>";
Modal::end();

?>