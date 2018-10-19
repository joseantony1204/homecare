<?php

namespace app\modules\historias\controllers;

use Yii;
use app\modules\configuration\models\Personas;

use app\modules\historias\models\History;
use app\modules\historias\models\HistorySearch;

use app\modules\historias\models\Generalidades;
use app\modules\historias\models\Recomendaciones;
use app\modules\historias\models\Antpersonales;
use app\modules\historias\models\Antfamiliares;
use app\modules\historias\models\Habitos;
use app\modules\historias\models\Revsistemas;
use app\modules\historias\models\Signosvitales;
use app\modules\historias\models\Exafisicos;
use app\modules\historias\models\Antginecologicos;
use app\modules\historias\models\Plan;
use app\modules\historias\models\Testfindrisk;

use app\modules\historias\models\Diagnosticos;
use app\modules\historias\models\DiagnosticosSearch;

use app\modules\historias\models\Recetarios;
use app\modules\historias\models\RecetariosSearch;

use app\modules\historias\models\Remisiones;
use app\modules\historias\models\RemisionesSearch;

use app\modules\historias\models\Procedimientos;
use app\modules\historias\models\ProcedimientosSearch;



use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends Controller
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
     * Lists all History models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,['pagination' => [ 'pageSize' => 10 ]]);
        $History = new History;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'History' => $History,
        ]);
    }

    /**
     * Displays a single History model.
     * @param integer $id
     * @return mixed
     */	
    public function actionLoad($token)
    {
        $History = History::find()->alias('t')->select('t.*')->where(['t.AGEN_TOKEN' => trim($token)])->one();
        
		if($History->ESCI_ID == 5){
			return $this->redirect(['close', 'token' => $History->AGEN_TOKEN]);
		}else{
		
			$Generalidades = Generalidades::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Recomendaciones = Recomendaciones::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Antfamiliares = Antfamiliares::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $History->PERS_ID])->one();
			$Antpersonales = Antpersonales::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $History->PERS_ID])->one();
			$Habitos = Habitos::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $History->PERS_ID])->one();
			$Revsistemas = Revsistemas::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Signosvitales = Signosvitales::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Exafisicos = Exafisicos::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Antginecologicos = Antginecologicos::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $History->PERS_ID])->one();
			$Plan = Plan::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			$Testfindrisk = Testfindrisk::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->one();
			
			$searchModelDiagnosticos = new DiagnosticosSearch();
			$searchModelDiagnosticos->AGEN_ID = $History->AGEN_ID;
			$dataProviderDiagnosticos = $searchModelDiagnosticos->search(Yii::$app->request->queryParams);
			$dataProviderDiagnosticos->pagination->pageSize=10;
			$Diagnosticos = new Diagnosticos;
			$Diagnosticos->AGEN_ID = $History->AGEN_ID;
			
			$searchModelRecetarios = new RecetariosSearch();
			$searchModelRecetarios->AGEN_ID = $History->AGEN_ID;
			$dataProviderRecetarios = $searchModelRecetarios->search(Yii::$app->request->queryParams);
			$dataProviderRecetarios->pagination->pageSize=10;
			$Recetarios = new Recetarios;
			$Recetarios->AGEN_ID = $History->AGEN_ID;
			
			$searchModelRemisiones = new RemisionesSearch();
			$searchModelRemisiones->AGEN_ID = $History->AGEN_ID;
			$dataProviderRemisiones = $searchModelRemisiones->search(Yii::$app->request->queryParams);
			$dataProviderRemisiones->pagination->pageSize=10;
			$Remisiones = new Remisiones;
			$Remisiones->AGEN_ID = $History->AGEN_ID;
			
			$searchModelProcedimientos = new ProcedimientosSearch();
			$searchModelProcedimientos->AGEN_ID = $History->AGEN_ID;
			$dataProviderProcedimientos = $searchModelProcedimientos->search(Yii::$app->request->queryParams);
			$dataProviderProcedimientos->pagination->pageSize=10;
			$Procedimientos = new Procedimientos;
			$Procedimientos->AGEN_ID = $History->AGEN_ID;
			
			return $this->render('load', [
				'Personas' => $Personas,
				'History' => $History,
				
				'Generalidades' => $Generalidades,
				'Recomendaciones' => $Recomendaciones,
				'Antfamiliares' => $Antfamiliares,
				'Antpersonales' => $Antpersonales,
				'Habitos' => $Habitos,
				'Revsistemas' => $Revsistemas,
				'Signosvitales' => $Signosvitales,
				'Exafisicos' => $Exafisicos,
				'Antginecologicos' => $Antginecologicos,
				'Plan' => $Plan,
				'Testfindrisk' => $Testfindrisk,
				
				'searchModelDiagnosticos' => $searchModelDiagnosticos,
				'dataProviderDiagnosticos' => $dataProviderDiagnosticos,
				'Diagnosticos' => $Diagnosticos,
				
				'searchModelRecetarios' => $searchModelRecetarios,
				'dataProviderRecetarios' => $dataProviderRecetarios,
				'Recetarios' => $Recetarios,
				
				'searchModelRemisiones' => $searchModelRemisiones,
				'dataProviderRemisiones' => $dataProviderRemisiones,
				'Remisiones' => $Remisiones,
				
				'searchModelProcedimientos' => $searchModelProcedimientos,
				'dataProviderProcedimientos' => $dataProviderProcedimientos,
				'Procedimientos' => $Procedimientos,
			]);
		}
    }
	
	public function actionClose($token)
    {
        
		$History = History::find()->alias('t')->select('t.*')->where(['t.AGEN_TOKEN' => trim($token)])->one();
		if($History->ESCI_ID ==1){
			$Diagnosticos = Diagnosticos::find()->alias('t')->select('t.*')->where(['t.AGEN_ID' => $History->AGEN_ID])->all();
			if(count($Diagnosticos)>0){
				$History->ESCI_ID = 5;
				$History->save();
			}else{
				 \Yii::$app->getSession()->setFlash('danger', 'Debe agregar por lo menos un diagnostico antes de cerrar la historia!');
				 return $this->redirect(['load', 'token'=>$token]);			 
			     }
		}
		
		if($History->ESCI_ID ==5){	
			if (Yii::$app->request->isPost) {
			    if (Yii::$app->request->post('btn-reports-download')) {				   
				    $opcion = $_POST["History"]["AGEN_OPCION"];			  
				   
				   if($opcion==1){				   
					   return $this->render('report_historia', [
						'History' => $History,
					]);
				   } 
				   
				   if($opcion==2){
					   return $this->render('report_recetario', [
						'History' => $History,
					]);
				   }
				   
				   if($opcion==3){
					   return $this->render('report_remisiones', [
						'History' => $History,
					]);
				   }
				   
				   if($opcion==4){
					   return $this->render('report_laboratorios', [
						'History' => $History,
					]);
				   }
				   
				   if($opcion==5){
					   return $this->render('report_procedimientos', [
						'History' => $History,
					]);
				   }
				   
				   if($opcion==6){
					   return $this->render('report_imagenes', [
						'History' => $History,
					]);
				   }
				   
			    }
			  
			    if (Yii::$app->request->post('btn-reports-sendmail')) {
				   $opcion = $_POST["History"]["AGEN_OPCION"];
				   if($opcion==1){					   
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_historia', [
						'History' => $History,							
						'sw' => true,
					]);
				   }				  
				   
				   
				   if($opcion==2){
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_recetario', [
						'History' => $History,
						'sw' => true,
					]);
				   }
				   
				   if($opcion==3){
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_remisiones', [
						'History' => $History,
						'sw' => true,
					]);
				   }
				   
				   if($opcion==4){
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_laboratorios', [
						'History' => $History,
						'sw' => true,
					]);
				   }
				   
				   if($opcion==5){
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_procedimientos', [
						'History' => $History,
						'sw' => true,
					]);
				   }
				   
				   if($opcion==6){
					   Yii::$app->session->setFlash('myMessage', "Documento enviado por email correstamente...");
					   return $this->render('report_imagenes', [
						'History' => $History,
						'sw' => true,
					]);
				   }
			    }
			   
			}				

			return $this->render('reports', [
				'model' => $History,
			]);	
		}	
		
    }
	
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new History model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new History();

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
        		
		$model = new History();
		  
        if ($model->load(Yii::$app->request->post())){
			
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					print (json_encode('false'));
					//print (json_encode($model->getErrors()));
			     }
        }
    }

    /**
     * Updates an existing History model.
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
        $model = $this->findModel($_POST['History']['AGEN_ID']);
        if ($model->load(Yii::$app->request->post())){
			if($model->save()) {            
			    print(json_encode('save'));
			}else{				  
					print (json_encode('false'));
					//print (json_encode($model->getErrors()));
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
     * Deletes an existing History model.
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
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = History::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
