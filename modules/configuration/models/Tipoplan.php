<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOPLAN".
 *
 * @property int $TIPL_ID
 * @property string $TIPL_NOMBRE
 * @property int $TIPL_CREATEBY
 * @property string $TIPL_UPDATEAT
 */
class Tipoplan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_TIPOPLAN';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TIPL_NOMBRE', 'TIPL_CREATEBY'], 'required'],
            [['TIPL_CREATEBY'], 'integer'],
            [['TIPL_UPDATEAT'], 'safe'],
            [['TIPL_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIPL_ID' => 'Tipl  ID',
            'TIPL_NOMBRE' => 'Tipl  Nombre',
            'TIPL_CREATEBY' => 'Tipl  Createby',
            'TIPL_UPDATEAT' => 'Tipl  Updateat',
        ];
    }
}
