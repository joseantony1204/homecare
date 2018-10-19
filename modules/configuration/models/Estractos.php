<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ESTRACTOS".
 *
 * @property int $ESTR_ID
 * @property string $ESTR_NOMBRE
 * @property int $ESTR_CREATEBY
 * @property string $ESTR_UPDATEAT
 */
class Estractos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ESTRACTOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ESTR_NOMBRE', 'ESTR_CREATEBY'], 'required'],
            [['ESTR_CREATEBY'], 'integer'],
            [['ESTR_UPDATEAT'], 'safe'],
            [['ESTR_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ESTR_ID' => 'ID',
            'ESTR_NOMBRE' => 'Estrato',
            'ESTR_CREATEBY' => 'Estr  Createby',
            'ESTR_UPDATEAT' => 'Estr  Updateat',
        ];
    }
}
