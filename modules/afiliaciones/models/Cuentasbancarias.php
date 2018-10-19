<?php

namespace app\modules\afiliaciones\models;

use Yii;

use app\modules\configuration\models\Bancos;
use app\modules\configuration\models\Tiposcuentas;
use app\modules\configuration\models\Periocidadpagos;

/**
 * This is the model class for table "TBL_FORMASPAGOS".
 *
 * @property int $FOPA_ID
 * @property string $FOPA_NUMEROCUENTA
 * @property int $FOPA_NUMEROSEGURIDAD
 * @property string $FOPA_FECHAVENCIMIENTO
 * @property int $FOPA_ACTUAL Actual
 * @property int $BANC_ID BANCOS
 * @property int $TICU_ID TIPOS DE CUENTAS
 * @property int $PEPA_ID PERIOCIDAD PAGOS
 * @property int $AFIL_ID AFILIADOS
 * @property int $FOPA_CREATEBY
 * @property string $FOMA_UPDATEAT
 */
class Cuentasbancarias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_FORMASPAGOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FOPA_NUMEROSEGURIDAD',  'BANC_ID', 'TICU_ID', 'PEPA_ID', 'AFIL_ID', 'FOPA_CREATEBY'], 'integer'],
            [['FOPA_FECHAVENCIMIENTO', 'FOPA_ACTUAL', 'FOMA_UPDATEAT'], 'safe'],
            [['FOPA_ACTUAL', 'PEPA_ID', 'AFIL_ID'], 'required'],
            [['FOPA_NUMEROCUENTA'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'FOPA_ID' => 'Fopa  ID',
            'FOPA_NUMEROCUENTA' => 'Numero Cta',
            'FOPA_NUMEROSEGURIDAD' => 'Numero Seguridad',
            'FOPA_FECHAVENCIMIENTO' => 'Fecha Vencimiento',
            'FOPA_ACTUAL' => 'Actual?',
            'AFIL_ID' => 'Afil  ID',
            'BANC_ID' => 'Banco',
            'TICU_ID' => 'Tipo cuenta',
            'PEPA_ID' => 'Periocidad pago',
            'FOMA_UPDATEAT' => 'Foma  Updateat',
            'FOPA_CREATEBY' => 'Fopa  Createby',
        ];
    }
	
	public function getBancos() {
        return $this->hasOne(Bancos::className(), ['BANC_ID' => 'BANC_ID']);
    }
	
	public function getTiposcuentas() {
        return $this->hasOne(Tiposcuentas::className(), ['TICU_ID' => 'TICU_ID']);
    }
	
	public function getPeriocidadpagos() {
        return $this->hasOne(Periocidadpagos::className(), ['PEPA_ID' => 'PEPA_ID']);
    }
}
