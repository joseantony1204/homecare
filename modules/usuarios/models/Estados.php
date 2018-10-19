<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "TBL_USESTADOS".
 *
 * @property int $USES_ID
 * @property string $USES_NOMBRE
 * @property string $USES_FECHACAMBIO
 * @property int $USES_REGISTRADOPOR
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_USESTADOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USES_NOMBRE', 'USES_FECHACAMBIO', 'USES_REGISTRADOPOR'], 'required'],
            [['USES_FECHACAMBIO'], 'safe'],
            [['USES_REGISTRADOPOR'], 'integer'],
            [['USES_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USES_ID' => 'Uses  ID',
            'USES_NOMBRE' => 'Uses  Nombre',
            'USES_FECHACAMBIO' => 'Uses  Fechacambio',
            'USES_REGISTRADOPOR' => 'Uses  Registradopor',
        ];
    }
}
