<?php

namespace app\modules\historias\models;

use Yii;
use app\modules\configuration\models\Clasprocedimientos;

/**
 * This is the model class for table "TBL_ATNPROCEDIMIENTOS".
 *
 * @property int $ATPR_ID
 * @property string $ATPR_OBSERVACIONES
 * @property string $ATPR_FECHASOLICITUD
 * @property string $ATPR_RESULTADOS
 * @property string $ATPR_FECHAPROCESO
 * @property int $ATPR_ESTADO
 * @property int $PROC_ID
 * @property int $AGEN_ID
 * @property int $ATPR_CREATEBY
 * @property string $ATPR_UPDATEAT
 */
class Procedimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNPROCEDIMIENTOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATPR_OBSERVACIONES', 'ATPR_RESULTADOS'], 'string'],
            [['ATPR_FECHASOLICITUD', 'ATPR_ESTADO', 'PROC_ID', 'AGEN_ID', 'ATPR_CREATEBY'], 'required'],
            [['ATPR_FECHASOLICITUD', 'ATPR_FECHAPROCESO', 'ATPR_UPDATEAT'], 'safe'],
            [['ATPR_ESTADO', 'ATPR_CANTIDAD', 'PROC_ID', 'AGEN_ID', 'ATPR_CREATEBY'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATPR_ID' => 'Atpr  ID',
            'ATPR_OBSERVACIONES' => 'Observaciones',
            'ATPR_CANTIDAD' => 'Cantidad',
            'ATPR_FECHASOLICITUD' => 'Fecha Solicitud',
            'ATPR_RESULTADOS' => 'Resultados',
            'ATPR_FECHAPROCESO' => 'Fecha Proceso',
            'ATPR_ESTADO' => 'Estado',
            'PROC_ID' => 'Procedimiento',
            'AGEN_ID' => 'Agen  ID',
            'ATPR_CREATEBY' => 'Atpr  Createby',
            'ATPR_UPDATEAT' => 'Atpr  Updateat',
        ];
    }
	
	public function getClasprocedimientos() {
        return $this->hasOne(Clasprocedimientos::className(), ['PROC_ID' => 'PROC_ID']);
    }
}
