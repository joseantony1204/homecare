<?php

namespace app\modules\historias\models;

use Yii;

/**
 * This is the model class for table "TBL_ATNTESTFINDRISK".
 *
 * @property int $ATTF_ID
 * @property string $ATTF_EDAD
 * @property string $ATTF_EDADPNTS
 * @property string $ATTF_PESO
 * @property string $ATTF_TALLA
 * @property string $ATTF_IMC
 * @property string $ATTF_IMCTOTAL
 * @property string $ATTF_IMCPNTS
 * @property string $ATTF_PC
 * @property string $ATTF_PCMUJERES
 * @property string $ATTF_PCPNTS
 * @property string $ATTF_ACTIVIDADFISICA
 * @property string $ATTF_ACTIVIDADFISICAPNTS
 * @property string $ATTF_CONSUMEVERDURAS
 * @property string $ATTF_CONSUMEVERDURASPNTS
 * @property string $ATTF_TOMAMEDICAMENTOS
 * @property string $ATTF_TOMAMEDICAMENTOSPNTS
 * @property string $ATTF_GLUCOSA
 * @property string $ATTF_GLUCOSAPNTS
 * @property string $ATTF_DIABETESPARIENTES
 * @property string $ATTF_DIABETESPARIENTESPNTS
 * @property string $ATTF_TOTALPNTS
 * @property int $AGEN_ID
 * @property int $ATTF_CREATEBY
 * @property string $ATTF_UPDATEAT
 */
class Testfindrisk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNTESTFINDRISK';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AGEN_ID', 'ATTF_CREATEBY'], 'required'],
            [['AGEN_ID', 'ATTF_CREATEBY'], 'integer'],
            [['ATTF_UPDATEAT'], 'safe'],
            [['ATTF_EDAD', 'ATTF_EDADPNTS', 'ATTF_PESO', 'ATTF_TALLA', 'ATTF_IMC', 'ATTF_IMCTOTAL', 'ATTF_IMCPNTS', 'ATTF_PC', 'ATTF_PCMUJERES', 'ATTF_PCPNTS', 'ATTF_ACTIVIDADFISICA', 'ATTF_ACTIVIDADFISICAPNTS', 'ATTF_CONSUMEVERDURAS', 'ATTF_CONSUMEVERDURASPNTS', 'ATTF_TOMAMEDICAMENTOS', 'ATTF_TOMAMEDICAMENTOSPNTS', 'ATTF_GLUCOSA', 'ATTF_GLUCOSAPNTS', 'ATTF_DIABETESPARIENTES', 'ATTF_DIABETESPARIENTESPNTS', 'ATTF_TOTALPNTS'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATTF_ID' => 'Attf  ID',
            'ATTF_EDAD' => '1. Edad',
            'ATTF_EDADPNTS' => 'Puntos',
            'ATTF_PESO' => 'Peso',
            'ATTF_TALLA' => 'Talla',
            'ATTF_IMC' => 'Imc',
            'ATTF_IMCTOTAL' => '2. Indice Masa Corporal',
            'ATTF_IMCPNTS' => 'Puntos',
            'ATTF_PC' => '3. Perimetro Cintura Medido Por Debajo De Las Costillas (Hombres)',
            'ATTF_PCMUJERES' => '3. Perimetro Cintura Medido Por Debajo De Las Costillas (Mujeres)',
            'ATTF_PCPNTS' => 'Puntos',
            'ATTF_ACTIVIDADFISICA' => '4. ¿Realiza Habitualmente Al Menos 30 Min. De Actividad Fisica, En El Trabajo Y/O En El Tiempo Libre?',
            'ATTF_ACTIVIDADFISICAPNTS' => 'Puntos',
            'ATTF_CONSUMEVERDURAS' => '5. ¿Con Que Frecuencia Consume Verduras O Frutas?',
            'ATTF_CONSUMEVERDURASPNTS' => 'Puntos',
            'ATTF_TOMAMEDICAMENTOS' => '6. ¿Toma Medicamentos Para La Hipertension Regularmente?',
            'ATTF_TOMAMEDICAMENTOSPNTS' => 'Puntos',
            'ATTF_GLUCOSA' => '7. ¿Le Han Encontredo Alguna Vez Valores De Glucosa Altos (Ej: Control Medico, Durante Enfermedad O Embarazo)?',
            'ATTF_GLUCOSAPNTS' => 'Puntos',
            'ATTF_DIABETESPARIENTES' => '8. ¿Se Le Ha Diagnosticado Diabetes (Tipo 1 O 2) A Familiares U Otros Parientes?',
            'ATTF_DIABETESPARIENTESPNTS' => 'Puntos',
            'ATTF_TOTALPNTS' => 'Escala Del Riesgo Total',
            'AGEN_ID' => 'Agen  ID',
            'ATTF_CREATEBY' => 'Attf  Createby',
            'ATTF_UPDATEAT' => 'Attf  Updateat',
        ];
    }
}
