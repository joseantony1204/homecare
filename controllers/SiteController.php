<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\modules\configuration\models\Personas;
use app\modules\afiliaciones\models\Afiliados;

class SiteController extends Controller
{
   
	/**
     * @inheritdoc
     */
	//public $layout = 'login'; 
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'], /*controlar acceso para estas vistas*/
                'rules' => [
                    [
                        'allow' => false,
						'actions' => ['logout', 'index'],
                        'roles' => ['?'],
                    ],
					[
                        'allow' => true,
						'actions' => ['logout', 'index'],                       
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
		return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login'; 
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
	public function actionSearch()
    {
        $this->layout = 'search';
		$Personas = new Personas;
		$Afiliados = new Afiliados;
	
		return $this->render('search', [
            'Personas' => $Personas,
            'Afiliados' => $Afiliados,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionMail()
    {
       Yii::$app->mail->compose()
		 ->setFrom([Yii::$app->params['opcionalEmail'] => Yii::$app->params['adminEmail']])
		 ->setTo([Yii::$app->params['userEmail'] => 'Joseagl_'])
		 ->setSubject("Prueba de Envio de Email")
		 ->setTextBody("Buenas tardes, apreciado(a) señor(a) este es un correo de prueba!!!")
		 //->attach(Yii::$app->basePath.'/web/pdf/HISTORIA_CLINICA_No.25.pdf')
		 ->send();
    }
	
	public function actionMailer()
    {
	   
	   Yii::$app->mailer->compose()
		 ->setFrom([Yii::$app->params['userEmail'] => Yii::$app->params['adminEmail']])
		 ->setTo([Yii::$app->params['opcionalEmail'] => 'Jose AGL'])
		 ->setSubject("Prueba de Envio de Email")
		 ->setTextBody("Buenas tardes, apreciado(a) señor(a) este es un correo de prueba!!!")
		 //->attach(Yii::$app->basePath.'/web/pdf/HISTORIA_CLINICA_No.25.pdf')
		 ->send();
    }
}
