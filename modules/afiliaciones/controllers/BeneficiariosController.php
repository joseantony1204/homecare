<?php

namespace app\modules\afiliaciones\controllers;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Personascreate;

use app\modules\afiliaciones\models\Afiliados;
use app\modules\afiliaciones\models\Beneficiarios;
use app\modules\afiliaciones\models\BeneficiariosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BeneficiariosController implements the CRUD actions for Beneficiarios model.
 */
class BeneficiariosController extends Controller
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
     * Lists all Beneficiarios models.
     * @return mixed
     */
	public function actionSearch()
	{
		$identificacion = $_POST['Personas']['PERS_IDENTIFICACION'];
		$model = Personascreate::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->innerJoin('TBL_BENEFICIARIOS b', 'b.PERS_ID = t.PERS_ID')
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
	
    public function actionIndex()
    {
        $searchModel = new BeneficiariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
        $Beneficiarios = new Beneficiarios;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Beneficiarios' => $Beneficiarios,
        ]);
    }

    /**
     * Displays a single Beneficiarios model.
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
     * Creates a new Beneficiarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beneficiarios();

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
		
		$model = new Beneficiarios();
		  
        if ($Personas->load(Yii::$app->request->post())){
			if($Personas->save()) {
				if ($model->load(Yii::$app->request->post())){
					$model->PERS_ID = $Personas->PERS_ID;
					if($model->save()) {            
						print('save');
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
     * Updates an existing Beneficiarios model.
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
						
						'BENE_ID'=>$model->BENE_ID,						
						'BENE_FECHAINGRESO'=>$model->BENE_FECHAINGRESO,
						'PERS_ID'=>$model->PERS_ID,
						'AFIL_ID'=>$model->AFIL_ID,						
						'BENE_CREATEBY'=>$model->BENE_CREATEBY,
						'BENE_UPDATEAT'=>$model->BENE_UPDATEAT,
					);
		echo json_encode($array);
	} 

	
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Beneficiarios']['BENE_ID']);
        $Personas = Personas::findOne($model->PERS_ID);
		
        if ($Personas->load(Yii::$app->request->post())){
			if($Personas->save()){ 
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
     * Deletes an existing Beneficiarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
	public function actionDelete($id)
    {
        $model = $this->findModel($id);
		$Afiliados = Afiliados::find()->alias('t')->select('t.*')->where(['t.AFIL_ID' => $model->AFIL_ID])->one();
        $model->delete();
		return $this->redirect(['/afiliaciones/afiliados/view', 'id' => $Afiliados->AFIL_ID]);		
    }

    /**
     * Finds the Beneficiarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Beneficiarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Beneficiarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
