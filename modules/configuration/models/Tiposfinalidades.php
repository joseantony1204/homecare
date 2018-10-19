<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSFINALIDADES".
 *
 * @property int $TIFI_ID
 * @property string $TIFI_NOMBRE
 * @property int $TIFI_CREATEBY
 * @property string $TIFI_UPDATEAT
 */
class Tiposfinalidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_TIPOSFINALIDADES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TIFI_NOMBRE', 'TIFI_CREATEBY'], 'required'],
            [['TIFI_CREATEBY'], 'integer'],
            [['TIFI_UPDATEAT'], 'safe'],
            [['TIFI_NOMBRE'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIFI_ID' => 'Tifi  ID',
            'TIFI_NOMBRE' => 'Tifi  Nombre',
            'TIFI_CREATEBY' => 'Tifi  Createby',
            'TIFI_UPDATEAT' => 'Tifi  Updateat',
        ];
    }
}
