<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNREMISIONES".
 *
 * @property int $ATRM_ID
 * @property string $ATRM_REMITIDOA
 * @property string $ATRM_OBSERVACIONES
 * @property int $AGEN_ID
 * @property int $ATRM_CREATEBY
 * @property string $ATRM_UPDATEAT
 */
class Remisiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNREMISIONES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRM_REMITIDOA', 'ATRM_OBSERVACIONES', 'AGEN_ID', 'ATRM_CREATEBY'], 'required'],
            [['ATRM_REMITIDOA', 'ATRM_OBSERVACIONES'], 'string'],
            [['AGEN_ID', 'ATRM_CREATEBY'], 'integer'],
            [['ATRM_UPDATEAT'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATRM_ID' => 'Atrm  ID',
            'ATRM_REMITIDOA' => 'Remitido a: ',
            'ATRM_OBSERVACIONES' => 'Observaciones',
            'AGEN_ID' => 'Agen  ID',
            'ATRM_CREATEBY' => 'Atrm  Createby',
            'ATRM_UPDATEAT' => 'Atrm  Updateat',
        ];
    }
}
