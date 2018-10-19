<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_EPSS".
 *
 * @property int $EPSS_ID
 * @property string $EPSS_NOMBRE
 * @property string $EPSS_CODIGO
 * @property string $EPSS_DIRECCION
 * @property string $EPSS_TELEFONO
 * @property int $EPSS_CREATEBY
 * @property string $EPSS_UPDATEAT
 */
class Epss extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_EPSS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EPSS_NOMBRE', 'EPSS_CODIGO', 'EPSS_CREATEBY'], 'required'],
            [['EPSS_CREATEBY'], 'integer'],
            [['EPSS_UPDATEAT'], 'safe'],
            [['EPSS_NOMBRE', 'EPSS_DIRECCION', 'EPSS_TELEFONO'], 'string', 'max' => 50],
            [['EPSS_CODIGO'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EPSS_ID' => 'Epss  ID',
            'EPSS_NOMBRE' => 'Epss  Nombre',
            'EPSS_CODIGO' => 'Epss  Codigo',
            'EPSS_DIRECCION' => 'Epss  Direccion',
            'EPSS_TELEFONO' => 'Epss  Telefono',
            'EPSS_CREATEBY' => 'Epss  Createby',
            'EPSS_UPDATEAT' => 'Epss  Updateat',
        ];
    }
}
