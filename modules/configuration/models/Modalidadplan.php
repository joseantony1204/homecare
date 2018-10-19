<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_MODALIDADPLAN".
 *
 * @property int $MOPL_ID
 * @property string $MOPL_NOMBRE
 * @property int $MOPL_CREATEBY
 * @property string $MOPL_UPDATEAT
 */
class Modalidadplan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_MODALIDADPLAN';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MOPL_NOMBRE', 'MOPL_CREATEBY'], 'required'],
            [['MOPL_CREATEBY'], 'integer'],
            [['MOPL_UPDATEAT'], 'safe'],
            [['MOPL_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MOPL_ID' => 'Mopl  ID',
            'MOPL_NOMBRE' => 'Mopl  Nombre',
            'MOPL_CREATEBY' => 'Mopl  Createby',
            'MOPL_UPDATEAT' => 'Mopl  Updateat',
        ];
    }
}
