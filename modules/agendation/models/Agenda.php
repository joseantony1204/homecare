<?php

namespace app\modules\agendation\models;

use Yii;

use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Empleados;
use app\modules\configuration\models\Servicios;
use app\modules\configuration\models\Estadoscitas;
use app\modules\agendation\models\Agenda;

/**
 * This is the model class for table "TBL_AGENDA".
 *
 * @property integer $AGEN_ID
 * @property string $AGEN_FECHAPROCESO
 * @property string $AGEN_FECHA
 * @property string $AGEN_HORAINICIO
 * @property string $AGEN_HORAFINAL
 * @property integer $FINA_ID
 * @property integer $PERS_ID
 * @property integer $EMPL_ID
 * @property integer $ESCI_ID
 * @property integer $AGEN_CREATEBY
 * @property string $AGEN_UPDATEAT
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_SEGUNDONOMBRE, $PERS_PRIMERAPELLIDO, $PERS_SEGUNDOAPELLIDO;
    public $TIFI_ID;	
    public static function tableName()
    {
        return 'TBL_AGENDA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AGEN_TOKEN', 'AGEN_FECHAPROCESO', 'AGEN_FECHA', 'AGEN_HORAINICIO', 'AGEN_HORAFINAL', 'FINA_ID', 'PERS_ID', 'EMPL_ID', 'ESCI_ID', 'AGEN_CREATEBY', 'AGEN_UPDATEAT'], 'required'],
            [['AGEN_FECHAPROCESO', 'AGEN_FECHA', 'AGEN_HORAINICIO', 'AGEN_HORAFINAL', 'AGEN_UPDATEAT'], 'safe'],
            [['FINA_ID', 'PERS_ID', 'EMPL_ID', 'ESCI_ID', 'AGEN_CREATEBY'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AGEN_ID' => 'ID',
            'AGEN_TOKEN' => 'TOKEN',
            'AGEN_FECHAPROCESO' => 'F. Solicitud',
            'AGEN_FECHA' => 'Fecha',
            'AGEN_HORAINICIO' => 'Hora Inicio',
            'AGEN_HORAFINAL' => 'Hora Final',
            'FINA_ID' => 'Finalidad',
            'PERS_ID' => 'Paciente',
            'EMPL_ID' => 'Medico',
            'ESCI_ID' => 'Estado',
            'AGEN_CREATEBY' => 'Create by',
            'AGEN_UPDATEAT' => 'Update at',
			
            'TIFI_ID' => 'Tipo de cita',
			
			'PERS_IDENTIFICACION' => 'Identificacion',
			'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
        ];
    }
	
	public function sendmail($model) {
		Yii::$app->mailer->compose()
		->setFrom([Yii::$app->params['userEmail'] => Yii::$app->params['adminEmail']])
		->setTo([$model->persona->PERS_EMAIL => $model->persona->PERS_PRIMERAPELLIDO.' '.$model->persona->PERS_PRIMERNOMBRE])
		->setSubject("Recordatorio de cita")
		->setHtmlBody(
		"
			<div align='left'> <h2>Recordatorio de cita</h2></div>
			<p align='justify'><strong>Fecha: </strong>".$model->AGEN_FECHA."</p>
			<p align='justify'><strong>Finalidad: </strong>".$model->servicios->FINA_NOMBRE."</p>
			<p align='justify'><strong>Hora Inicio: </strong>".$model->AGEN_HORAINICIO."</p>
			<p align='justify'><strong>Hora Final: </strong>".$model->AGEN_HORAFINAL."</p>
			<p align='justify'><strong>Profesional: </strong>".$model->empleados->persona->PERS_PRIMERAPELLIDO." ".$model->empleados->persona->PERS_PRIMERNOMBRE."</p>
			
			<p align='justify'>En caso de no poder asistir podrá cancelar o reprogramar su cita comunicándose con nosotros a la línea <strong>7270680</strong>, marcando la <strong>OPCIÓN 5</strong>.</p>	
			<div align='center'> 
				<h2>".Yii::$app->params['company']."</h2>
				<h4>".Yii::$app->params['footerTittle']."<br>".Yii::$app->params['footerDescription']."</h4>
			</div>	 
		"
		)
		->send(); 
    }
	
	public function validar($model) {
       $Agenda = Agenda::find()
					->alias('t')
					->select('t.*')
					->where(['t.AGEN_FECHA' => $model->AGEN_FECHA])								
					->andWhere(['t.EMPL_ID' => $model->EMPL_ID])
					->andWhere(['OR',
									['AND',
										['<=','t.AGEN_HORAINICIO',$model->AGEN_HORAINICIO],
										['>=','t.AGEN_HORAFINAL',$model->AGEN_HORAINICIO]
									],
									
									['AND',
										['<=','t.AGEN_HORAINICIO',$model->AGEN_HORAFINAL],
										['>=','t.AGEN_HORAFINAL',$model->AGEN_HORAFINAL]
									],
								]
							   )							
					->one();
					
		$array = NULL;		
	    if($model->AGEN_HORAINICIO == $model->AGEN_HORAFINAL){
		$array = array( 		                
						'info'=>'false',
						'msj'=>'Error agendando: La hora final e inicial de la agenda deben ser diferentes!',
					   );	
		}else if($model->AGEN_HORAINICIO > $model->AGEN_HORAFINAL){
		$array = array( 		                
						'info'=>'false',
						'msj'=>'Error agendando: La hora final de la cita debe ser mayor a la hora inical!',
					   );	
		}else if(count($Agenda)>0){							
		$array = array( 		                
						'info'=>'false',
						'msj'=>'Error agendando: Existe un cruce de horario con la cita que trata de agendar, verifique la agenda para la fecha y horario selecionado e intente nuevamente!',
					   );
	    }else{		   
		$array = array( 		                
						'info'=>'true',
						'msj'=>'Exito',
					   );
	   }
		return $array;
    }
	
	public function sendsms($model) {
       
    }
	
	public function getPersona() {
        return $this->hasOne(Personas::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getServicios() {
        return $this->hasOne(Servicios::className(), ['FINA_ID' => 'FINA_ID']);
    }
	
	public function getEstadoscitas() {
        return $this->hasOne(Estadoscitas::className(), ['ESCI_ID' => 'ESCI_ID']);
    }
	
	public function getEmpleados() {
        return $this->hasOne(Empleados::className(), ['EMPL_ID' => 'EMPL_ID']);
    }
}
