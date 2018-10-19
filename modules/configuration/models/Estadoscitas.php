<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_ESTADOSCITAS".
 *
 * @property int $ESCI_ID
 * @property string $ESCI_NOMBRE
 * @property int $ESCI_CREATEBY
 * @property string $ESCI_UPDATEAT
 */
class Estadoscitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ESTADOSCITAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ESCI_NOMBRE', 'ESCI_CREATEBY'], 'required'],
            [['ESCI_CREATEBY'], 'integer'],
            [['ESCI_UPDATEAT'], 'safe'],
            [['ESCI_NOMBRE'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ESCI_ID' => 'Esci  ID',
            'ESCI_NOMBRE' => 'Esci  Nombre',
            'ESCI_CREATEBY' => 'Esci  Createby',
            'ESCI_UPDATEAT' => 'Esci  Updateat',
        ];
    }
}
