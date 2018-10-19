<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_CARGOS".
 *
 * @property integer $CARG_ID
 * @property string $CARG_NOMBRE
 * @property string $CARG_FECHACAMBIO
 * @property integer $CARG_REGISTRADOPOR
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_CARGOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CARG_NOMBRE', 'CARG_FECHACAMBIO', 'CARG_REGISTRADOPOR'], 'required'],
            [['CARG_FECHACAMBIO'], 'safe'],
            [['CARG_REGISTRADOPOR'], 'integer'],
            [['CARG_NOMBRE'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CARG_ID' => 'Carg  ID',
            'CARG_NOMBRE' => 'Carg  Nombre',
            'CARG_FECHACAMBIO' => 'Carg  Fechacambio',
            'CARG_REGISTRADOPOR' => 'Carg  Registradopor',
        ];
    }
}
