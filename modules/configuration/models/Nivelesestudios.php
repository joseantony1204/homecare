<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_NIVELSESTUDIOS".
 *
 * @property int $NIES_ID
 * @property string $NIES_NOMBRE
 * @property int $NIES_CREATEBY
 * @property string $NIES_UPDATEAT
 */
class Nivelesestudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_NIVELSESTUDIOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIES_NOMBRE', 'NIES_CREATEBY'], 'required'],
            [['NIES_CREATEBY'], 'integer'],
            [['NIES_UPDATEAT'], 'safe'],
            [['NIES_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIES_ID' => 'Nies  ID',
            'NIES_NOMBRE' => 'Nies  Nombre',
            'NIES_CREATEBY' => 'Nies  Createby',
            'NIES_UPDATEAT' => 'Nies  Updateat',
        ];
    }
}
