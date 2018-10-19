<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSGENEROS".
 *
 * @property integer $TIGE_ID
 * @property string $TIGE_NOMBRE
 * @property string $TIGE_DETALLE
 * @property integer $TIGE_CREATEBY
 * @property string $TIGE_UPDATEAT
 */
class Generos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_TIPOSGENEROS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIGE_NOMBRE', 'TIGE_DETALLE', 'TIGE_CREATEBY'], 'required'],
            [['TIGE_CREATEBY'], 'integer'],
            [['TIGE_UPDATEAT'], 'safe'],
            [['TIGE_NOMBRE'], 'string', 'max' => 50],
            [['TIGE_DETALLE'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TIGE_ID' => 'ID',
            'TIGE_NOMBRE' => 'Nombre',
            'TIGE_DETALLE' => 'Detalle',
            'TIGE_CREATEBY' => 'Create by',
            'TIGE_UPDATEAT' => 'Update at',
        ];
    }
}
