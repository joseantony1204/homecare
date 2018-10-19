<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_TIPOSPROCEDIMIENTOS".
 *
 * @property int $TIPR_ID
 * @property string $TIPR_NOMBRE
 * @property int $TIPR_CREATEBY
 * @property string $TIPR_UPDATEAT
 */
class Tiposprocedimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_TIPOSPROCEDIMIENTOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TIPR_NOMBRE', 'TIPR_CREATEBY'], 'required'],
            [['TIPR_CREATEBY'], 'integer'],
            [['TIPR_UPDATEAT'], 'safe'],
            [['TIPR_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIPR_ID' => 'Tipr  ID',
            'TIPR_NOMBRE' => 'Tipr  Nombre',
            'TIPR_CREATEBY' => 'Tipr  Createby',
            'TIPR_UPDATEAT' => 'Tipr  Updateat',
        ];
    }
}
