<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNANTECEDENTESFAMILIARES".
 *
 * @property int $ATAF_ID
 * @property string $ATAF_HIPERTENSION
 * @property string $ATAF_DIABETES
 * @property string $ATAF_CONVULSIVO
 * @property string $ATAF_MALFORMACIONES
 * @property string $ATAF_CANCER
 * @property string $ATAF_OTROS
 * @property int $PERS_ID PERSONA
 * @property int $ATAF_CREATEBY
 * @property string $ATAF_UPDATEAT
 */
class Antfamiliares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNANTECEDENTESFAMILIARES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAF_OTROS'], 'string'],
            [['PERS_ID', 'ATAF_CREATEBY'], 'required'],
            [['PERS_ID', 'ATAF_CREATEBY'], 'integer'],
            [['ATAF_UPDATEAT'], 'safe'],
            [['ATAF_HIPERTENSION', 'ATAF_DIABETES', 'ATAF_CONVULSIVO', 'ATAF_MALFORMACIONES', 'ATAF_CANCER'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATAF_ID' => 'Ataf  ID',
            'ATAF_HIPERTENSION' => 'Hipertensión',
            'ATAF_DIABETES' => 'Diabétes',
            'ATAF_CONVULSIVO' => 'Síndrome Convulsivo',
            'ATAF_MALFORMACIONES' => 'Malformaciones',
            'ATAF_CANCER' => 'Cáncer',
            'ATAF_OTROS' => 'Otros',
            'PERS_ID' => 'Pers  ID',
            'ATAF_CREATEBY' => 'Ataf  Createby',
            'ATAF_UPDATEAT' => 'Ataf  Updateat',
        ];
    }
}
