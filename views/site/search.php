<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = Yii::$app->name.' | Validador de usuarios';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web/css/images/favicon.png'); ?>">
    <?= Html::csrfMetaTags(); ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head(); ?> 
    <!-- Bootstrap Core CSS -->
    <link href="<?= Yii::getAlias('@web/css/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= Yii::getAlias('@web/css/style.css'); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= Yii::getAlias('@web/css/colors/blue.css'); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body >
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-outline-info">
				<div class="card-header">
					<h4 class="mb-0 text-white">Validador de usuarios</h4>
				</div>
				<div class="card-body">
				
					<?php $form = ActiveForm::begin([
						'id' => 'form-search-afiliados',
						'options' => [
							'class' => 'form-horizontal form-material'
						 ],										
					]);
					?>
					
						<div class="form-body">
							<h3 class="card-title">Consutar tipo de afiliación de usuarios</h3>
							<hr>
							<div class="row pt-3">
								<div class="col-md-12">
									<div class="form-group">
										<?= $form->field($Personas, 'PERS_IDENTIFICACION')->textInput(['required' =>true, ['autofocus' => true], 'class' =>'form-control required'])->label('Identificacion*'); ?>
									</div>
								</div>
							</div>
							
						</div>
						<div class="form-actions">
							<?php echo Html::button('<i class="fa fa-search"> Consultar...</i>', [ 'class' => 'btn btn-success', 'onClick' => 'searchdata();', 'title' => 'Consultar...' ]); ?>							
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
	
	<div id="div-view-search" class="row" style="display:none" >
		<div class="col-lg-12">
			<div class="card card-outline-info">
					<?php echo $this->render('_viewall',['Personas'=>$Personas,'model'=>$Afiliados]); ?>				
			</div>
		</div>
	</div>
	
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= Yii::getAlias('@web/css/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= Yii::getAlias('@web/css/plugins/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= Yii::getAlias('@web/js/jquery.slimscroll.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?= Yii::getAlias('@web/js/waves.js'); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= Yii::getAlias('@web/js/sidebarmenu.js'); ?>"></script>
    <!--stickey kit -->
    <script src="<?= Yii::getAlias('@web/css/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= Yii::getAlias('@web/js/custom.min.js'); ?>"></script>
	<script src="<?= Yii::getAlias('@web/js/jquery-form.min.js'); ?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= Yii::getAlias('@web/css/plugins/styleswitcher/jQuery.style.switcher.js'); ?>"></script>
</body>

</html>

<script type="application/javascript">
function searchdata(){
	var url = "<?=Yii::$app->urlManager->createUrl(["/afiliaciones/afiliados/searchdata"])?>";
	var form = $("#form-search-afiliados");
	$.ajax(
	{
	    url: url,
		type:'POST',
		dataType:'html',
		data: form.serialize(),
		success:function(data){	    						
		    var parsed = JSON.parse(data);
            if(parsed!=null){
				if(parsed.info == "titulares"){
				alert("AFILIADO TITULAR ENCONTRADO.");
				$('#div-view-search').show();	
				$('#PERS_IDENTIFICACION').empty();
				$('#PERS_IDENTIFICACION').append(parsed.PERS_IDENTIFICACION)				
				$('#PERS_PRIMERNOMBRE').empty();					
				$('#PERS_PRIMERNOMBRE').append(parsed.PERS_PRIMERNOMBRE)					
				$('#PERS_SEGUNDONOMBRE').empty();					
				$('#PERS_SEGUNDONOMBRE').append(parsed.PERS_SEGUNDONOMBRE)					
				$('#PERS_PRIMERAPELLIDO').empty();					
				$('#PERS_PRIMERAPELLIDO').append(parsed.PERS_PRIMERAPELLIDO)					
				$('#PERS_SEGUNDOAPELLIDO').empty();
				$('#PERS_SEGUNDOAPELLIDO').append(parsed.PERS_SEGUNDOAPELLIDO)				
				$('#TIID_ID').empty();
				$('#TIID_ID').append(parsed.TIID_ID)												
							
				$('#TIPL_ID').empty();				
				$('#TIPL_ID').append(parsed.TIPL_ID)					
				$('#PLAN_ID').empty();					
				$('#PLAN_ID').append(parsed.PLAN_ID)					
				$('#ESAF_ID').empty();				
				$('#ESAF_ID').append(parsed.ESAF_ID)		
				
				}else if(parsed.info == "beneficiario"){
				alert("BENEFICIARIO ENCONTRADO.");
				$('#div-view-search').show();	
				$('#PERS_IDENTIFICACION').empty();
				$('#PERS_IDENTIFICACION').append(parsed.PERS_IDENTIFICACION)				
				$('#PERS_PRIMERNOMBRE').empty();					
				$('#PERS_PRIMERNOMBRE').append(parsed.PERS_PRIMERNOMBRE)					
				$('#PERS_SEGUNDONOMBRE').empty();					
				$('#PERS_SEGUNDONOMBRE').append(parsed.PERS_SEGUNDONOMBRE)					
				$('#PERS_PRIMERAPELLIDO').empty();					
				$('#PERS_PRIMERAPELLIDO').append(parsed.PERS_PRIMERAPELLIDO)					
				$('#PERS_SEGUNDOAPELLIDO').empty();
				$('#PERS_SEGUNDOAPELLIDO').append(parsed.PERS_SEGUNDOAPELLIDO)				
				$('#TIID_ID').empty();
				$('#TIID_ID').append(parsed.TIID_ID)												
							
				$('#TIPL_ID').empty();				
				$('#TIPL_ID').append(parsed.TIPL_ID)					
				$('#PLAN_ID').empty();					
				$('#PLAN_ID').append(parsed.PLAN_ID)					
				$('#ESAF_ID').empty();				
				$('#ESAF_ID').append(parsed.ESAF_ID)
				
				}else if(parsed.info == "false"){
				 alert("USUARIO NO ENCONTRADO.");
				}
			}
		}
	});		
}
</script>	
	