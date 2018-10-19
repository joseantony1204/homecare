<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_CLASESDIAGNOSTICOS".
 *
 * @property int $CLDI_ID
 * @property string $CLDI_NOMBRE
 * @property int $CLDI_CREATEBY
 * @property string $CLDI_UPDATEAT
 */
class Clasesdiagnosticos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_CLASESDIAGNOSTICOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CLDI_NOMBRE', 'CLDI_CREATEBY'], 'required'],
            [['CLDI_CREATEBY'], 'integer'],
            [['CLDI_UPDATEAT'], 'safe'],
            [['CLDI_NOMBRE'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CLDI_ID' => 'Cldi  ID',
            'CLDI_NOMBRE' => 'Cldi  Nombre',
            'CLDI_CREATEBY' => 'Cldi  Createby',
            'CLDI_UPDATEAT' => 'Cldi  Updateat',
        ];
    }
}
