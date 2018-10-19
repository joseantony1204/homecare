<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNREVISIONSISTEMAS".
 *
 * @property int $ATRS_ID
 * @property string $ATRS_GENERAL
 * @property string $ATRS_RESPIRATORIO
 * @property string $ATRS_CARDIOVASCULAR
 * @property string $ATRS_GASTROINTESTINAL
 * @property string $ATRS_GENITOURINARIO
 * @property string $ATRS_ENDOCRINO
 * @property string $ATRS_NEUROLOGICO
 * @property int $AGEN_ID
 * @property int $ATRS_CREATEBY
 * @property string $ATRS_UPDATEAT
 */
class Revsistemas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNREVISIONSISTEMAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRS_ID', 'ATRS_GENERAL', 'ATRS_RESPIRATORIO', 'ATRS_CARDIOVASCULAR', 'ATRS_GASTROINTESTINAL', 'ATRS_GENITOURINARIO', 'ATRS_ENDOCRINO', 'ATRS_NEUROLOGICO', 'AGEN_ID', 'ATRS_CREATEBY'], 'required'],
            [['ATRS_ID', 'AGEN_ID', 'ATRS_CREATEBY'], 'integer'],
            [['ATRS_GENERAL', 'ATRS_RESPIRATORIO', 'ATRS_CARDIOVASCULAR', 'ATRS_GASTROINTESTINAL', 'ATRS_GENITOURINARIO', 'ATRS_ENDOCRINO', 'ATRS_NEUROLOGICO'], 'string'],
            [['ATRS_UPDATEAT'], 'safe'],
            [['ATRS_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATRS_ID' => 'Atrs  ID',
            'ATRS_GENERAL' => 'Síntomas Generales',
            'ATRS_RESPIRATORIO' => 'Sistema  Respiratorio',
            'ATRS_CARDIOVASCULAR' => 'Sistema  Cardiovascular',
            'ATRS_GASTROINTESTINAL' => 'Sistema  Gastrointestinal',
            'ATRS_GENITOURINARIO' => 'Sistema  Genitourinario',
            'ATRS_ENDOCRINO' => 'Sistema  Endocrino',
            'ATRS_NEUROLOGICO' => 'Sistema  Neurológico',
            'AGEN_ID' => 'Agen  ID',
            'ATRS_CREATEBY' => 'Atrs  Createby',
            'ATRS_UPDATEAT' => 'Atrs  Updateat',
        ];
    }
}
