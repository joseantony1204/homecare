<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSDIAGNOSTICOS".
 *
 * @property int $TIDI_ID
 * @property string $TIDI_NOMBRE
 * @property int $TIDI_CREATEBY
 * @property string $TIDI_UPDATEAT
 */
class Tiposdiagnosticos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_TIPOSDIAGNOSTICOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TIDI_NOMBRE', 'TIDI_CREATEBY'], 'required'],
            [['TIDI_CREATEBY'], 'integer'],
            [['TIDI_UPDATEAT'], 'safe'],
            [['TIDI_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIDI_ID' => 'Tidi  ID',
            'TIDI_NOMBRE' => 'Tidi  Nombre',
            'TIDI_CREATEBY' => 'Tidi  Createby',
            'TIDI_UPDATEAT' => 'Tidi  Updateat',
        ];
    }
}
