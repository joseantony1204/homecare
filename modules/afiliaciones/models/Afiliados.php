<?php

namespace app\modules\afiliaciones\models;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\configuration\models\Estadosafiliados;
use app\modules\configuration\models\Tipoplan;
use app\modules\configuration\models\Planes;

/**
 * This is the model class for table "TBL_AFILIADOS".
 *
 * @property int $AFIL_ID
 * @property string $AFIL_FECHAINGRESO
 * @property int $PERS_ID
 * @property int $TIPL_ID
 * @property int $PLAN_ID
 * @property int $ESAF_ID
 * @property string $AFIL_PERSONACONTACTO
 * @property string $AFIL_PARENTESCOPERSONACONTACTO
 * @property string $AFIL_MOVILPERSONACONTACTO
 * @property string $AFIL_FIJOPERSONACONTACTO
 * @property string $AFIL_ASESOR
 * @property int $AFIL_CREATEBY
 * @property string $AFIL_UPDATEAT
 *
 * @property TBLPERSONAS $pERS
 * @property TBLPLANES $pLAN
 * @property TBLBENEFICIARIOS[] $tBLBENEFICIARIOSs
 */
class Afiliados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $AFIL_OPCION; 
    public static function tableName()
    {
        return 'TBL_AFILIADOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AFIL_FECHAINGRESO', 'AFIL_UPDATEAT'], 'safe'],
            [['PERS_ID', 'TIPL_ID', 'PLAN_ID', 'ESAF_ID', 'AFIL_CREATEBY'], 'required'],
            [['PERS_ID', 'TIPL_ID', 'PLAN_ID', 'ESAF_ID', 'AFIL_CREATEBY'], 'integer'],
            [['AFIL_PERSONACONTACTO', 'AFIL_PARENTESCOPERSONACONTACTO', 'AFIL_MOVILPERSONACONTACTO', 'AFIL_FIJOPERSONACONTACTO', 'AFIL_ASESOR'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
   public function attributeLabels()
    {
        return [
            'AFIL_ID' => 'ID',            
            'AFIL_FECHAINGRESO' => 'F. Ingreso',
            'PERS_ID' => 'Pers  ID',
            'TIPL_ID' => 'Tipo Afiliado',
            'PLAN_ID' => 'Plan',
            'ESAF_ID' => 'Estado',
            'AFIL_PERSONACONTACTO' => 'Persona contacto',
            'AFIL_PARENTESCOPERSONACONTACTO' => 'Parentesco',
            'AFIL_MOVILPERSONACONTACTO' => 'Celular',
            'AFIL_FIJOPERSONACONTACTO' => 'Telefono Fijo',
            'AFIL_ASESOR' => 'Asesor comercial',
            'AFIL_CREATEBY' => 'Create by',
            'AFIL_UPDATEAT' => 'Update at',
			
            'PERS_IDENTIFICACION' => 'Identificacion',
			'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_SEGUNDONOMBRE' => 'Segundo Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
            'PERS_SEGUNDOAPELLIDO' => 'Segundo Apellido',
			
        ];
    }

    public function getImgestado() {
       if($this->ESAF_ID==1){
		return Yii::getAlias('@web/img/0.png');
	   }else{
		return Yii::getAlias('@web/img/1.png');   
	   }
    }
	
	public function getTipoplan() {
        return $this->hasOne(Tipoplan::className(), ['TIPL_ID' => 'TIPL_ID']);
    }
	
	public function getPersona() {
        return $this->hasOne(Personas::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getEstadoafiliado() {
        return $this->hasOne(Estadosafiliados::className(), ['ESAF_ID' => 'ESAF_ID']);
    }
	
	public function getPlanes() {
        return $this->hasOne(Planes::className(), ['PLAN_ID' => 'PLAN_ID']);
    }
}
