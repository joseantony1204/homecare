<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNSIGNOSVITALES".
 *
 * @property int $ATSV_ID
 * @property string $ATSV_PRESIONHH
 * @property string $ATSV_PRESIONMM
 * @property string $ATSV_PESO
 * @property string $ATSV_TALLA
 * @property string $ATSV_IMC
 * @property string $ATSV_FRECUENCIAC
 * @property string $ATSV_FRECUENCIAR
 * @property string $ATSV_PERIMETROA
 * @property string $ATSV_PERIMETROC
 * @property string $ATSV_PERIMETROB
 * @property string $ATSV_TEMPERATURA
 * @property int $AGEN_ID
 * @property int $ATSV_CREATEBY
 * @property string $ATSV_UPDATEAT
 */
class Signosvitales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNSIGNOSVITALES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATSV_ID', 'AGEN_ID', 'ATSV_CREATEBY'], 'required'],
            [['ATSV_ID', 'AGEN_ID', 'ATSV_CREATEBY'], 'integer'],
            [['ATSV_UPDATEAT'], 'safe'],
            [['ATSV_PRESIONHH', 'ATSV_PRESIONMM', 'ATSV_PESO', 'ATSV_TALLA', 'ATSV_IMC', 'ATSV_FRECUENCIAC', 'ATSV_FRECUENCIAR', 'ATSV_PERIMETROA', 'ATSV_PERIMETROC', 'ATSV_PERIMETROB', 'ATSV_TEMPERATURA'], 'string', 'max' => 20],
            [['ATSV_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATSV_ID' => 'ID',
            'ATSV_PRESIONHH' => 'Presión HH',
            'ATSV_PRESIONMM' => 'Presión MM',
            'ATSV_PESO' => 'Peso (Kg)',
            'ATSV_TALLA' => 'Talla (Cms)',
            'ATSV_IMC' => 'I.M.C',
            'ATSV_FRECUENCIAC' => 'Frecuencia Cardiaca',
            'ATSV_FRECUENCIAR' => 'Frecuencia Respiratoria',
            'ATSV_PERIMETROA' => 'Périmetro Abdominal',
            'ATSV_PERIMETROC' => 'Périmetro Cefálico',
            'ATSV_PERIMETROB' => 'Périmetro Braquial',
            'ATSV_TEMPERATURA' => 'Temperatura',
            'AGEN_ID' => 'Agen  ID',
            'ATSV_CREATEBY' => 'Atsv  Createby',
            'ATSV_UPDATEAT' => 'Atsv  Updateat',
        ];
    }
}
