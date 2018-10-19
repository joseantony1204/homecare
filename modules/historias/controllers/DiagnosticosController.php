<?php

namespace app\modules\historias\controllers;

use Yii;
use app\modules\configuration\models\Clasdiagnosticos;

use app\modules\historias\models\History;
use app\modules\historias\models\Diagnosticos;
use app\modules\historias\models\DiagnosticosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DiagnosticosController implements the CRUD actions for Diagnosticos model.
 */
class DiagnosticosController extends Controller
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
	
	public function actionAutocomplete($term)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    $model = Clasdiagnosticos::find()
								       ->where(['like', 'DIAG_NOMBRE', $term])
								       ->orWhere(['like', 'DIAG_CODIGO', $term])
									   ->all();
	    if($model !=null){
		   $ret = array();
		   foreach ($model as $row)
		   {
			   $ret[] = array(
                        'id' => $row->DIAG_ID,
                        'label' => $row->DIAG_NOMBRE,
                        'value' => $row->DIAG_NOMBRE,
                );
		   }
		   return $ret;
	    }else{
		   false;
	    }
    }

    /**
     * Lists all Diagnosticos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosticosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,['pagination' => [ 'pageSize' => 10 ]]);
        $Diagnosticos = new Diagnosticos;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Diagnosticos' => $Diagnosticos,
        ]);
    }

    /**
     * Displays a single Diagnosticos model.
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
     * Creates a new Diagnosticos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diagnosticos();

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
        		
		$model = new Diagnosticos();
		  
        if ($model->load(Yii::$app->request->post())){
			
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }
    }

    /**
     * Updates an existing Diagnosticos model.
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
        $model = $this->findModel($_POST['Diagnosticos']['ATDI_ID']);
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
     * Deletes an existing Diagnosticos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
	public function actionDelete($id)
    {
        $model = $this->findModel($id);
		//$History = History::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $model->AGEN_ID])->one();
        $model->delete();
		//return $this->redirect(['/historias/history/load', 'token' => $History->AGEN_TOKEN]);		
    }

    /**
     * Finds the Diagnosticos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diagnosticos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagnosticos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
