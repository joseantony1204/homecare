<?php

namespace app\modules\afiliaciones\models;

use Yii;
use app\modules\configuration\models\Personas;

/**
 * This is the model class for table "TBL_BENEFICIARIOS".
 *
 * @property integer $BENE_ID
 * @property string $BENE_PRIMERNOMBRE
 * @property string $BENE_SEGUNDONOMBRE
 * @property string $BENE_PRIMERAPELLIDO
 * @property string $BENE_SEGUNDOAPELLIDO
 * @property string $BENE_FECHAINGRESO
 * @property integer $PERS_ID
 * @property integer $AFIL_ID
 * @property integer $BENE_CREATEBY
 * @property string $BENE_UPDATEAT
 */
class Beneficiarios extends Personas
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_BENEFICIARIOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERS_ID', 'AFIL_ID', 'BENE_CREATEBY'], 'required'],
            [['BENE_FECHAINGRESO', 'BENE_UPDATEAT'], 'safe'],
            [['PERS_ID', 'AFIL_ID', 'BENE_CREATEBY'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BENE_ID' => 'Bene  ID',
            'BENE_FECHAINGRESO' => 'F. Ingreso',
            'PERS_ID' => 'Pers  ID',
            'AFIL_ID' => 'Afil  ID',
            'BENE_CREATEBY' => 'Create by',
            'BENE_UPDATEAT' => 'Update at',
			
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
}
