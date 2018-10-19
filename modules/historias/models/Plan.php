<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNPLAN".
 *
 * @property int $ATPL_ID
 * @property string $ATPL_DESCRIPCION
 * @property string $ATPL_OBSERVACIONES
 * @property int $AGEN_ID
 * @property int $ATPL_CREATEBY
 * @property string $ATPL_UPDATEAT
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNPLAN';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATPL_DESCRIPCION', 'ATPL_OBSERVACIONES', 'AGEN_ID', 'ATPL_CREATEBY'], 'required'],
            [['ATPL_DESCRIPCION', 'ATPL_OBSERVACIONES'], 'string'],
            [['AGEN_ID', 'ATPL_CREATEBY'], 'integer'],
            [['ATPL_UPDATEAT'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATPL_ID' => 'Atpl  ID',
            'ATPL_DESCRIPCION' => 'Descripcion',
            'ATPL_OBSERVACIONES' => 'Observaciones',
            'AGEN_ID' => 'Agen  ID',
            'ATPL_CREATEBY' => 'Atpl  Createby',
            'ATPL_UPDATEAT' => 'Atpl  Updateat',
        ];
    }
}
