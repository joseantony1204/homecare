<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNEXAMENFISICO".
 *
 * @property int $ATEF_ID
 * @property string $ATEF_ASPECTO
 * @property string $ATEF_ESTADO
 * @property string $ATEF_CABEZA
 * @property string $ATEF_VISUAL
 * @property string $ATEF_CUELLO
 * @property string $ATEF_TORAX
 * @property string $ATEF_ABDOMEN
 * @property string $ATEF_GENITOURINARIO
 * @property string $ATEF_OSTEOMUSCULAR
 * @property string $ATEF_PIELYFANERAZ
 * @property string $ATEF_NEUROLOGICO
 * @property int $AGEN_ID
 * @property int $ATEF_CREATEBY
 * @property string $ATEF_UPDATEAT
 */
class Exafisicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNEXAMENFISICO';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATEF_ID', 'ATEF_ASPECTO', 'ATEF_ESTADO', 'ATEF_CABEZA', 'ATEF_VISUAL', 'ATEF_CUELLO', 'ATEF_TORAX', 'ATEF_ABDOMEN', 'ATEF_GENITOURINARIO', 'ATEF_OSTEOMUSCULAR', 'ATEF_PIELYFANERAZ', 'ATEF_NEUROLOGICO', 'AGEN_ID', 'ATEF_CREATEBY'], 'required'],
            [['ATEF_ID', 'AGEN_ID', 'ATEF_CREATEBY'], 'integer'],
            [['ATEF_ASPECTO', 'ATEF_ESTADO', 'ATEF_CABEZA', 'ATEF_VISUAL', 'ATEF_CUELLO', 'ATEF_TORAX', 'ATEF_ABDOMEN', 'ATEF_GENITOURINARIO', 'ATEF_OSTEOMUSCULAR', 'ATEF_PIELYFANERAZ', 'ATEF_NEUROLOGICO'], 'string'],
            [['ATEF_UPDATEAT'], 'safe'],
            [['ATEF_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATEF_ID' => 'Atef  ID',
            'ATEF_ASPECTO' => 'Aspecto General',
            'ATEF_ESTADO' => 'Estado en que llegó',
            'ATEF_CABEZA' => 'Cabeza',
            'ATEF_VISUAL' => 'Agudeza  Visual',
            'ATEF_CUELLO' => 'Cuello',
            'ATEF_TORAX' => 'Torax (Mamás - Cardiorespiratorio)',
            'ATEF_ABDOMEN' => 'Abdomen',
            'ATEF_GENITOURINARIO' => 'Genitourinario',
            'ATEF_OSTEOMUSCULAR' => 'Osteomuscular',
            'ATEF_PIELYFANERAZ' => 'Piel y Faneraz',
            'ATEF_NEUROLOGICO' => 'Neurológico',
            'AGEN_ID' => 'Agen  ID',
            'ATEF_CREATEBY' => 'Atef  Createby',
            'ATEF_UPDATEAT' => 'Atef  Updateat',
        ];
    }
}
