<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNANTECEDENTESPERSONALES".
 *
 * @property int $ATAP_ID
 * @property string $ATAP_HIPERTENSION
 * @property string $ATAP_DIABETES
 * @property string $ATAP_ENETOMBOTICA
 * @property string $ATAP_CONVULSIONES
 * @property string $ATAP_VALVULOPATIAS
 * @property string $ATAP_HEPATICA
 * @property string $ATAP_CEFALEA
 * @property string $ATAP_MAMARIA
 * @property string $ATAP_OTROS
 * @property int $PERS_ID PERSONA
 * @property int $ATAP_CREATEBY
 * @property string $ATAP_UPDATEAT
 */
class Antpersonales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNANTECEDENTESPERSONALES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAP_OTROS'], 'string'],
            [['PERS_ID', 'ATAP_CREATEBY'], 'required'],
            [['PERS_ID', 'ATAP_CREATEBY'], 'integer'],
            [['ATAP_UPDATEAT'], 'safe'],
            [['ATAP_HIPERTENSION', 'ATAP_DIABETES', 'ATAP_ENETOMBOTICA', 'ATAP_CONVULSIONES', 'ATAP_VALVULOPATIAS', 'ATAP_HEPATICA', 'ATAP_CEFALEA', 'ATAP_MAMARIA'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATAP_ID' => 'Atap  ID',
            'ATAP_HIPERTENSION' => 'Hipertensión',
            'ATAP_DIABETES' => 'Diabétes',
            'ATAP_ENETOMBOTICA' => 'Enfermedades Trombótica',
            'ATAP_CONVULSIONES' => 'Convulsiones',
            'ATAP_VALVULOPATIAS' => 'Valvulopatías',
            'ATAP_HEPATICA' => 'Enfermedades Hepática',
            'ATAP_CEFALEA' => 'Cefalea',
            'ATAP_MAMARIA' => 'Patologpias Mamarias',
            'ATAP_OTROS' => 'Otros',
            'PERS_ID' => 'Pers  ID',
            'ATAP_CREATEBY' => 'Atap  Createby',
            'ATAP_UPDATEAT' => 'Atap  Updateat',
        ];
    }
}
