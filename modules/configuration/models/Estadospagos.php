<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ESTADOSPAGOS".
 *
 * @property integer $ESPA_ID
 * @property string $ESPA_NOMBRE
 * @property integer $ESPA_CREATEBY
 * @property string $ESPA_UPDATEAT
 */
class Estadospagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_ESTADOSPAGOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESPA_NOMBRE', 'ESPA_CREATEBY'], 'required'],
            [['ESPA_CREATEBY'], 'integer'],
            [['ESPA_UPDATEAT'], 'safe'],
            [['ESPA_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ESPA_ID' => 'Espa  ID',
            'ESPA_NOMBRE' => 'Espa  Nombre',
            'ESPA_CREATEBY' => 'Espa  Createby',
            'ESPA_UPDATEAT' => 'Espa  Updateat',
        ];
    }
}
