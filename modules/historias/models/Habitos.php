<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNHABITOS".
 *
 * @property int $ATHA_ID
 * @property string $ATHA_ALCOHOL
 * @property string $ATHA_CIGARRILLO
 * @property string $ATHA_DROGAS
 * @property string $ATHA_OTROS
 * @property int $PERS_ID
 * @property int $ATHA_CREATEBY
 * @property string $ATHA_UPDATEAT
 */
class Habitos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNHABITOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATHA_ID', 'ATHA_ALCOHOL', 'ATHA_CIGARRILLO', 'ATHA_DROGAS', 'ATHA_OTROS', 'PERS_ID', 'ATHA_CREATEBY'], 'required'],
            [['ATHA_ID', 'PERS_ID', 'ATHA_CREATEBY'], 'integer'],
            [['ATHA_OTROS'], 'string'],
            [['ATHA_UPDATEAT'], 'safe'],
            [['ATHA_ALCOHOL', 'ATHA_CIGARRILLO', 'ATHA_DROGAS'], 'string', 'max' => 2],
            [['ATHA_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATHA_ID' => 'Atha  ID',
            'ATHA_ALCOHOL' => 'Alcohól',
            'ATHA_CIGARRILLO' => 'Cigarrillo / Tabaco',
            'ATHA_DROGAS' => 'Drogas',
            'ATHA_OTROS' => 'Otros',
            'PERS_ID' => 'Pers  ID',
            'ATHA_CREATEBY' => 'Atha  Createby',
            'ATHA_UPDATEAT' => 'Atha  Updateat',
        ];
    }
}
