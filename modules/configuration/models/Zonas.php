<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ZONAS".
 *
 * @property int $ZONA_ID
 * @property string $ZONA_NOMBRE
 * @property string $ZONA_DESCRIPCION
 * @property int $ZONA_CREATEBY
 * @property string $ZONA_UPDATEAT
 */
class Zonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ZONAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ZONA_NOMBRE', 'ZONA_DESCRIPCION', 'ZONA_CREATEBY'], 'required'],
            [['ZONA_CREATEBY'], 'integer'],
            [['ZONA_UPDATEAT'], 'safe'],
            [['ZONA_NOMBRE', 'ZONA_DESCRIPCION'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ZONA_ID' => 'Zona  ID',
            'ZONA_NOMBRE' => 'Zona  Nombre',
            'ZONA_DESCRIPCION' => 'Zona  Descripcion',
            'ZONA_CREATEBY' => 'Zona  Createby',
            'ZONA_UPDATEAT' => 'Zona  Updateat',
        ];
    }
}
