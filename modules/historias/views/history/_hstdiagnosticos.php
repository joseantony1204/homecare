<?php
$this->registerJs("
 
 $('#btn-create-diagnosticos').on('click', function(){ 
    $('#div-create-diagnosticos').show();
    $('#div-index-diagnosticos').hide();		
    $('#div-update-diagnosticos').hide();		
 });
 
 $('#btn-refresh-grid-diagnosticos').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-diagnosticos'});
	$('#msjbox').show().slideToggle(3000);
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
/* @var $searchModel app\modules\historias\models\DiagnosticosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diagnosticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosticos-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">					
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-diagnosticos', 'value' => Url::to(['diagnosticos/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-diagnosticos', 'title' => 'Agregar diagnosticos' ]); ?>   			 
						</td>					
						<td width="95%" align="center">&nbsp;</td>				
					</tr>            
				</table>
            </td>
        </tr>	
		
		<tr>
            <td>
				<div id="div-update-diagnosticos" class="div-update-diagnosticos" style="display:none" >
					<?php //echo $this->render('_update',['model'=>$Diagnosticos]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-diagnosticos" class="div-create-diagnosticos" style="display:none" >
					<?php echo $this->render('_creatediagnostico',['model'=>$Diagnosticos]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
			
		<tr>
            <td>
				<div id="div-index-diagnosticos">
				<?php Pjax::begin(['id' => 'div-grid-diagnosticos']); ?>			
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
							'attribute' => 'DIAG_ID',
							'filter' =>false,							
							'value' =>'clasdiagnosticos.DIAG_NOMBRE'							
						],
						
						[
							'attribute' => 'CLDI_ID',
							'filter' =>false,							
							'value' =>'clasesdiagnosticos.CLDI_NOMBRE'							
						],
						
						[
							'attribute' => 'TIDI_ID',
							'filter' =>false,							
							'value' =>'tiposdiagnosticos.TIDI_NOMBRE'							
						],
						
						//'ATDI_RIESGOVICTIMA',
						//'ATDI_RIESGOVICTIMAVIO',
						// 'AGEN_ID',
						// 'ATDI_CREATEBY',
						// 'ATDI_UPDATEAT',
		
		
					   [
							'class' => 'yii\grid\ActionColumn', 
							'header'=>'Acciones',
							'headerOptions' => ['width' => '130', 'style'=>'text-align: center;'],			
							'contentOptions' => ['class' => 'text-center',],
							'template' => '{delete}',
							'buttons' => [
								
								'delete' =>function ($url, $model) {
									$url = Url::to(['/historias/diagnosticos/delete', 'id' => $model->ATDI_ID]);
									return Html::a('<span class="fa fa-trash"></span>', false, [
										'title' => Yii::t('app', 'Eliminar'),
										'class'=>'ajaxDelete',
										'delete-url' => $url, 
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

$this->registerJs("
	$('.ajaxDelete').on('click', function() {
        var deleteUrl = $(this).attr('delete-url');
            
		if (confirm('Estas seguro de eliminar este elemento?')) {
			$.ajax({
					url: deleteUrl,
					type: 'post',
					error: function(xhr, status, error) {
					alert('There was an error with your request.' + xhr.responseText);
					}
			}).done(function(data) {				
				$.pjax.reload({container:'#div-grid-diagnosticos'});			
			});
	    }
	});
");

?>
