<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "TBL_USPERFILES".
 *
 * @property int $USPE_ID
 * @property string $USPE_NOMBRE
 * @property string $USPE_FECHACAMBIO
 * @property int $USPE_REGISTRADOPOR
 */
class Perfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_USPERFILES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USPE_NOMBRE', 'USPE_FECHACAMBIO', 'USPE_REGISTRADOPOR'], 'required'],
            [['USPE_FECHACAMBIO'], 'safe'],
            [['USPE_REGISTRADOPOR'], 'integer'],
            [['USPE_NOMBRE'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USPE_ID' => 'Uspe  ID',
            'USPE_NOMBRE' => 'Uspe  Nombre',
            'USPE_FECHACAMBIO' => 'Uspe  Fechacambio',
            'USPE_REGISTRADOPOR' => 'Uspe  Registradopor',
        ];
    }
}
