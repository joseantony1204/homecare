<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_DIAGNOSTICOS".
 *
 * @property int $DIAG_ID
 * @property string $DIAG_NOMBRE
 * @property string $DIAG_CODIGO
 * @property int $DIAG_CREATEBY
 * @property string $DIAG_UPDATEAT
 */
class Clasdiagnosticos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_DIAGNOSTICOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DIAG_NOMBRE', 'DIAG_CODIGO', 'DIAG_CREATEBY'], 'required'],
            [['DIAG_CREATEBY'], 'integer'],
            [['DIAG_UPDATEAT'], 'safe'],
            [['DIAG_NOMBRE', 'DIAG_CODIGO'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DIAG_ID' => 'Diag  ID',
            'DIAG_NOMBRE' => 'Diagnostico',
            'DIAG_CODIGO' => 'Codigo',
            'DIAG_CREATEBY' => 'Diag  Createby',
            'DIAG_UPDATEAT' => 'Diag  Updateat',
        ];
    }
}
