<?php

namespace app\modules\historias\models;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Servicios;
use app\modules\configuration\models\Empleados;
use app\modules\configuration\models\Estadoscitas;

use app\modules\historias\models\Generalidades;
use app\modules\historias\models\Revsistemas;
use app\modules\historias\models\Signosvitales;
use app\modules\historias\models\Exafisicos;
use app\modules\historias\models\Plan;
use app\modules\historias\models\Testfindrisk;
use app\modules\historias\models\Recomendaciones;

/**
 * This is the model class for table "TBL_AGENDA".
 *
 * @property int $AGEN_ID
 * @property string $AGEN_FECHAPROCESO
 * @property string $AGEN_FECHA
 * @property string $AGEN_HORAINICIO
 * @property string $AGEN_HORAFINAL
 * @property int $FINA_ID FINALIDADES
 * @property int $PERS_ID PERSONAS
 * @property int $EMPL_ID EMPLEADOS
 * @property int $ESCI_ID ESTADOS
 * @property int $AGEN_CREATEBY
 * @property string $AGEN_UPDATEAT
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $AGEN_OPCION; 
    public static function tableName()
    {
        return 'TBL_AGENDA';
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AGEN_ID' => 'Agen  ID',
            'AGEN_TOKEN' => 'Token',
            'AGEN_FECHAPROCESO' => 'Agen  Fechaproceso',
            'AGEN_FECHA' => 'Fecha',
            'AGEN_HORAINICIO' => 'Hora inicio',
            'AGEN_HORAFINAL' => 'Hora final',
            'FINA_ID' => 'Finalidad',
            'PERS_ID' => 'Pers  ID',
            'EMPL_ID' => 'Empleado',
            'ESCI_ID' => 'Estado',
            'AGEN_CREATEBY' => 'Agen  Createby',
            'AGEN_UPDATEAT' => 'Agen  Updateat',
			
			'PERS_IDENTIFICACION' => 'Identificacion',
			'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
        ];
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
	
	public function getGeneralidades() {
        return $this->hasOne(Generalidades::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getRevsistemas() {
        return $this->hasOne(Revsistemas::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getSignosvitales() {
        return $this->hasOne(Signosvitales::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getExafisicos() {
        return $this->hasOne(Exafisicos::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getPlan() {
        return $this->hasOne(Plan::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getRecomendaciones() {
        return $this->hasOne(Recomendaciones::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
	public function getEmpleados() {
        return $this->hasOne(Empleados::className(), ['EMPL_ID' => 'EMPL_ID']);
    }
	
	public function getTestfindrisk() {
        return $this->hasOne(Testfindrisk::className(), ['AGEN_ID' => 'AGEN_ID']);
    }
	
}
