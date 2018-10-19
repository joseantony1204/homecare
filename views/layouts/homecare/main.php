<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\usuarios\models\Usuarios;
$Usuarios = Usuarios::find()->alias('t')->select('t.*')->where(['t.USUA_ID' =>Yii::$app->user->getId()])->one();
AppAsset::register($this);
$this->title = Yii::$app->name.' | Inicio';
?>
<?php
 if($Usuarios->persona->PERS_PATHIMG!=''){
	 $img = 'uploads/personas/'.$Usuarios->persona->PERS_PATHIMG;
 }else{
	 $img = 'css/images/users/1.jpg';
 }
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
	<link href="<?= Yii::getAlias('@web/css/plugins/wizard/steps.css'); ?>" rel="stylesheet">	
	<!--alerts CSS -->
	<link href="<?= Yii::getAlias('@web/css/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= Yii::getAlias('@web/css/style.css'); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= Yii::getAlias('@web/css/colors/blue.css'); ?>" rel="stylesheet">
	<!-- Page plugins css -->
    <link href="<?= Yii::getAlias('@web/css/plugins/clockpicker/dist/jquery-clockpicker.min.css'); ?>" rel="stylesheet">
	<!-- Date picker plugins css -->
    <link href="<?= Yii::getAlias('@web/css/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="<?= Yii::getAlias('@web/css/plugins/timepicker/bootstrap-timepicker.min.css'); ?>" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web/css/plugins/daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
	
    <link href="<?= Yii::getAlias('@web/css/plugins/dropify/dist/css/dropify.min.css'); ?>" rel="stylesheet">
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
<?php $this->beginBody() ?>

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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl; ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= Yii::getAlias('@web/css/images/logo-icon.png'); ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= Yii::getAlias('@web/css/images/logo-icon.png'); ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="<?= Yii::getAlias('@web/css/images/logo-text.png'); ?>" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="<?= Yii::getAlias('@web/css/images/logo-text.png'); ?>" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Buscar..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= Yii::getAlias('@web/'.$img); ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">                                            
											<div class="u-img"><img src="<?= Yii::getAlias('@web/'.$img); ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?=$Usuarios->persona->PERS_PRIMERNOMBRE.' '.$Usuarios->persona->PERS_PRIMERAPELLIDO.' '.$Usuarios->persona->PERS_SEGUNDOAPELLIDO; ?></h4>
                                                <p class="text-muted"><?=$Usuarios->persona->PERS_EMAIL; ?></p><a href="#" class="btn btn-rounded btn-danger btn-sm">Ver Perfil</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> Mi perfil</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Configuración de cuenta</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= Yii::$app->homeUrl; ?>/site/logout"><i class="fa fa-power-off"></i> Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <!--div class="user-profile">
                    <!-- User profile image -->
                    <!--div class="profile-img"> <img src="<?= Yii::getAlias('@web/css/images/users/1.jpg'); ?>" alt="user" /> </div>
                    <!-- User profile text-->
                    <!--div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe <span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="<?= Yii::$app->homeUrl; ?>" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Inicio</a>
                        </li>
						<?php if(($Usuarios->perfiles->USPE_ID==1) OR ($Usuarios->perfiles->USPE_ID==2)){ ?>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-address-card m-r-10"></i><span class="hide-menu">Afiliaciones</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
									<a href="<?= Yii::$app->homeUrl; ?>afiliaciones/afiliados/" class="waves-effect"><i class="fa fa-user-circle-o m-r-10" aria-hidden="true"></i>Titulares</a>
									<a href="<?= Yii::$app->homeUrl; ?>afiliaciones/afiliados/viewall" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Ver todos</a>
								</li>
                            </ul>
                        </li>
						<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-calendar m-r-10"></i><span class="hide-menu">Agenda</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
									<a href="<?= Yii::$app->homeUrl; ?>agendation/agenda/" class="waves-effect"><i class="fa fa-plus-circle m-r-10" aria-hidden="true"></i>Nueva agenda</a>
									<a href="<?= Yii::$app->homeUrl; ?>agendation/agenda/today" class="waves-effect"><i class="fa fa-calendar-o m-r-10" aria-hidden="true"></i>Hoy</a>
									<!--a href="<!?= Yii::$app->homeUrl; ?>agendation/agenda/history" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Historico</a-->
								</li>
                            </ul>
                        </li>
						<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-folder m-r-10"></i><span class="hide-menu">Historias clinicas</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
									<a href="<?= Yii::$app->homeUrl; ?>historias/history/" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Historias</a>
								</li>
                            </ul>
                        </li>
                        <!--li>
                            <a href="map-google.html" class="waves-effect"><i class="fa fa-credit-card m-r-10" aria-hidden="true"></i>Pagos</a>
                        </li-->
                        <li>
                            <a href="<?= Yii::$app->homeUrl; ?>configuration/empleados" class="waves-effect"><i class="fa fa-id-badge m-r-10" aria-hidden="true"></i>Empleados</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->homeUrl; ?>configuration/servicios" class="waves-effect"><i class="fa fa-server m-r-10" aria-hidden="true"></i>Servicios</a>
                        </li>
						<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-gear m-r-10"></i><span class="hide-menu">Configuraciones</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/planes/" class="waves-effect"><i class="fa fa-money m-r-10" aria-hidden="true"></i>Planes y Tarifas</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/mediospagos/" class="waves-effect"><i class="fa fa-credit-card m-r-10" aria-hidden="true"></i>Medios Pago</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/tiposidentificaciones/" class="waves-effect"><i class="fa fa-list-alt m-r-10" aria-hidden="true"></i>Tipos Identificaciones</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/generos/" class="waves-effect"><i class="fa fa-list-ol m-r-10" aria-hidden="true"></i>Generos</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/bancos/" class="waves-effect"><i class="fa fa-bank m-r-10" aria-hidden="true"></i>Bancos</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/epss/" class="waves-effect"><i class="fa fa-codepen m-r-10" aria-hidden="true"></i>Eps</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/estractos/" class="waves-effect"><i class="fa fa-cubes m-r-10" aria-hidden="true"></i>Estratos</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/clasdiagnosticos/" class="waves-effect"><i class="fa fa-arrows-alt m-r-10" aria-hidden="true"></i>Diagnósticos</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/medicamentos/" class="waves-effect"><i class="fa fa-medkit m-r-10" aria-hidden="true"></i>Medicamentos</a>
									<a href="<?= Yii::$app->homeUrl; ?>configuration/clasprocedimientos/" class="waves-effect"><i class="fa fa-stethoscope m-r-10" aria-hidden="true"></i>Procedimientos</a>
								</li>
                            </ul>
                        </li>
						
						<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user m-r-10"></i><span class="hide-menu">Usuarios</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
                                    <a href="<?= Yii::$app->homeUrl; ?>usuarios/usuarios/" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Ver todos</a>
                                    <a href="<?= Yii::$app->homeUrl; ?>usuarios/perfiles/" class="waves-effect"><i class="fa fa-bookmark-o m-r-10" aria-hidden="true"></i>Perfiles</a>
								</li>
                            </ul>
                        </li>
						<li>
                            <a href="<?= Yii::$app->homeUrl; ?>informes/informes" class="waves-effect"><i class="fa fa-files-o m-r-10" aria-hidden="true"></i>Reportes</a>
                        </li>
						<?php }else if(($Usuarios->perfiles->USPE_ID==3) OR ($Usuarios->perfiles->USPE_ID==4)){ ?>
						<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-calendar m-r-10"></i><span class="hide-menu">Agenda</span></a>
                            <ul aria-expanded="false" class="collapse">                                
								<li>
									<a href="<?= Yii::$app->homeUrl; ?>agendation/agenda/myagend" class="waves-effect"><i class="fa fa-calendar-o m-r-10" aria-hidden="true"></i>Hoy</a>
								</li>
                            </ul>
                        </li>						
						<?php } ?>											
						
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->            
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Panel principal</h3>                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?= Alert::widget() ?>
								<?= $content ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <p>&copy; <?=Yii::$app->name; ?> <?= date('Y'); ?></p> 
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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
	<!--Jquery form JavaScript -->
    <script src="<?= Yii::getAlias('@web/js/jquery-form.min.js'); ?>"></script>
	
	<script src="<?= Yii::getAlias('@web/css/plugins/dropify/dist/js/dropify.min.js'); ?>"></script>
	
	<script src="<?= Yii::getAlias('@web/css/plugins/clockpicker/dist/jquery-clockpicker.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/moment/moment.js'); ?>"></script>
	
	
    <script src="<?= Yii::getAlias('@web/css/plugins/wizard/jquery.steps.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/wizard/jquery.validate.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= Yii::getAlias('@web/css/plugins/wizard/steps.js'); ?>"></script>
	
    
	<script>
    /*******************************************/
    // Basic Date Range Picker
    /*******************************************/
    $('.daterange').daterangepicker();

    /*******************************************/
    // Date & Time
    /*******************************************/
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    /*******************************************/
    //Calendars are not linked
    /*******************************************/
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    /*******************************************/
    // Single Date Range Picker
    /*******************************************/
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    /*******************************************/
    // Auto Apply Date Range
    /*******************************************/
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    /*******************************************/
    // Calendars are not linked
    /*******************************************/
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    /*******************************************/
    // Date Limit
    /*******************************************/
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    /*******************************************/
    // Show Dropdowns
    /*******************************************/
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    /*******************************************/
    // Show Week Numbers
    /*******************************************/
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

    /*******************************************/
    // Date Ranges
    /*******************************************/
    $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    /*******************************************/
    // Top of the form-control open alignment
    /*******************************************/
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    /*******************************************/
    // Custom button options
    /*******************************************/
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

    /*******************************************/
    // Language
    /*******************************************/
    $('.localeRange').daterangepicker({
        ranges: {
            "Aujourd'hui": [moment(), moment()],
            'Hier': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Les 7 derniers jours': [moment().subtract('days', 6), moment()],
            'Les 30 derniers jours': [moment().subtract('days', 29), moment()],
            'Ce mois-ci': [moment().startOf('month'), moment().endOf('month')],
            'le mois dernier': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        locale: {
            applyLabel: "Vers l'avant",
            cancelLabel: 'Annulation',
            startLabel: 'Date initiale',
            endLabel: 'Date limite',
            customRangeLabel: 'SÃ©lectionner une date',
            // daysOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi'],
            daysOfWeek: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            monthNames: ['Janvier', 'fÃ©vrier', 'Mars', 'Avril', 'ÐœÐ°i', 'Juin', 'Juillet', 'AoÃ»t', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            firstDay: 1
        }
    });
    </script>
    <script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', false);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
	
	<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('Archivo borrado');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
	
	
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= Yii::getAlias('@web/css/plugins/styleswitcher/jQuery.style.switcher.js'); ?>"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>	
