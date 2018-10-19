<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ESTADOSMEDICOS".
 *
 * @property integer $ESTA_ID
 * @property string $ESTA_NOMBRE
 * @property integer $ESTA_CREATEBY
 * @property string $ESTA_UPDATEAT
 */
class Estadosempleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_ESTADOSMEDICOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTA_NOMBRE', 'ESTA_CREATEBY'], 'required'],
            [['ESTA_CREATEBY'], 'integer'],
            [['ESTA_UPDATEAT'], 'safe'],
            [['ESTA_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ESTA_ID' => 'Esta  ID',
            'ESTA_NOMBRE' => 'Esta  Nombre',
            'ESTA_CREATEBY' => 'Esta  Createby',
            'ESTA_UPDATEAT' => 'Esta  Updateat',
        ];
    }
}
