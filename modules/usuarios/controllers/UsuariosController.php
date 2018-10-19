<?php

namespace app\modules\usuarios\controllers;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Personascreate;

use app\modules\usuarios\models\Usuarios;
use app\modules\usuarios\models\Usuarioscreate;
use app\modules\usuarios\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
		$nombre = $_POST['Personas']['PERS_PRIMERNOMBRE'];
		$apellido = $_POST['Personas']['PERS_PRIMERAPELLIDO'];
		
		$model = Personascreate::find()
		                    ->alias('t')
							->select('t.*')	
							->andFilterWhere(['like', 'PERS_IDENTIFICACION', $identificacion])
							->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $nombre])
							->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $apellido])
							->innerJoin('TBL_USUSUARIOS u', 'u.PERS_ID = t.PERS_ID')
							->one();
			
		if($model){					
		    $array = NULL;		
			$array = array( 		                
							'info'=>'true',
						   );
			echo json_encode($array);
		}else{
			$Personascreate = Personascreate::find()
		                    ->alias('t')
							->select('t.*')
							->andFilterWhere(['like', 'PERS_IDENTIFICACION', $identificacion])
							->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $nombre])
							->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $apellido])
							->one();
			if($Personascreate){				
				$array = NULL;		
				$array = array( 		                
								'info'=>'person',
								'PERS_ID'=>$Personascreate->PERS_ID,
								'PERS_IDENTIFICACION'=>$Personascreate->PERS_IDENTIFICACION,
								'PERS_PRIMERNOMBRE'=>$Personascreate->PERS_PRIMERNOMBRE,
								'PERS_PRIMERAPELLIDO'=>$Personascreate->PERS_PRIMERAPELLIDO,							
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
	}

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;
		$Personascreate = new Personascreate;
		$Usuarioscreate = new Usuarioscreate;
        $Personas = new Personas;
        $Usuarios = new Usuarios;
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'Personascreate' => $Personascreate,
            'Personas' => $Personas,
            'Usuarios' => $Usuarios,
            'Usuarioscreate' => $Usuarioscreate,
        ]);
    }

    /**
     * Displays a single Usuarios model.
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
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuarios();

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
        		
		$model = new Usuarioscreate();
        if ($model->load(Yii::$app->request->post())){
			if(!$model->findByUsername($model->USUA_USUARIO)){
				if($model->validarContrasenia($model->USUA_CLAVE)==true){					
					$pass = strtoupper($model->USUA_CLAVE);
				    $newSession = $model->generateSalt();
					$model->USUA_CLAVE = $model->hashPassword($pass, $newSession);
			        $model->USUA_SESSION = $newSession;
					if($model->save()) {            
						print ('save');	
					}else{				  
							throw new NotFoundHttpException($model->getErrors());
						 }
				}else{ 
					  print ('false');
					  //Yii::$app->user->setFlash('warning','<strong>Su contraseña es inválida :( <br>Por favor escriba una contraseña que contenta las siguientes características: <br> >Caracteres máximos permitidos: 4. <br> >Sólo números. <br> >Sólo letras.<br> >Combinación de letras y números.</strong>');												
				    }		 
			}else{				  
						throw new NotFoundHttpException($model->getErrors());
				 }		 
        }
    }

    /**
     * Updates an existing Usuarios model.
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
						'PERS_PRIMERNOMBRE'=>$Personas->PERS_PRIMERNOMBRE,						
						'PERS_PRIMERAPELLIDO'=>$Personas->PERS_PRIMERAPELLIDO,
						
						'USUA_ID'=>$model->USUA_ID,
						'USUA_USUARIO'=>$model->USUA_USUARIO,
						'USUA_ULTIMOACCESO'=>$model->USUA_ULTIMOACCESO,
						'USES_ID'=>$model->USES_ID,
						'USPE_ID'=>$model->USPE_ID,
						'PERS_ID'=>$model->PERS_ID,
						'USUA_FECHACAMBIO'=>$model->USUA_FECHACAMBIO,
						'USUA_REGISTRADOPOR'=>$model->USUA_REGISTRADOPOR,
					);
		echo json_encode($array);
	}
	 
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Usuarios']['USUA_ID']);
        $oldPass = $model->USUA_CLAVE;
		$oldSession = $model->USUA_SESSION;
		
		if ($model->load(Yii::$app->request->post())){			
			$pass = $_POST["Usuarios"]["USUA_CLAVE"];
			if($pass!=""){			
				if($model->validarContrasenia($model->USUA_CLAVE)==true){					
					$pass = strtoupper($model->USUA_CLAVE);
				    $newSession = $model->generateSalt();
					$model->USUA_CLAVE = $model->hashPassword($pass, $newSession);
			        $model->USUA_SESSION = $newSession;
					if($model->save()) {            
						print ('save');	
					}else{				  
							throw new NotFoundHttpException($model->getErrors());
						 }
				}else{ 
					  print ('false');
					 }		 
			}else{
				    $model->USUA_CLAVE = $oldPass;
			        $model->USUA_SESSION = $oldSession;
					if($model->save()) {            
						print ('save');	
					}else{				  
							throw new NotFoundHttpException($model->getErrors());
						 }
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
     * Deletes an existing Usuarios model.
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
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
