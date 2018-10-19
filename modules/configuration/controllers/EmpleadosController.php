<?php

namespace app\modules\configuration\controllers;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Personascreate;

use app\modules\configuration\models\Empleados;
use app\modules\configuration\models\EmpleadosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * EmpleadosController implements the CRUD actions for Empleados model.
 */
class EmpleadosController extends Controller
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
	
	public function actionSearch()
	{
		$identificacion = $_POST['Personas']['PERS_IDENTIFICACION'];
		$model = Personascreate::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->innerJoin('TBL_AFILIADOS a', 'a.PERS_ID = t.PERS_ID')
							->one();
		if($model){					
		    $array = NULL;		
			$array = array( 		                
							'info'=>'true',
							'PERS_IDENTIFICACION'=>$identificacion,
						   );
			echo json_encode($array);
		}else{
			$Personascreate = Personascreate::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->one();
			if($Personascreate){				
				$array = NULL;		
				$array = array( 		                
								'info'=>'person',
								'PERS_ID'=>$Personascreate->PERS_ID,
								'PERS_IDENTIFICACION'=>$Personascreate->PERS_IDENTIFICACION,
								'PERS_LUGAREXPEDICION'=>$Personascreate->PERS_LUGAREXPEDICION,
								'PERS_FECHAEXPEDICION'=>$Personascreate->PERS_FECHAEXPEDICION,
								'PERS_PRIMERNOMBRE'=>$Personascreate->PERS_PRIMERNOMBRE,
								'PERS_SEGUNDONOMBRE'=>$Personascreate->PERS_SEGUNDONOMBRE,
								'PERS_PRIMERAPELLIDO'=>$Personascreate->PERS_PRIMERAPELLIDO,
								'PERS_SEGUNDOAPELLIDO'=>$Personascreate->PERS_SEGUNDOAPELLIDO,
								'PERS_FECHANACIMIENTO'=>$Personascreate->PERS_FECHANACIMIENTO,
								'PERS_DIRECCION'=>$Personascreate->PERS_DIRECCION,
								'PERS_BARRIO'=>$Personascreate->PERS_BARRIO,
								'ZONA_ID'=>$Personascreate->ZONA_ID,
								'PERS_TELEFONO'=>$Personascreate->PERS_TELEFONO,
								'PERS_TELEFONOMOVIL'=>$Personascreate->PERS_TELEFONOMOVIL,
								'PERS_SENDSMS'=>$Personascreate->PERS_SENDSMS,
								'PERS_EMAIL'=>$Personascreate->PERS_EMAIL,
								'PERS_SENDMAIL'=>$Personascreate->PERS_SENDMAIL,
								'PERS_PATHIMG'=>$Personascreate->PERS_PATHIMG,
								'PERS_CUALOTRAEPS'=>$Personascreate->PERS_CUALOTRAEPS,
								'EPSS_ID'=>$Personascreate->EPSS_ID,
								'ESTR_ID'=>$Personascreate->ESTR_ID,
								'ESCI_ID'=>$Personascreate->ESCI_ID,
								'NIES_ID'=>$Personascreate->NIES_ID,
								'TIID_ID'=>$Personascreate->TIID_ID,
								'TIGE_ID'=>$Personascreate->TIGE_ID,
								'PAIS_ID'=>$Personascreate->PAIS_ID,
								'DEPA_ID'=>$Personascreate->DEPA_ID,
								'MUNI_ID'=>$Personascreate->MUNI_ID,
								'PERS_CREATEBY'=>$Personascreate->PERS_CREATEBY,
								'PERS_UPDATEAT'=>$Personascreate->PERS_UPDATEAT,							
							);
				echo json_encode($array);
			}else{
				 $array = NULL;		
		         $array = array( 		                
								'info'=>'false',
								'PERS_IDENTIFICACION'=>$identificacion,
						       );
				 echo json_encode($array);
			}
		}		   
	} 

    /**
     * Lists all Empleados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpleadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
		$Personascreate = new Personascreate;
        $Personas = new Personas;
        $Empleados = new Empleados;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'Personascreate' => $Personascreate,
            'Personas' => $Personas,
            'Empleados' => $Empleados,
        ]);
    }

    /**
     * Displays a single Empleados model.
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
     * Creates a new Empleados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empleados();

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
        $identificacion = $_POST['Personascreate']['PERS_IDENTIFICACION'];
		$Personas = Personascreate::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->one();
		if(!$Personas){
		    $Personas = new Personascreate();
		}
		
		$model = new Empleados();
		  
        if ($Personas->load(Yii::$app->request->post())){
			$Personas->PERS_PATHIMG = UploadedFile::getInstance($Personas, 'PERS_PATHIMG');
			if($Personas->save()) {
				if($Personas->PERS_PATHIMG){
					$Personas->PERS_PATHIMG->saveAs(Yii::$app->basePath.'/web/uploads/personas/' . $Personas->PERS_PATHIMG->baseName . '.' . $Personas->PERS_PATHIMG->extension);
				}
				if ($model->load(Yii::$app->request->post())){
					$model->PERS_ID = $Personas->PERS_ID;
					if($model->save()) {          
					    print ('save');				    
					}else{				  
						    throw new NotFoundHttpException($model->getErrors());
						 }
				}else{
					print ('false');
				}
            }else{
					throw new NotFoundHttpException($Personas->getErrors());
				}
        }else{
				print ('false');
			 }
    }

    /**
     * Updates an existing Empleados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	public function actionGetdata($id)
	{
		$model=$this->findModel($id);
		$Personas = Personas::findOne($model->PERS_ID);
		
		$array = NULL;		
		$array = array( 		                
						'PERS_ID'=>$Personas->PERS_ID,
						'PERS_IDENTIFICACION'=>$Personas->PERS_IDENTIFICACION,
						'PERS_LUGAREXPEDICION'=>$Personas->PERS_LUGAREXPEDICION,
						'PERS_FECHAEXPEDICION'=>$Personas->PERS_FECHAEXPEDICION,
						'PERS_PRIMERNOMBRE'=>$Personas->PERS_PRIMERNOMBRE,
						'PERS_SEGUNDONOMBRE'=>$Personas->PERS_SEGUNDONOMBRE,
						'PERS_PRIMERAPELLIDO'=>$Personas->PERS_PRIMERAPELLIDO,
						'PERS_SEGUNDOAPELLIDO'=>$Personas->PERS_SEGUNDOAPELLIDO,
						'PERS_FECHANACIMIENTO'=>$Personas->PERS_FECHANACIMIENTO,
						'PERS_DIRECCION'=>$Personas->PERS_DIRECCION,
						'PERS_BARRIO'=>$Personas->PERS_BARRIO,
						'ZONA_ID'=>$Personas->ZONA_ID,
						'PERS_TELEFONO'=>$Personas->PERS_TELEFONO,
						'PERS_TELEFONOMOVIL'=>$Personas->PERS_TELEFONOMOVIL,
						'PERS_SENDSMS'=>$Personas->PERS_SENDSMS,
						'PERS_EMAIL'=>$Personas->PERS_EMAIL,
						'PERS_SENDMAIL'=>$Personas->PERS_SENDMAIL,
						'PERS_PATHIMG'=>$Personas->PERS_PATHIMG,
						'PERS_CUALOTRAEPS'=>$Personas->PERS_CUALOTRAEPS,
						'EPSS_ID'=>$Personas->EPSS_ID,
						'ESTR_ID'=>$Personas->ESTR_ID,
						'ESCI_ID'=>$Personas->ESCI_ID,
						'NIES_ID'=>$Personas->NIES_ID,
						'TIID_ID'=>$Personas->TIID_ID,
						'TIGE_ID'=>$Personas->TIGE_ID,
						'PAIS_ID'=>$Personas->PAIS_ID,
						'DEPA_ID'=>$Personas->DEPA_ID,
						'MUNI_ID'=>$Personas->MUNI_ID,
						'PERS_CREATEBY'=>$Personas->PERS_CREATEBY,
						'PERS_UPDATEAT'=>$Personas->PERS_UPDATEAT,						
												
						'EMPL_ID'=>$model->EMPL_ID,						
						'EMPL_FECHAINGRESO'=>$model->EMPL_FECHAINGRESO,
						'PERS_ID'=>$model->PERS_ID,
						'CARG_ID'=>$model->CARG_ID,
						'ESTA_ID'=>$model->ESTA_ID,
						'EMPL_CREATEBY'=>$model->EMPL_CREATEBY,
						'EMPL_UPDATEAT'=>$model->EMPL_UPDATEAT,
					);
		echo json_encode($array);		
	}
	
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Empleados']['EMPL_ID']);
        $Personas = Personas::findOne($model->PERS_ID);
		
        if ($Personas->load(Yii::$app->request->post())){
			$Personas->PERS_PATHIMG = UploadedFile::getInstance($Personas, 'PERS_PATHIMG');
			if($Personas->save()){ 
				if($Personas->PERS_PATHIMG){
					$Personas->PERS_PATHIMG->saveAs(Yii::$app->basePath.'/web/uploads/personas/' . $Personas->PERS_PATHIMG->baseName . '.' . $Personas->PERS_PATHIMG->extension);
				}
				if ($model->load(Yii::$app->request->post())){
					if($model->save()) {            
						print('save');
					}else{				  
							throw new NotFoundHttpException($model->getErrors());
						 }
				}
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
     * Deletes an existing Empleados model.
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
     * Finds the Empleados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleados::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
