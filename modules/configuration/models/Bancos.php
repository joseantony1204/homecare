<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_BANCOS".
 *
 * @property integer $BANC_ID
 * @property string $BANC_NIT
 * @property string $BANC_NOMBRE
 * @property string $BANC_DIRECCION
 * @property string $BANC_TELEFONO
 * @property integer $BANC_CREATEBY
 * @property string $BANC_UPDATEAT
 */
class Bancos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_BANCOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANC_NOMBRE', 'BANC_CREATEBY'], 'required'],
            [['BANC_CREATEBY'], 'integer'],
            [['BANC_UPDATEAT'], 'safe'],
            [['BANC_NIT', 'BANC_DIRECCION', 'BANC_TELEFONO'], 'string', 'max' => 45],
            [['BANC_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANC_ID' => 'ID',
            'BANC_NIT' => 'Nit',
            'BANC_NOMBRE' => 'Nombre',
            'BANC_DIRECCION' => 'Direccion',
            'BANC_TELEFONO' => 'Telefono',
            'BANC_CREATEBY' => 'Create by',
            'BANC_UPDATEAT' => 'Update at',
        ];
    }
}
