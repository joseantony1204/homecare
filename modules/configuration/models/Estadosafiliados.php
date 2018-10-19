<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ESTADOSAFILIADOS".
 *
 * @property integer $ESAF_ID
 * @property string $ESAF_NOMBRE
 * @property integer $ESAF_CREATEBY
 * @property string $ESAF_UPDATEAT
 */
class Estadosafiliados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_ESTADOSAFILIADOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESAF_NOMBRE', 'ESAF_CREATEBY'], 'required'],
            [['ESAF_CREATEBY'], 'integer'],
            [['ESAF_UPDATEAT'], 'safe'],
            [['ESAF_NOMBRE'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ESAF_ID' => 'Esaf  ID',
            'ESAF_NOMBRE' => 'Esaf  Nombre',
            'ESAF_CREATEBY' => 'Esaf  Createby',
            'ESAF_UPDATEAT' => 'Esaf  Updateat',
        ];
    }
}
