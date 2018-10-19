<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_PERIOCIDADPAGOS".
 *
 * @property int $PEPA_ID
 * @property string $PEPA_NOMBRE
 * @property int $PEPA_CREATEBY
 * @property string $PEPA_UPDATEAT
 */
class Periocidadpagos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_PERIOCIDADPAGOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PEPA_NOMBRE'], 'required'],
            [['PEPA_CREATEBY'], 'integer'],
            [['PEPA_UPDATEAT'], 'safe'],
            [['PEPA_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PEPA_ID' => 'Pepa  ID',
            'PEPA_NOMBRE' => 'Pepa  Nombre',
            'PEPA_CREATEBY' => 'Pepa  Createby',
            'PEPA_UPDATEAT' => 'Pepa  Updateat',
        ];
    }
}
