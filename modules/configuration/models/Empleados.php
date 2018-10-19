<?php

namespace app\modules\configuration\models;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Estadosempleados;
use app\modules\configuration\models\Cargos;
/**
 * This is the model class for table "TBL_EMPLEADOS".
 *
 * @property int $EMPL_ID
 * @property string $EMPL_FECHAINGRESO
 * @property int $PERS_ID
 * @property int $CARG_ID
 * @property int $ESTA_ID
 * @property int $EMPL_CREATEBY
 * @property string $EMPL_UPDATEAT
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_EMPLEADOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EMPL_FECHAINGRESO', 'EMPL_UPDATEAT'], 'safe'],
            [['PERS_ID', 'CARG_ID', 'ESTA_ID'], 'required'],
            [['PERS_ID', 'CARG_ID', 'ESTA_ID', 'EMPL_CREATEBY'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EMPL_ID' => 'Empl  ID',
            'EMPL_FECHAINGRESO' => 'F. Ingreso',
            'PERS_ID' => 'Pers  ID',
            'CARG_ID' => 'Cargo',
            'ESTA_ID' => 'Estado',
            'EMPL_CREATEBY' => 'Empl  Createby',
            'EMPL_UPDATEAT' => 'Empl  Updateat',
			
			'PERS_IDENTIFICACION' => 'Identificacion',
			'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_SEGUNDONOMBRE' => 'Segundo Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
            'PERS_SEGUNDOAPELLIDO' => 'Segundo Apellido',
        ];
    }
	
	public function getPersona() {
        return $this->hasOne(Personas::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getEstadosempleados() {
        return $this->hasOne(Estadosempleados::className(), ['ESTA_ID' => 'ESTA_ID']);
    }
	
	public function getCargos() {
        return $this->hasOne(Cargos::className(), ['CARG_ID' => 'CARG_ID']);
    }
}
