<?php

namespace app\modules\afiliaciones\controllers;

use Yii;
use app\modules\configuration\models\Planes;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\PersonasSearch;
use app\modules\configuration\models\Personascreate;

use app\modules\afiliaciones\models\Afiliados;
use app\modules\afiliaciones\models\AfiliadosSearch;

use app\modules\afiliaciones\models\Beneficiarios;
use app\modules\afiliaciones\models\BeneficiariosSearch;

use app\modules\afiliaciones\models\Pagos;
use app\modules\afiliaciones\models\PagosSearch;

use app\modules\afiliaciones\models\Cuentasbancarias;
use app\modules\afiliaciones\models\CuentasbancariasSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AfiliadosController implements the CRUD actions for Afiliados model.
 */
class AfiliadosController extends Controller
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
     * Lists all Afiliados models.
     * @return mixed
     */
	 
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
	
    public function actionIndex()
    {
        $searchModel = new AfiliadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
        $Personascreate = new Personascreate;
        $Personas = new Personas;
        $Afiliados = new Afiliados;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Personascreate' => $Personascreate,
            'Personas' => $Personas,
            'Afiliados' => $Afiliados,
        ]);
    }
	
	public function actionViewall()
    {        
		
        $Personas = new Personas;		
		$searchModel = new PersonasSearch();		
		$dataProvider = $searchModel->buscar(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
		$Afiliados = new Afiliados;
		
        return $this->render('viewall', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
            'Personas' => $Personas,
            'Afiliados' => $Afiliados,
        ]);
    }

    /**
     * Displays a single Afiliados model.
     * @param integer $id
     * @return mixed
     */
	
    public function actionDownloader($id)
    {
        $Afiliados = $this->findModel($id); 
		
		return $this->render('report_afiliado', [
            'Afiliados' => $Afiliados,
        ]);
    }
	
	public function actionDownload($id)
    {		
		return $this->redirect(['downloader', 'id' => $id]);		
    }
	
	public function actionView($id)
    {
        $Afiliados = $this->findModel($id); 
		$Personas = Personas::findOne($Afiliados->PERS_ID);
		$Personascreate = new Personascreate;
		 
		$searchModel = new BeneficiariosSearch();
		$searchModel->AFIL_ID = $Afiliados->AFIL_ID;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
		$Beneficiarios = new Beneficiarios();
		$Beneficiarios->AFIL_ID = $Afiliados->AFIL_ID;
		
		$searchModelPagos = new PagosSearch();
		$searchModelPagos->AFIL_ID = $Afiliados->AFIL_ID;
        $dataProviderPagos = $searchModelPagos->search(Yii::$app->request->queryParams);
		$dataProviderPagos->pagination->pageSize=10;
		$Pagos = new Pagos();
		$Pagos->AFIL_ID = $Afiliados->AFIL_ID;
		
		$searchModelCuentasbancarias = new CuentasbancariasSearch();
		$searchModelCuentasbancarias->AFIL_ID = $Afiliados->AFIL_ID;
        $dataProviderCuentasbancarias = $searchModelCuentasbancarias->search(Yii::$app->request->queryParams);
		$dataProviderCuentasbancarias->pagination->pageSize=10;
		$Cuentasbancarias = new Cuentasbancarias();
		$Cuentasbancarias->AFIL_ID = $Afiliados->AFIL_ID;
		
		if (Yii::$app->request->isPost) {
			if (Yii::$app->request->post('btn-reports-download')) {				   
				$opcion = $_POST["Afiliados"]["AFIL_OPCION"];
			    if($opcion==1){				   
				    return $this->render('report_afiliado', [
						'Afiliados' => $Afiliados,
				    ]);
			   }
			}
			
			if (Yii::$app->request->post('btn-reports-sendmail')) {
			    $opcion = $_POST["Afiliados"]["AFIL_OPCION"];
			    if($opcion==1){				   
					return $this->render('generate_report_afiliado', [
						'Afiliados' => $Afiliados,
					]);
			   }
			} 
		}				
		
		
		return $this->render('view', [
            'Afiliados' => $Afiliados,
            'Personas' => $Personas,
            'Personascreate' => $Personascreate,
            
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Beneficiarios' => $Beneficiarios,
			
            'searchModelPagos' => $searchModelPagos,
            'dataProviderPagos' => $dataProviderPagos,
            'Pagos' => $Pagos,
			
			'searchModelCuentasbancarias' => $searchModelCuentasbancarias,
            'dataProviderCuentasbancarias' => $dataProviderCuentasbancarias,
            'Cuentasbancarias' => $Cuentasbancarias,
        ]);
    }

    /**
     * Creates a new Afiliados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Afiliados();

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
		
		$model = new Afiliados();
		  
        if ($Personas->load(Yii::$app->request->post())){
			if($Personas->save()) {
				if ($model->load(Yii::$app->request->post())){
					$model->PERS_ID = $Personas->PERS_ID;
					if($model->save()) {          
					    print ('save');						
					    $this->redirect(['view', 'id' => $model->AFIL_ID]);
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
     * Updates an existing Afiliados model.
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
												
						'AFIL_ID'=>$model->AFIL_ID,						
						'AFIL_FECHAINGRESO'=>$model->AFIL_FECHAINGRESO,
						'PERS_ID'=>$model->PERS_ID,
						'TIPL_ID'=>$model->TIPL_ID,
						'PLAN_ID'=>$model->PLAN_ID,
						'ESAF_ID'=>$model->ESAF_ID,
						'AFIL_PERSONACONTACTO'=>$model->AFIL_PERSONACONTACTO,
						'AFIL_PARENTESCOPERSONACONTACTO'=>$model->AFIL_PARENTESCOPERSONACONTACTO,
						'AFIL_MOVILPERSONACONTACTO'=>$model->AFIL_MOVILPERSONACONTACTO,
						'AFIL_FIJOPERSONACONTACTO'=>$model->AFIL_FIJOPERSONACONTACTO,
						'AFIL_ASESOR'=>$model->AFIL_ASESOR,
						'AFIL_CREATEBY'=>$model->AFIL_CREATEBY,
						'AFIL_UPDATEAT'=>$model->AFIL_UPDATEAT,
					);
		echo json_encode($array);
	}
	
	
	public function actionGetdataview($id)
	{
		
		$model=$this->findModel($id);
		$Personas = Personas::findOne($model->PERS_ID);
		
		$array = NULL;		
		$array = array( 		                
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
						'ZONA_ID'=>$Personas->zonas->ZONA_NOMBRE,
						'PERS_TELEFONO'=>$Personas->PERS_TELEFONO,
						'PERS_TELEFONOMOVIL'=>$Personas->PERS_TELEFONOMOVIL,
						'PERS_EMAIL'=>$Personas->PERS_EMAIL,
						'PERS_CUALOTRAEPS'=>$Personas->PERS_CUALOTRAEPS,
						'EPSS_ID'=>$Personas->epss->EPSS_NOMBRE,
						'ESTR_ID'=>$Personas->estractos->ESTR_NOMBRE,
						'ESCI_ID'=>$Personas->estadosciviles->ESCI_NOMBRE,
						'NIES_ID'=>$Personas->nivelesestudios->NIES_NOMBRE,
						'TIID_ID'=>$Personas->tiposidentificaciones->TIID_NOMBRE,
						'TIGE_ID'=>$Personas->genero->TIGE_NOMBRE,						
												
										
						'AFIL_FECHAINGRESO'=>$model->AFIL_FECHAINGRESO,
						'TIPL_ID'=>$model->tipoplan->TIPL_NOMBRE,
						'PLAN_ID'=>$model->planes->PLAN_NOMBRE,
						'ESAF_ID'=>$model->estadoafiliado->ESAF_NOMBRE,
						'AFIL_PERSONACONTACTO'=>$model->AFIL_PERSONACONTACTO,
						'AFIL_PARENTESCOPERSONACONTACTO'=>$model->AFIL_PARENTESCOPERSONACONTACTO,
						'AFIL_MOVILPERSONACONTACTO'=>$model->AFIL_MOVILPERSONACONTACTO,
						'AFIL_FIJOPERSONACONTACTO'=>$model->AFIL_FIJOPERSONACONTACTO,
						'AFIL_ASESOR'=>$model->AFIL_ASESOR,
					);
		echo json_encode($array);
	}
	
	public function actionGetalldataview($id)
	{
		
		$Personas = Personas::findOne($id);
	
		$model = Afiliados::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $Personas->PERS_ID])->one();
		
		$array = NULL;		
		$array = array( 		                
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
						'ZONA_ID'=>$Personas->zonas->ZONA_NOMBRE,
						'PERS_TELEFONO'=>$Personas->PERS_TELEFONO,
						'PERS_TELEFONOMOVIL'=>$Personas->PERS_TELEFONOMOVIL,
						'PERS_EMAIL'=>$Personas->PERS_EMAIL,
						'PERS_CUALOTRAEPS'=>$Personas->PERS_CUALOTRAEPS,
						'EPSS_ID'=>$Personas->epss->EPSS_NOMBRE,
						'ESTR_ID'=>$Personas->estractos->ESTR_NOMBRE,
						'ESCI_ID'=>$Personas->estadosciviles->ESCI_NOMBRE,
						'NIES_ID'=>$Personas->nivelesestudios->NIES_NOMBRE,
						'TIID_ID'=>$Personas->tiposidentificaciones->TIID_NOMBRE,
						'TIGE_ID'=>$Personas->genero->TIGE_NOMBRE,						
												
										
						'AFIL_FECHAINGRESO'=>$model->AFIL_FECHAINGRESO,
						'TIPL_ID'=>$model->tipoplan->TIPL_NOMBRE,
						'PLAN_ID'=>$model->planes->PLAN_NOMBRE,
						'ESAF_ID'=>$model->estadoafiliado->ESAF_NOMBRE,
						'AFIL_PERSONACONTACTO'=>$model->AFIL_PERSONACONTACTO,
						'AFIL_PARENTESCOPERSONACONTACTO'=>$model->AFIL_PARENTESCOPERSONACONTACTO,
						'AFIL_MOVILPERSONACONTACTO'=>$model->AFIL_MOVILPERSONACONTACTO,
						'AFIL_FIJOPERSONACONTACTO'=>$model->AFIL_FIJOPERSONACONTACTO,
						'AFIL_ASESOR'=>$model->AFIL_ASESOR,
					);
		echo json_encode($array);
	} 
	 
	public function actionSearchdata()
	{
		
		$identificacion = $_POST['Personas']['PERS_IDENTIFICACION'];
		
		$Titulares = Personas::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->innerJoin('TBL_AFILIADOS a', 'a.PERS_ID = t.PERS_ID')
							->one();
							
		$Beneficiarios = Personas::find()
						    ->alias('t')
							->select('t.*, a.PERS_ID')
							->where(['t.PERS_IDENTIFICACION' => $identificacion])
							->innerJoin('TBL_BENEFICIARIOS b', 't.PERS_ID = b.PERS_ID')
							->innerJoin('TBL_AFILIADOS a', 'b.AFIL_ID = a.AFIL_ID')
							->one();
							
		if($Titulares){		
			$model = Afiliados::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $Titulares->PERS_ID])->one();
			
			$array = NULL;		
			$array = array( 		                
							'info'=>'titulares',
							'PERS_IDENTIFICACION'=>$Titulares->PERS_IDENTIFICACION,							
							'PERS_PRIMERNOMBRE'=>$Titulares->PERS_PRIMERNOMBRE,
							'PERS_SEGUNDONOMBRE'=>$Titulares->PERS_SEGUNDONOMBRE,
							'PERS_PRIMERAPELLIDO'=>$Titulares->PERS_PRIMERAPELLIDO,
							'PERS_SEGUNDOAPELLIDO'=>$Titulares->PERS_SEGUNDOAPELLIDO,
							'TIID_ID'=>$Titulares->tiposidentificaciones->TIID_NOMBRE,									
							
							'TIPL_ID'=>$model->tipoplan->TIPL_NOMBRE,
							'PLAN_ID'=>$model->planes->PLAN_NOMBRE,
							'ESAF_ID'=>$model->estadoafiliado->ESAF_NOMBRE,
						);
			echo json_encode($array);
		}else if($Beneficiarios){
			$model = Afiliados::find()->alias('t')->select('t.*')->where(['t.PERS_ID' => $Beneficiarios->PERS_ID])->one();
			$array = NULL;		
			$array = array( 		                
							'info'=>'beneficiario',
							'PERS_IDENTIFICACION'=>$Beneficiarios->PERS_IDENTIFICACION,							
							'PERS_PRIMERNOMBRE'=>$Beneficiarios->PERS_PRIMERNOMBRE,
							'PERS_SEGUNDONOMBRE'=>$Beneficiarios->PERS_SEGUNDONOMBRE,
							'PERS_PRIMERAPELLIDO'=>$Beneficiarios->PERS_PRIMERAPELLIDO,
							'PERS_SEGUNDOAPELLIDO'=>$Beneficiarios->PERS_SEGUNDOAPELLIDO,
							'TIID_ID'=>$Beneficiarios->tiposidentificaciones->TIID_NOMBRE,									
							
							'TIPL_ID'=>$model->tipoplan->TIPL_NOMBRE,
							'PLAN_ID'=>$model->planes->PLAN_NOMBRE,
							'ESAF_ID'=>$model->estadoafiliado->ESAF_NOMBRE,
							
						);
			echo json_encode($array);
		
		}else{
			$array = NULL;		
			$array = array( 		                
							'info'=>'false',
						   );
			echo json_encode($array);
		}
	} 
	 
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Afiliados']['AFIL_ID']);
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
     * Deletes an existing Afiliados model.
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
     * Finds the Afiliados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Afiliados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Afiliados::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionGetplanes($id)
	{
	    $Planes=Planes::find()->alias('t')->select('t.*')->where(['t.TIPL_ID' => $id])->all();	 
	    if (!empty($Planes)){
			echo '<option value="">Seleccionar plan</option>';
			foreach($Planes as $Plan) {
				echo '<option value="'.$Plan->PLAN_ID.'">'.$Plan->PLAN_NOMBRE.' -- $'.number_format($Plan->PLAN_VALOR).'</option>';
			}
	    }else {
			echo "<option>---</option>";
		}
	}
}
