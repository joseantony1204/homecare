<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSIDENTIFICACIONES".
 *
 * @property integer $TIID_ID
 * @property string $TIID_NOMBRE
 * @property string $TIID_DETALLE
 * @property integer $TIID_CREATEBY
 * @property string $TIID_UPDATEAT
 *
 * @property TBLPERSONAS[] $tBLPERSONASs
 */
class Tiposidentificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_TIPOSIDENTIFICACIONES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIID_NOMBRE', 'TIID_DETALLE', 'TIID_CREATEBY',], 'required'],
            [['TIID_CREATEBY'], 'integer'],
            [['TIID_UPDATEAT'], 'safe'],
            [['TIID_NOMBRE', 'TIID_DETALLE'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TIID_ID' => 'ID',
            'TIID_NOMBRE' => 'Nombre',
            'TIID_DETALLE' => 'Detalle',
            'TIID_CREATEBY' => 'Create by',
            'TIID_UPDATEAT' => 'Update at',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTBLPERSONASs()
    {
        return $this->hasMany(TBLPERSONAS::className(), ['TIID_ID' => 'TIID_ID']);
    }
}
