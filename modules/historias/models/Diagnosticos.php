<?php

namespace app\modules\historias\models;

use Yii;
use app\modules\configuration\models\Clasdiagnosticos;
use app\modules\historias\models\Clasesdiagnosticos;
use app\modules\historias\models\Tiposdiagnosticos;

/**
 * This is the model class for table "TBL_ATNDIAGNOSTICOS".
 *
 * @property int $ATDI_ID
 * @property string $ATDI_RIESGOVICTIMA
 * @property string $ATDI_RIESGOVICTIMAVIO
 * @property int $DIAG_ID
 * @property int $CLDI_ID
 * @property int $TIDI_ID
 * @property int $AGEN_ID
 * @property int $ATDI_CREATEBY
 * @property string $ATDI_UPDATEAT
 */
class Diagnosticos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNDIAGNOSTICOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DIAG_ID', 'CLDI_ID', 'TIDI_ID', 'AGEN_ID', 'ATDI_CREATEBY'], 'required'],
            [['DIAG_ID', 'CLDI_ID', 'TIDI_ID', 'AGEN_ID', 'ATDI_CREATEBY'], 'integer'],
            [['ATDI_UPDATEAT'], 'safe'],
            [['ATDI_RIESGOVICTIMA', 'ATDI_RIESGOVICTIMAVIO'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATDI_ID' => 'Atdi  ID',
            'ATDI_RIESGOVICTIMA' => 'Ha sido victima maltrato?',
            'ATDI_RIESGOVICTIMAVIO' => 'Ha sido victima violencia sexual?',
            'DIAG_ID' => 'Diagnóstico',
            'CLDI_ID' => 'Clase  diagnóstico',
            'TIDI_ID' => 'Tipo diagnóstico',
            'AGEN_ID' => 'Agen  ID',
            'ATDI_CREATEBY' => 'Atdi  Createby',
            'ATDI_UPDATEAT' => 'Atdi  Updateat',
        ];
    }
	
	public function getClasdiagnosticos() {
        return $this->hasOne(Clasdiagnosticos::className(), ['DIAG_ID' => 'DIAG_ID']);
    }
	
	public function getClasesdiagnosticos() {
        return $this->hasOne(Clasesdiagnosticos::className(), ['CLDI_ID' => 'CLDI_ID']);
    }
	
	public function getTiposdiagnosticos() {
        return $this->hasOne(Tiposdiagnosticos::className(), ['TIDI_ID' => 'TIDI_ID']);
    }
}
