<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSCUENTAS".
 *
 * @property int $TICU_ID
 * @property string $TICU_NOMBRE
 * @property int $TICU_CREATEBY
 * @property string $TICU_UPDATEAT
 */
class Tiposcuentas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_TIPOSCUENTAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TICU_NOMBRE'], 'required'],
            [['TICU_CREATEBY'], 'integer'],
            [['TICU_UPDATEAT'], 'safe'],
            [['TICU_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TICU_ID' => 'Ticu  ID',
            'TICU_NOMBRE' => 'Ticu  Nombre',
            'TICU_CREATEBY' => 'Ticu  Createby',
            'TICU_UPDATEAT' => 'Ticu  Updateat',
        ];
    }
}
