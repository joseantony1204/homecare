<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = Yii::$app->name.' | Login';
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

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../img/login_logo.jpg);">
              
            <div class="login-box card">
            <div class="card-body">
				<?php $form = ActiveForm::begin([
					'id' => 'loginform',
					'options' => [
						'class' => 'form-horizontal form-material'
					 ],										
				]);
				?>
				
				<h3 class="box-title mb-3">Iniciar sessión</h3>
				
				<div class="form-group ">
					<div class="col-xs-12">
						<?= Html::activeInput('text', $model, 'username', ['required' =>true, 'class' =>'form-control', ['autofocus' => true], 'placeholder'=>'Usuario',]); ?>
					</div>
				</div>
				
				<div class="form-group ">
					<div class="col-xs-12">
						<?= Html::activeInput('password', $model, 'password', ['required' =>true, 'class' =>'form-control', 'placeholder'=>'Contraseña',]); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-12">
						<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock mr-1"></i> olvidé mi contraseña?</a> 
					</div>
				</div>
				<div class="form-group text-center mt-3">
					<div class="col-xs-12">
						<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
					</div>
				</div>
                <?php ActiveForm::end(); ?>
                
                <form class="form-horizontal" id="recoverform" action="index">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recuperar contraseña</h3>
                            <p class="text-muted">¡Ingrese su correo electrónico y le enviaremos las instrucciones! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Recuperar</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        
    </section>
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= Yii::getAlias('@web/css/plugins/styleswitcher/jQuery.style.switcher.js'); ?>"></script>
</body>

</html>