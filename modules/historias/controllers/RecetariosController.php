<?php

namespace app\modules\historias\controllers;

use Yii;
use app\modules\historias\models\History;
use app\modules\historias\models\Recetarios;
use app\modules\historias\models\RecetariosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\modules\configuration\models\Medicamentos;

/**
 * RecetariosController implements the CRUD actions for Recetarios model.
 */
class RecetariosController extends Controller
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
     * Lists all Recetarios models.
     * @return mixed
     */
    public function actionAutocomplete($term)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$model = Medicamentos::find()
								   ->where(['like', 'MEDI_DESCRIPCIONATC', $term])
								   ->orWhere(['like', 'MEDI_CONCENTRACION', $term])
								   ->all();
	    if($model !=null){
		   $ret = array();
		   foreach ($model as $row)
		   {
			   $ret[] = array(
                        'id' => $row->MEDI_ID,
                        'label' => $row->MEDI_DESCRIPCIONATC,
                        'value' => $row->MEDI_DESCRIPCIONATC,
                );
		   }
		   return $ret;
	    }else{
		   false;
	    }
    }
	
	/**
     * Lists all Recetarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,['pagination' => [ 'pageSize' => 10 ]]);
        $Recetarios = new Recetarios;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Recetarios' => $Recetarios,
        ]);
    }

    /**
     * Displays a single Recetarios model.
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
     * Creates a new Recetarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recetarios();

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
        		
		$model = new Recetarios();
		  
        if ($model->load(Yii::$app->request->post())){
			
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					throw new NotFoundHttpException($model->getErrors());
			     }
        }
    }

    /**
     * Updates an existing Recetarios model.
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
        $model = $this->findModel($_POST['Recetarios']['ATRE_ID']);
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
     * Deletes an existing Recetarios model.
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
     * Finds the Recetarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recetarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recetarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
