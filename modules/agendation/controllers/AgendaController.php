<?php

namespace app\modules\agendation\controllers;

use Yii;
use app\modules\agendation\models\Agenda;
use app\modules\agendation\models\AgendaSearch;
use app\modules\agendation\models\Citas;

use app\modules\configuration\models\Servicios;
use app\modules\configuration\models\Empleados;
use app\modules\configuration\models\Tiposfinalidades;

use app\modules\configuration\models\Personas;
use app\modules\configuration\models\PersonasSearch;

use app\modules\usuarios\models\Usuarios;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * AgendaController implements the CRUD actions for Agenda model.
 */
class AgendaController extends Controller
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
                'only' => ['create', 'getagenda', 'index', 'myagend', 'today', 'update', 'delete'], /*controlar acceso para estas vistas*/
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['create', 'getagenda', 'index', 'myagend', 'today', 'update', 'delete'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'getagenda', 'index', 'myagend', 'today', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
	
	public function actionGetagendamedico($id,$fecha,$start=NULL,$end=NULL,$_=NULL){

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
		$Citas = Citas::find()
		                    ->alias('t')
							->select('t.*, ct.CITU_HORARIPS, f.CIFI_NOMBRE, cm.CIMI_NOMBRE, pp.PEPA_NOMBRE1, pp.PEPA_APELLIDO1')				
							->where(['ceh.PEEM_ID' => $id])
							->andWhere(['like', 't.CITA_FECHA', $fecha])							
							->andWhere(['<>','f.CIFI_ID', 401])
							->andWhere(['<>','f.CIFI_ID', 402])
							->andWhere(['<>','f.CIFI_ID', 8])
							->innerJoin('TBL_CITASPEEMHORA ceh', 'ceh.EMHO_ID = t.EMHO_ID')
							->innerJoin('TBL_CITASHORARIOS ch', 'ch.CIHO_ID = ceh.CIHO_ID')
							->innerJoin('TBL_CITASTURNOS ct', 'ct.CITU_ID = ch.CITU_ID')							
							->innerJoin('TBL_CITASMINUTOS cm', 'cm.CIMI_ID = ct.CIMI_ID')							
							->innerJoin('TBL_CITASFINALIDADES f', 't.CIFI_ID = f.CIFI_ID')							
							->innerJoin('TBL_PERSONASPACIENTES pp', 't.PEPA_ID = pp.PEPA_ID')							
							->all();
							
		$task = [];
        $draggable = "fc-draggable fc-resizable";
		foreach($Citas as $Cita){		
			
			$horaI = $Cita->CITU_HORARIPS;
			$min = "00:".$Cita->CIMI_NOMBRE.":00";		
			$horaF = $this->SumaHoras($horaI,$min);
			
			$title = $Cita->CIFI_NOMBRE . " -- " . $Cita->PEPA_NOMBRE1 . " -- " . $Cita->PEPA_APELLIDO1;
			
			$Event = new \yii2fullcalendar\models\Event();
			$Event->id = $Cita->CITA_ID;
			$Event->title = $title;
			$Event->backgroundColor = 'btn';
			$Event->editable = false;
			$Event->className = $draggable;
			$Event->start = date('Y-m-d\TH:i:s\Z',strtotime($Cita->CITA_FECHA.' '.$horaI));
		    $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($Cita->CITA_FECHA.' '.$horaF));
			$task[] = $Event;
		
	
		}
		
		
		$Agendas = Agenda::find()
		                    ->alias('t')
							->select('t.*, a.*')				
							->where(['t.EMPL_ID' => $id])
							->innerJoin('TBL_PERSONAS p', 'p.PERS_ID = t.PERS_ID')
							->innerJoin('TBL_AFILIADOS a', 'a.PERS_ID = p.PERS_ID')
							->all();
							
		//$task = [];
        $draggable = "booked";
		foreach ($Agendas AS $agenda){
			$details = $agenda->AGEN_ID . " -- " . $agenda->EMPL_ID . " -- " . $agenda->ESCI_ID;
			
			
			$Event = new \yii2fullcalendar\models\Event();
			$Event->id = $agenda->AGEN_ID;
			$Event->title = $agenda->PERS_PRIMERNOMBRE." ".$agenda->PERS_PRIMERAPELLIDO." ".$agenda->PERS_SEGUNDOAPELLIDO;
			$Event->backgroundColor = 'btn';
			$Event->editable = false;
			//$Event->description = $details;
			$Event->className = $draggable;
			$Event->color   = '#59BF2E';
			$Event->textColor   = '#59BF2E';
			$Event->start = date('Y-m-d\TH:i:s\Z',strtotime($agenda->AGEN_FECHA.' '.$agenda->AGEN_HORAINICIO));
		    $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($agenda->AGEN_FECHA.' '.$agenda->AGEN_HORAFINAL));
			$task[] = $Event;
		}

		return $task;
	}
	
	public function actionGetagenda($start=NULL,$end=NULL,$_=NULL){

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		
		$Agendas = Agenda::find()
		                    ->alias('t')
							->select('t.*, a.*')				
							->innerJoin('TBL_PERSONAS p', 'p.PERS_ID = t.PERS_ID')
							->innerJoin('TBL_AFILIADOS a', 'a.PERS_ID = p.PERS_ID')
							->all();

		$task = [];
        $draggable = "fc-draggable fc-resizable";
		foreach ($Agendas AS $agenda){
			$details = $agenda->AGEN_ID . " -- " . $agenda->EMPL_ID . " -- " . $agenda->ESCI_ID;
			
			$Event = new \yii2fullcalendar\models\Event();
			$Event->id = $agenda->AGEN_ID;
			$Event->title = $agenda->PERS_PRIMERNOMBRE." ".$agenda->PERS_PRIMERAPELLIDO." ".$agenda->PERS_SEGUNDOAPELLIDO;
			$Event->backgroundColor = 'btn';
			$Event->editable = false;
			//$Event->description = $details;
			$Event->className = $draggable;
			$Event->start = date('Y-m-d\TH:i:s\Z',strtotime($agenda->AGEN_FECHA.' '.$agenda->AGEN_HORAINICIO));
		    $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($agenda->AGEN_FECHA.' '.$agenda->AGEN_HORAFINAL));
			$task[] = $Event;
		}

		return $task;
	}	

    /**
     * Lists all Agenda models.
     * @return mixed
     */
    public function actionIndex()
    {        
		
        $Agenda = new Agenda;
        $Personas = new Personas;		
		$searchModel = new PersonasSearch();
		
		if(Yii::$app->request->queryParams){
			$dataProvider = $searchModel->buscar(Yii::$app->request->queryParams);
			$dataProvider->pagination->pageSize=10;
		}else{
			$searchModel->PERS_ID = -1;
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			$dataProvider->pagination->pageSize=10;
		}			
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Agenda' => $Agenda,
            'Personas' => $Personas,
        ]);
    }
	
	public function actionMyagend()
    {        
		$Usuarios = Usuarios::find()->alias('t')->select('t.*')->where(['t.USUA_ID' =>Yii::$app->user->getId()])->one();
		$Empleados = Empleados::find()->alias('t')->select('t.*')->where(['t.PERS_ID' =>$Usuarios->PERS_ID])->one();
		
		$searchModel = new AgendaSearch();
		$searchModel->EMPL_ID = $Empleados->EMPL_ID;
		
		if(Yii::$app->request->queryParams){
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}else{
			$searchModel->AGEN_FECHA = date("Y-m-d");
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}
		
		$dataProvider->pagination->pageSize=10;
        $Agenda = new Agenda;		
		
        return $this->render('myagend', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Agenda' => $Agenda,
        ]);
    }
	
	public function actionToday()
    {        
		$searchModel = new AgendaSearch();
		
		if(Yii::$app->request->queryParams){
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}else{
			$searchModel->AGEN_FECHA = date("Y-m-d");
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}
		
		$dataProvider->pagination->pageSize=10;
        $Agenda = new Agenda;		
		
        return $this->render('today', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Agenda' => $Agenda,
        ]);
    }

    /**
     * Displays a single Agenda model.
     * @param integer $id
     * @return mixed
     */
    public function actionGetcitas()
    {
        $Citas = Citas::find()
		                    ->alias('t')
							->select('t.*, ct.CITU_HORARIPS, f.CIFI_NOMBRE, cm.CIMI_NOMBRE, pp.PEPA_NOMBRE1, pp.PEPA_APELLIDO1')
							->where(['ceh.PEEM_ID' => 339])
							->andWhere(['like', 't.CITA_FECHA', '2018-09-04'])
							->andWhere(['<>','f.CIFI_ID', 401])
							->andWhere(['<>','f.CIFI_ID', 402])
							->innerJoin('TBL_CITASPEEMHORA ceh', 'ceh.EMHO_ID = t.EMHO_ID')
							->innerJoin('TBL_CITASHORARIOS ch', 'ch.CIHO_ID = ceh.CIHO_ID')
							->innerJoin('TBL_CITASTURNOS ct', 'ct.CITU_ID = ch.CITU_ID')							
							->innerJoin('TBL_CITASMINUTOS cm', 'cm.CIMI_ID = ct.CIMI_ID')							
							->innerJoin('TBL_CITASFINALIDADES f', 't.CIFI_ID = f.CIFI_ID')							
							->innerJoin('TBL_PERSONASPACIENTES pp', 't.PEPA_ID = pp.PEPA_ID')							
							->all();
		$i = 1;
		foreach($Citas as $Cita){		
			
			$horaI = $Cita->CITU_HORARIPS;
			$min = "00:".$Cita->CIMI_NOMBRE.":00";		
			$horaF = $this->SumaHoras($horaI,$min);
			$title = $Cita->CIFI_NOMBRE . " -- " . $Cita->PEPA_NOMBRE1 . " -- " . $Cita->PEPA_APELLIDO1;
			echo $i.' - '.$Cita->CIFI_NOMBRE.' -> : '.$title.' -> : '.$Cita->CITU_HORARIPS.' : '.$horaF.' <br>';
		
		$i++;
		}
		
    }   
	
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Agenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Agenda();

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
        		
		$model = new Agenda();
		$Personas = Personas::findOne($_POST["Agenda"]["PERS_ID"]);  
        if ($Personas->load(Yii::$app->request->post())){
			if($Personas->save()) {
				if ($model->load(Yii::$app->request->post())){
					$msj = $model->validar($model);
					
					if($msj['info']=='true'){
						$model->AGEN_TOKEN = strtoupper(substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15));
						
						if($model->save()) {            
							if($Personas->PERS_SENDMAIL==1){
								$model->sendmail($model);
							}
							if($Personas->PERS_SENDSMS==1){
								$model->sendsms($model);
							}						
							print('save');
						}else{				  
								throw new NotFoundHttpException($model->getErrors());
							 }
					}else{					  
						  print ($msj['msj']);
					     }
				}else{
					print ('false');
				}
		    }else{
					throw new NotFoundHttpException($model->getErrors());
				 }
		}else{
			  print ('false');
			 }
    }

    /**
     * Updates an existing Agenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	public function actionGettiposservicios()
	{
	    $Tiposfinalidades=Tiposfinalidades::find()->all();	 
	    if (!empty($Tiposfinalidades)){
			echo '<option value="">Seleccionar tipo de servicio</option>';
			foreach($Tiposfinalidades as $Tipofinalidad) {
				echo '<option value="'.$Tipofinalidad->TIFI_ID.'">'.$Tipofinalidad->TIFI_NOMBRE.'</option>';
			}
	    }else {
			echo "<option>---</option>";
		}
	}
	
	public function actionGetservicios($id)
	{
	    $Servicios=Servicios::find()->alias('t')->select('t.*')->where(['t.TIFI_ID' => $id])->all();	 
	    if (!empty($Servicios)){
			echo '<option value="">Seleccionar servicio</option>';
			foreach($Servicios as $Servicio) {
				echo '<option value="'.$Servicio->FINA_ID.'">'.$Servicio->FINA_NOMBRE.'</option>';
			}
	    }else {
			echo "<option>---</option>";
		}
	}
	
	public function actionGetmedicos($id,$fecha)
	{
		$Empleados = Empleados::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.CARG_ID' => 4])
							->all();
		
	    if (!empty($Empleados)){
			echo '<option value="">Seleccionar profesional</option>';
			foreach($Empleados as $Empleado) {
				echo '<option value="'.$Empleado->EMPL_ID.'">'.$Empleado->persona->PERS_PRIMERNOMBRE.' '.$Empleado->persona->PERS_SEGUNDONOMBRE.' '.$Empleado->persona->PERS_PRIMERAPELLIDO.' '.$Empleado->persona->PERS_SEGUNDOAPELLIDO.'</option>';
			}
	    }else {
			echo "<option>---</option>";
		}
	}
	
	public function actionGetafiliado($id)
	{
		
		$Personas = Personas::find()
		                    ->alias('t')
							->select('t.*')
							->where(['t.PERS_ID' => $id])
							->one();
							
		if(($Personas)){				
			$array = NULL;		
			$array = array( 
							'PERS_ID'=>$Personas->PERS_ID,
							'PERS_IDENTIFICACION'=>$Personas->PERS_IDENTIFICACION,
							'PERS_PRIMERNOMBRE'=>$Personas->PERS_PRIMERNOMBRE,
							'PERS_SEGUNDONOMBRE'=>$Personas->PERS_SEGUNDONOMBRE,
							'PERS_PRIMERAPELLIDO'=>$Personas->PERS_PRIMERAPELLIDO,
							'PERS_SEGUNDOAPELLIDO'=>$Personas->PERS_SEGUNDOAPELLIDO,
							'PERS_FECHANACIMIENTO'=>$Personas->PERS_FECHANACIMIENTO,
							'PERS_DIRECCION'=>$Personas->PERS_DIRECCION,
							'PERS_TELEFONOMOVIL'=>$Personas->PERS_TELEFONOMOVIL,
							'PERS_SENDSMS'=>$Personas->PERS_SENDSMS,
							'PERS_EMAIL'=>$Personas->PERS_EMAIL,						
							'PERS_SENDMAIL'=>$Personas->PERS_SENDMAIL,						
						 );	
		    echo json_encode($array);		
	    } 
	} 
	
	public function actionGetdata($id)
	{
		$model=$this->findModel($id);
		echo json_encode($model->attributes);		
	} 
	 
	public function actionUpdateajax()
    {
        $model = $this->findModel($_POST['Agenda']['AGEN_ID']);
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
     * Deletes an existing Agenda model.
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
     * Finds the Agenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agenda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	function parteHora( $hora ){
	$horaSplit = explode(":", $hora);
		if( count($horaSplit) < 3 ){
			$horaSplit[2] = 0;
		}
	return $horaSplit;
    }
     
     
    function SumaHoras( $time1, $time2 ){
        list($hour1, $min1, $sec1) = $this->parteHora($time1);
        list($hour2, $min2, $sec2) = $this->parteHora($time2);
        return date('H:i:s', mktime( $hour1 + $hour2, $min1 + $min2, $sec1 + $sec2));
    }
}
