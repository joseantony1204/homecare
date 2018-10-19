<?php

namespace app\modules\afiliaciones\models;

use Yii;

use app\modules\configuration\models\Estadospagos;
use app\modules\configuration\models\Mediospagos;

use app\modules\afiliaciones\models\Afiliados;

/**
 * This is the model class for table "TBL_PAGOS".
 *
 * @property integer $PAGO_ID
 * @property string $PAGO_FECHA
 * @property integer $PAGO_FECHAINICIO
 * @property integer $PAGO_FECHAFINAL
 * @property integer $PAGO_VALOR
 * @property integer $ESPA_ID
 * @property integer $AFIL_ID
 * @property string $PAGO_SOPORTE
 * @property integer $PAGO_CREATEBY
 * @property string $PAGO_UPDATEAT
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_PAGOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAGO_FECHA', 'PAGO_FECHAINICIO', 'PAGO_FECHAFINAL', 'PAGO_VALOR', 'ESPA_ID', 'AFIL_ID', 'MEPA_ID', 'PAGO_CREATEBY'], 'required'],
            [['PAGO_FECHA', 'PAGO_UPDATEAT', 'PAGO_SOPORTE'], 'safe'],
			[['PAGO_SOPORTE'], 'file', 'extensions' => 'pdf, jpg, png, jpeg',],
            [['AFIL_ID', 'MEPA_ID', 'ESPA_ID', 'PAGO_CREATEBY'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PAGO_ID' => 'ID',
            'PAGO_FECHA' => 'Fecha pago',
            'PAGO_FECHAINICIO' => 'Desde',
            'PAGO_FECHAFINAL' => 'Hasta',
            'PAGO_VALOR' => 'Valor',
            'ESPA_ID' => 'Estado',
            'AFIL_ID' => 'Afiliado',
            'MEPA_ID' => 'Medio pago',
            'PAGO_SOPORTE' => 'Soporte',
            'PAGO_CREATEBY' => 'Create by',
            'PAGO_UPDATEAT' => 'Update at',
        ];
    }
	
	public function getEstadospagos() {
        return $this->hasOne(Estadospagos::className(), ['ESPA_ID' => 'ESPA_ID']);
    }
	
	public function getMediospagos() {
        return $this->hasOne(Mediospagos::className(), ['MEPA_ID' => 'MEPA_ID']);
    }
	
	public function getAfiliados() {
        return $this->hasOne(Afiliados::className(), ['AFIL_ID' => 'AFIL_ID']);
    }
}
