<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$db2 = require __DIR__ . '/db2.php';

$config = [
    'id' => 'basic',
	'name'=>'HOME CARE',
    'basePath' => dirname(__DIR__),
	'language' => 'es',
	'sourceLanguage'=>'es',
    'bootstrap' => ['log'],
    'layout' => 'homecare/main',
    //'layout' => 'main',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	
	'modules' => [
        'consultas' => ['class' => 'app\modules\consultas\Module',],
        'usuarios' => ['class' => 'app\modules\usuarios\Module',],
        'historias' => ['class' => 'app\modules\historias\Module',],
        'agendation' => ['class' => 'app\modules\agendation\Module',],
        'informes' => ['class' => 'app\modules\informes\Module',],
        'afiliaciones' => ['class' => 'app\modules\afiliaciones\Module',],
        'configuration' => ['class' => 'app\modules\configuration\Module',],
    ],
	
    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            //'cookieValidationKey' => false,

        ],
		
		// Yii2 TCPDF
		'tcpdf' => [
			'class' => 'yii\tcpdf\TCPDF',
		],

		
		'urlManager' => [
	        'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			//'suffix' => '.jsp',
			'rules'=>[
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
			],
	    ],	
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
			'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		
		'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            //'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.gmail.com',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username' => $params['userEmail'],
				'password' => $params['passEmail'],
            ],
        ],
		
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => $params['userEmail'],
				'password' => $params['passEmail'],
				'port' => '587',
				'encryption' => 'tls',
			],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'db2' => $db2,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
