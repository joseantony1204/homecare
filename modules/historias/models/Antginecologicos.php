<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNANTECEDENTESGINECOLOGICOS".
 *
 * @property int $ATAG_ID
 * @property string $ATAG_MENARGUIA
 * @property string $ATAG_CICLOS
 * @property string $ATAG_FUM
 * @property string $ATAG_GRAVIDA
 * @property string $ATAG_PARTOS
 * @property string $ATAG_ABORTO
 * @property string $ATAG_CESARIA
 * @property string $ATAG_LACTANDO
 * @property string $ATAG_DISMINORREA
 * @property string $ATAG_EPI
 * @property string $ATAG_COMPANEROS
 * @property string $ATAG_MASHIJOS
 * @property string $ATAG_ENFESEXU
 * @property string $ATAG_OTROS
 * @property int $PERS_ID
 * @property int $ATAG_CREATEBY
 * @property string $ATAG_UPDATEAT
 */
class Antginecologicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNANTECEDENTESGINECOLOGICOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAG_FUM', 'ATAG_OTROS', 'PERS_ID', 'ATAG_CREATEBY'], 'required'],
            [['ATAG_FUM', 'ATAG_UPDATEAT'], 'safe'],
            [['ATAG_OTROS'], 'string'],
            [['PERS_ID', 'ATAG_CREATEBY'], 'integer'],
            [['ATAG_MENARGUIA', 'ATAG_CICLOS'], 'string', 'max' => 20],
            [['ATAG_GRAVIDA', 'ATAG_PARTOS', 'ATAG_ABORTO', 'ATAG_CESARIA', 'ATAG_LACTANDO', 'ATAG_DISMINORREA', 'ATAG_EPI', 'ATAG_COMPANEROS', 'ATAG_MASHIJOS', 'ATAG_ENFESEXU'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATAG_ID' => 'Atag  ID',
            'ATAG_MENARGUIA' => 'Menarguia',
            'ATAG_CICLOS' => 'Ciclos',
            'ATAG_FUM' => 'Fum',
            'ATAG_GRAVIDA' => 'Gravida',
            'ATAG_PARTOS' => 'Partos',
            'ATAG_ABORTO' => 'Aborto',
            'ATAG_CESARIA' => 'Cesaria',
            'ATAG_LACTANDO' => 'Lactando',
            'ATAG_DISMINORREA' => 'Disminorrea',
            'ATAG_EPI' => 'Antecedentes de Epi',
            'ATAG_COMPANEROS' => 'Num. de compañeros sexual ult. año',
            'ATAG_MASHIJOS' => 'Desea Mas hijos',
            'ATAG_ENFESEXU' => 'Enfemades de transmisión sexual',
            'ATAG_OTROS' => 'Otros / Observaciones',
            'PERS_ID' => 'Pers  ID',
            'ATAG_CREATEBY' => 'Atag  Createby',
            'ATAG_UPDATEAT' => 'Atag  Updateat',
        ];
    }
}
