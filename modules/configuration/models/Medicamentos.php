<?php

namespace app\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "TBL_MEDICAMENTOS".
 *
 * @property int $MEDI_ID
 * @property string $MEDI_CODIGOATC
 * @property string $MEDI_DESCRIPCIONATC
 * @property string $MEDI_PRINCIPIOACTIVO
 * @property string $MEDI_CONCENTRACION
 * @property string $MEDI_FORMAFARMACEUTICA
 * @property string $MEDI_ACLARACION
 * @property string $MEDI_LISTA
 * @property string $MEDI_VALOR
 * @property int $MEDI_CREATEBY
 * @property string $MEDI_UPDATEAT
 */
class Medicamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $ATRE_CANTIDAD,  $ATRE_FORMULA;
    public static function tableName()
    {
        return 'TBL_MEDICAMENTOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MEDI_CODIGOATC', 'MEDI_DESCRIPCIONATC', 'MEDI_PRINCIPIOACTIVO', 'MEDI_FORMAFARMACEUTICA', 'MEDI_LISTA', 'MEDI_CREATEBY'], 'required'],
            [['MEDI_FORMAFARMACEUTICA', 'MEDI_ACLARACION'], 'string'],
            [['MEDI_CREATEBY'], 'integer'],
            [['MEDI_UPDATEAT'], 'safe'],
            [['MEDI_CODIGOATC'], 'string', 'max' => 20],
            [['MEDI_DESCRIPCIONATC', 'MEDI_PRINCIPIOACTIVO', 'MEDI_CONCENTRACION'], 'string', 'max' => 50],
            [['MEDI_LISTA'], 'string', 'max' => 2],
            [['MEDI_VALOR'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MEDI_ID' => 'Medi  ID',
            'MEDI_CODIGOATC' => 'Codigo',
            'MEDI_DESCRIPCIONATC' => 'Descripción',
            'MEDI_PRINCIPIOACTIVO' => 'Principio Activo',
            'MEDI_CONCENTRACION' => 'Concentracion',
            'MEDI_FORMAFARMACEUTICA' => 'Forma Farmaceutica',
            'MEDI_ACLARACION' => 'Aclaracion',
            'MEDI_LISTA' => 'Lista',
            'MEDI_VALOR' => 'Valor',
            'MEDI_CREATEBY' => 'Medi  Createby',
            'MEDI_UPDATEAT' => 'Medi  Updateat',
        ];
    }
}
