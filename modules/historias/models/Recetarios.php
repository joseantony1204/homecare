<?php

namespace app\modules\historias\models;

use Yii;
use app\modules\configuration\models\Medicamentos;

/**
 * This is the model class for table "TBL_ATNRECETARIOS".
 *
 * @property int $ATRE_ID
 * @property int $ATRE_CANTIDAD
 * @property string $ATRE_TOMACADA
 * @property string $ATRE_TOMACADADESCRIPCION
 * @property string $ATRE_DURACION
 * @property string $ATRE_DURACIONDESCRIPCION
 * @property string $ATRE_DETALLES
 * @property string $ATRE_VIASUMINISTRO
 * @property string $ATRE_FECHAINICIO
 * @property string $ATRE_FORMULA
 * @property int $MEDI_ID
 * @property int $AGEN_ID
 * @property int $ATRE_CREATEBY
 * @property string $ATRE_UPDATEAT
 */
class Recetarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_ATNRECETARIOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRE_CANTIDAD', 'ATRE_FORMULA', 'MEDI_ID', 'AGEN_ID', 'ATRE_CREATEBY'], 'required'],
            [['ATRE_CANTIDAD', 'MEDI_ID', 'AGEN_ID', 'ATRE_CREATEBY'], 'integer'],
            [['ATRE_FECHAINICIO', 'ATRE_UPDATEAT'], 'safe'],
            [['ATRE_FORMULA'], 'string'],
            [['ATRE_TOMACADA', 'ATRE_TOMACADADESCRIPCION', 'ATRE_DURACION', 'ATRE_DURACIONDESCRIPCION', 'ATRE_DETALLES', 'ATRE_VIASUMINISTRO'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ATRE_ID' => 'Atre  ID',
            'ATRE_CANTIDAD' => 'Cantidad',
            'ATRE_TOMACADA' => 'Hacerlo cada',
            'ATRE_TOMACADADESCRIPCION' => 'Descripcion',
            'ATRE_DURACION' => 'Duracion',
            'ATRE_DURACIONDESCRIPCION' => 'Descripcion',
            'ATRE_DETALLES' => 'Detalles',
            'ATRE_VIASUMINISTRO' => 'Via suministro',
            'ATRE_FECHAINICIO' => 'Fecha inicio tratamiento',
            'ATRE_FORMULA' => 'Indicaciones y Recomendaciones',
            'MEDI_ID' => 'Medicamento',
            'AGEN_ID' => 'Agen  ID',
            'ATRE_CREATEBY' => 'Atre  Createby',
            'ATRE_UPDATEAT' => 'Atre  Updateat',
        ];
    }
	
	public function getMedicamentos() {
        return $this->hasOne(Medicamentos::className(), ['MEDI_ID' => 'MEDI_ID']);
    }
}
