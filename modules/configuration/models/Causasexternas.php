<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_CAUSASEXTERNAS".
 *
 * @property int $CAEX_ID
 * @property string $CAEX_NOMBRE
 * @property string $CAEX_CODIGO
 * @property int $CAEX_CREATEBY
 * @property string $CAEX_UPDATEAT
 */
class Causasexternas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_CAUSASEXTERNAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CAEX_NOMBRE', 'CAEX_CREATEBY'], 'required'],
            [['CAEX_CREATEBY'], 'integer'],
            [['CAEX_UPDATEAT'], 'safe'],
            [['CAEX_NOMBRE'], 'string', 'max' => 50],
            [['CAEX_CODIGO'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CAEX_ID' => 'Caex  ID',
            'CAEX_NOMBRE' => 'Caex  Nombre',
            'CAEX_CODIGO' => 'Caex  Codigo',
            'CAEX_CREATEBY' => 'Caex  Createby',
            'CAEX_UPDATEAT' => 'Caex  Updateat',
        ];
    }
}
