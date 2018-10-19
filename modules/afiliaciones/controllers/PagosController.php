<?php

namespace app\modules\afiliaciones\controllers;

use Yii;
use app\modules\afiliaciones\models\Afiliados;
use app\modules\afiliaciones\models\Pagos;
use app\modules\afiliaciones\models\PagosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PagosController implements the CRUD actions for Pagos model.
 */
class PagosController extends Controller
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
     * Lists all Pagos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
        $Pagos = new Pagos;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Pagos' => $Pagos,
        ]);
    }

    /**
     * Displays a single Pagos model.
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
     * Creates a new Pagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagos();

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
        		
		$model = new Pagos();
        
        if ($model->load(Yii::$app->request->post())){
				$model->PAGO_SOPORTE = UploadedFile::getInstance($model, 'PAGO_SOPORTE');			
			if($model->save()) {            
			    if($model->PAGO_SOPORTE){
					$model->PAGO_SOPORTE->saveAs(Yii::$app->basePath.'/web/uploads/' . $model->PAGO_SOPORTE->baseName . '.' . $model->PAGO_SOPORTE->extension);
				}
				print('save');
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }else{
			print ('false');
		}
    }

    /**
     * Updates an existing Pagos model.
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
        $model = $this->findModel($_POST['Pagos']['PAGO_ID']);
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
     * Deletes an existing Pagos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $Pagos = $this->findModel($id);
		$Afiliados = Afiliados::find()->alias('t')->select('t.*')->where(['t.AFIL_ID' => $Pagos->AFIL_ID])->one();
        $Pagos->delete();
		return $this->redirect(['/afiliaciones/afiliados/view', 'id' => $Afiliados->AFIL_ID]);		
    }

    /**
     * Finds the Pagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
