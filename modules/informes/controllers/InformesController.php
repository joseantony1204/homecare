<?php

namespace app\modules\informes\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\modules\informes\models\Informes;

/**
 * InformesController implements the CRUD actions for Informes model.
 */
class InformesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['index',], /*controlar acceso para estas vistas*/
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['index',],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index',],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $Informes = new Informes();
		$Informes->load(Yii::$app->request->post());
		
		if (Yii::$app->request->isPost) {
			if (Yii::$app->request->post('btn-informes-download')) {				   
				$opcion = $_POST["Informes"]["INFO_OPCION"];		   
			    if($opcion==1){				   
				   $data = $Informes->reportepagos($Informes);
				   return $this->render('report_pagos', [
					'Informes' => $Informes,
					'data' => $data,
				]);
			   }
			   
			   if($opcion==2){				   
				   $data = $Informes->reportevencidos($Informes);
				   return $this->render('report_vencer', [
					'Informes' => $Informes,
					'data' => $data,
				]);
			   }
			}
		}else{
			return $this->render('index', [
				'Informes' => $Informes,
			]);
        }
    }

}
