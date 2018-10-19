<?php
$this->registerJs("
 
 $('#btn-create-usuarios').on('click', function(){ 
    $('#div-search-usuarios').show();
	$('#div-create-usuarios').hide();
    $('#div-index-usuarios').hide();		
    $('#div-update-usuarios').hide();		
 });
 
 $('#btn-refresh-grid-usuarios').on('click',function(e) {  
    $.pjax.reload({container:'#div-grid-usuarios'});
	$('#msjbox').show().slideToggle(3000);
 });
	
 "); 
?>
<?php
$this->registerJs("
$('#btn-create-modal-usuarios').click(function(){
        $('#create-modal-usuarios').modal('show').find('#createContent').load($(this).attr('value'));
    });

$(function () {
    $('.btn-update-modal-usuarios').click(function () {
        $('#update-modal-usuarios').modal('show').find('#updateContent').load($(this).attr('value'));
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
/* @var $searchModel app\modules\usuarios\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">
    <div class="table-responsive">
	<table width="100%" border="0" align="center">
        <tr>
            <td>			
				<table width="100%" border="0" align="center" class="table">
					<tr>
						<td width="100%" align="left" colspan="4">
						    <div class="brand-text brand-big hidden-lg-down"><strong><h3><i class="fa fa-cogs"></i> Administrar usuarios</h3></strong></div>					
						</td>				
					</tr>
					<tr>
						<td width="5%" align="center">						
						    <?php //echo Html::button('<i class="fa fa-plus"></i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-modal-usuarios', 'value' => Url::to(['usuarios/create']), ]); ?>							
							<?php echo Html::button('<i class="fa fa-plus"> Nuevo Usuario</i>', [ 'class' => 'btn btn-success', 'id' => 'btn-create-usuarios', 'title' => 'Agregar usuarios' ]); ?>   			 
						</td>
						
						<td width="5%" align="center">
						   <?php echo Html::button('<i class="fa fa-repeat"> Actualizar página</i>', [ 'class' => 'btn btn-info', 'id' => 'btn-refresh-grid-usuarios', 'title' => 'Actualizar grid' ]); ?>							  			 
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
				<div id="div-update-usuarios" class="div-update-usuarios" style="display:none" >
					<?php echo $this->render('_update',['Personas'=>$Personas,'model'=>$Usuarios]); ?>
				</div><!-- update-form -->
			</td>
        </tr>
		
		<tr>
            <td>
			    <div id="div-create-usuarios" class="div-create-usuarios" style="display:none" >
					<?php echo $this->render('_create',['Personas'=>$Personascreate,'model'=>$Usuarioscreate]); ?>
		
				</div><!-- create-form -->
			</td>
        </tr>
		
		<tr>
			<td>
				<div id="div-search-usuarios" class="div-search-usuarios" style="display:none" >
					<?php echo $this->render('_search',['Personas'=>$Personas,'model'=>$Usuarios]); ?>
	
				</div><!-- search-form -->
			</td>
		</tr>
			
		<tr>
            <td>
				<div id="div-index-usuarios">
				<?php Pjax::begin(['id' => 'div-grid-usuarios']); ?>			
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
						'USUA_USUARIO',						
						[
							'attribute' => 'USPE_ID',
							'value' =>'perfiles.USPE_NOMBRE'							
						],
						
						[
							'attribute' => 'USES_ID',
							'value' =>'estados.USES_NOMBRE'							
						],
		
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
												   'onClick'=>'setupdate('.$model->USUA_ID.'); return false;',
												  ]);
								},
								
								'updateByModal' => function($url,$model,$key){
									return Html::button('<i class="fa fa-pencil"></i>',[
										'value'=>Yii::$app->urlManager->createUrl('usuarios/usuarios/update?id='.$key),
										'class'=>'btn-update-modal-usuarios btn btn-success',
										'data-placement'=>'bottom',
										'title'=>'Update',
										'data-toggle' => 'modal',
                                        'data-target' => '#btn-update-modal-usuarios',
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