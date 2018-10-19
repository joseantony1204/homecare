<?php

namespace app\modules\historias\controllers;

use Yii;
use app\modules\configuration\models\Clasprocedimientos;
use app\modules\historias\models\History;
use app\modules\historias\models\Procedimientos;
use app\modules\historias\models\ProcedimientosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProcedimientosController implements the CRUD actions for Procedimientos model.
 */
class ProcedimientosController extends Controller
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
		$model = Clasprocedimientos::find()
								   ->alias('t')
								   ->select('t.*, tp.TIPR_NOMBRE')	
								   ->where(['like', 'PROC_NOMBRE', $term])
								   ->orWhere(['like', 'PROC_CUPS', $term])
								   ->orWhere(['like', 'PROC_SOAT', $term])
								   ->innerJoin('TBL_TIPOSPROCEDIMIENTOS tp', 'tp.TIPR_ID = t.TIPR_ID')
								   ->all();
	    if($model !=null){
		   $ret = array();
		   foreach ($model as $row)
		   {
			   $ret[] = array(
                        'id' => $row->PROC_ID,
                        'label' => $row->TIPR_NOMBRE.' -> '.$row->PROC_NOMBRE,
                        'value' => $row->TIPR_NOMBRE.' -> '.$row->PROC_NOMBRE,
                );
		   }
		   return $ret;
	    }else{
		   false;
	    }
    }

    /**
     * Lists all Procedimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProcedimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,['pagination' => [ 'pageSize' => 10 ]]);
        $Procedimientos = new Procedimientos;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Procedimientos' => $Procedimientos,
        ]);
    }

    /**
     * Displays a single Procedimientos model.
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
     * Creates a new Procedimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Procedimientos();

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
        		
		$model = new Procedimientos();
		  
        if ($model->load(Yii::$app->request->post())){
			
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }
    }

    /**
     * Updates an existing Procedimientos model.
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
        $model = $this->findModel($_POST['Procedimientos']['ATPR_ID']);
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
     * Deletes an existing Procedimientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $Recetarios = $this->findModel($id);
		$History = History::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $Recetarios->AGEN_ID])->one();
        $Recetarios->delete();
		return $this->redirect(['/historias/history/load', 'token' => $History->AGEN_TOKEN]);		
    }

    /**
     * Finds the Procedimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Procedimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Procedimientos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
