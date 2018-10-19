<?php

namespace app\modules\configuration\models;

use Yii;
use app\modules\configuration\models\Tiposfinalidades;

/**
 * This is the model class for table "TBL_FINALIDADES".
 *
 * @property int $FINA_ID
 * @property string $FINA_NOMBRE
 * @property int $TIFI_ID
 * @property int $FINA_CREATEBY
 * @property string $FINA_UPDATEAT
 *
 * @property TBLMEDICOSFINALIDADES[] $tBLMEDICOSFINALIDADESs
 */
class Servicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_FINALIDADES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FINA_NOMBRE', 'TIFI_ID', 'FINA_CREATEBY'], 'required'],
            [['TIFI_ID', 'FINA_CREATEBY'], 'integer'],
            [['FINA_UPDATEAT'], 'safe'],
            [['FINA_NOMBRE'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'FINA_ID' => 'ID',
            'FINA_NOMBRE' => 'Nombre',
            'TIFI_ID' => 'Tipo',
            'FINA_CREATEBY' => 'Fina  Createby',
            'FINA_UPDATEAT' => 'Fina  Updateat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	 
    public function getTiposfinalidades()
    {
        return $this->hasOne(Tiposfinalidades::className(), ['TIFI_ID' => 'TIFI_ID']);
    }
}
