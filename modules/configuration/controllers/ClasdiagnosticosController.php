<?php

namespace app\modules\configuration\controllers;

use Yii;
use app\modules\configuration\models\Clasdiagnosticos;
use app\modules\configuration\models\ClasdiagnosticosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClasdiagnosticosController implements the CRUD actions for Clasdiagnosticos model.
 */
class ClasdiagnosticosController extends Controller
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
     * Lists all Clasdiagnosticos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClasdiagnosticosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,['pagination' => [ 'pageSize' => 10 ]]);
        $Clasdiagnosticos = new Clasdiagnosticos;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Clasdiagnosticos' => $Clasdiagnosticos,
        ]);
    }

    /**
     * Displays a single Clasdiagnosticos model.
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
     * Creates a new Clasdiagnosticos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clasdiagnosticos();

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
        		
		$model = new Clasdiagnosticos();
		  
        if ($model->load(Yii::$app->request->post())){
			
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }
    }

    /**
     * Updates an existing Clasdiagnosticos model.
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
        $model = $this->findModel($_POST['Clasdiagnosticos']['DIAG_ID']);
        if ($model->load(Yii::$app->request->post())){
			if($model->save()) {            
			    print(json_encode('save'));
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
     * Deletes an existing Clasdiagnosticos model.
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
     * Finds the Clasdiagnosticos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clasdiagnosticos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clasdiagnosticos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
