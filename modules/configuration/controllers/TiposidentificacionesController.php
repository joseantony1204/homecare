<?php

namespace app\modules\configuration\controllers;

use Yii;
use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\TiposidentificacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TiposidentificacionesController implements the CRUD actions for Tiposidentificaciones model.
 */
class TiposidentificacionesController extends Controller
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
                'only' => ['create', 'index', 'update', 'delete'], /*controlar acceso para estas vistas*/
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['create', 'index', 'update', 'delete'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'index', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	

    /**
     * Lists all Tiposidentificaciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TiposidentificacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
        $Tiposidentificaciones = new Tiposidentificaciones;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Tiposidentificaciones' => $Tiposidentificaciones,
        ]);
    }

    /**
     * Displays a single Tiposidentificaciones model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tiposidentificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tiposidentificaciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionCreateajax()
    {
        		
		$model = new Tiposidentificaciones();
		  
        if ($model->load(Yii::$app->request->post())){
			if($model->save()) {            
			    print('save');
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }else{
			 print('false');
		}
    }

    /**
     * Updates an existing Tiposidentificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	public function actionGetdata($id)
	{
		$model=$this->findModel($id);
		echo json_encode($model->attributes);		
	} 
	 
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Tiposidentificaciones']['TIID_ID']);
        if ($model->load(Yii::$app->request->post())){
			if($model->save()) {            
			    print('save');
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }
    }
	
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index',]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tiposidentificaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tiposidentificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tiposidentificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tiposidentificaciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
