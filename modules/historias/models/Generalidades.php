<?php

namespace app\modules\historias\models;

use Yii;

use app\modules\configuration\models\Causasexternas;

/**
 * This is the model class for table "TBL_ATNGENERALIDADES".
 *
 * @property int $ATGE_ID
 * @property string $ATGE_FECHA
 * @property string $ATGE_MOTIVO
 * @property string $ATGE_ENFERMEDAD
 * @property int $CAEX_ID CAUSA EXTERNA
 * @property int $AGEN_ID AGENDA
 * @property int $ATGE_CREATEBY
 * @property string $ATGE_UPDATEAT
 */
class Generalidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNGENERALIDADES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATGE_FECHA', 'CAEX_ID', 'AGEN_ID', 'ATGE_CREATEBY'], 'required'],
            [['ATGE_FECHA', 'ATGE_UPDATEAT'], 'safe'],
            [['ATGE_MOTIVO', 'ATGE_ENFERMEDAD'], 'string'],
            [['CAEX_ID', 'AGEN_ID', 'ATGE_CREATEBY'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATGE_ID' => 'ID',
            'ATGE_FECHA' => 'Fecha actualización',
            'ATGE_MOTIVO' => 'Motivo',
            'ATGE_ENFERMEDAD' => 'Enfermedad',
            'CAEX_ID' => 'Causa Externa',
            'AGEN_ID' => 'Agen  ID',
            'ATGE_CREATEBY' => 'Atge  Createby',
            'ATGE_UPDATEAT' => 'Atge  Updateat',
        ];
    }
	
	public function getCausasexternas() {
        return $this->hasOne(Causasexternas::className(), ['CAEX_ID' => 'CAEX_ID']);
    }
	
	
}
