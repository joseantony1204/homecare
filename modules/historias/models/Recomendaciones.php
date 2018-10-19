<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNRECOMENDACIONES".
 *
 * @property int $ATRE_ID
 * @property string $ATRE_RECOMENDACIONES
 * @property int $AGEN_ID AGENDA
 * @property int $ATRE_CREATEBY
 * @property string $ATRE_UPDATEAT
 */
class Recomendaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNRECOMENDACIONES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRE_RECOMENDACIONES'], 'string'],
            [['AGEN_ID', 'ATRE_CREATEBY'], 'required'],
            [['AGEN_ID', 'ATRE_CREATEBY'], 'integer'],
            [['ATRE_UPDATEAT'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATRE_ID' => 'Atre  ID',
            'ATRE_RECOMENDACIONES' => 'Recomendaciones',
            'AGEN_ID' => 'Agen  ID',
            'ATRE_CREATEBY' => 'Atre  Createby',
            'ATRE_UPDATEAT' => 'Atre  Updateat',
        ];
    }
}
