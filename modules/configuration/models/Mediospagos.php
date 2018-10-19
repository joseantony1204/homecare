<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_MEDIOSPAGOS".
 *
 * @property integer $MEPA_ID
 * @property string $MEPA_NOMBRE
 * @property integer $MEPA_CREATEBY
 * @property string $MEPA_UPDATEAT
 */
class Mediospagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_MEDIOSPAGOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEPA_NOMBRE', 'MEPA_CREATEBY'], 'required'],
            [['MEPA_CREATEBY'], 'integer'],
            [['MEPA_UPDATEAT'], 'safe'],
            [['MEPA_NOMBRE'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEPA_ID' => 'ID',
            'MEPA_NOMBRE' => 'Descripcion',
            'MEPA_CREATEBY' => 'Create by',
            'MEPA_UPDATEAT' => 'Update at',
        ];
    }
}
