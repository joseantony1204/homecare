<?php

namespace app\modules\configuration\models;

use Yii;

use app\modules\configuration\models\Tiposprocedimientos;

/**
 * This is the model class for table "TBL_PROCEDIMIENTOS".
 *
 * @property int $PROC_ID
 * @property string $PROC_NOMBRE
 * @property string $PROC_DESCRIPCION
 * @property string $PROC_CUPS
 * @property string $PROC_SOAT
 * @property int $PROC_VALOR
 * @property string $PROC_REFERENCIA
 * @property string $PROC_UNIDAD
 * @property int $TIPR_ID
 * @property int $ARLA_ID
 * @property int $NILA_ID
 * @property int $PROC_CREATEBY
 * @property string $PROC_UPDATEAT
 */
class Clasprocedimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $ATPR_CANTIDAD, $TIPR_NOMBRE; 
    public static function tableName()
    {
        return 'TBL_PROCEDIMIENTOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROC_NOMBRE', 'PROC_CREATEBY'], 'required'],
            [['PROC_NOMBRE', 'PROC_DESCRIPCION', 'PROC_REFERENCIA'], 'string'],
            [['PROC_VALOR', 'TIPR_ID', 'ARLA_ID', 'NILA_ID', 'PROC_CREATEBY'], 'integer'],
            [['PROC_UPDATEAT'], 'safe'],
            [['PROC_CUPS', 'PROC_SOAT'], 'string', 'max' => 20],
            [['PROC_UNIDAD'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROC_ID' => 'Proc  ID',
            'PROC_NOMBRE' => 'Nombre',
            'PROC_DESCRIPCION' => 'Descripcion',
            'PROC_CUPS' => 'Cups',
            'PROC_SOAT' => 'Soat',
            'PROC_VALOR' => 'Valor',
            'PROC_REFERENCIA' => 'Referencia',
            'PROC_UNIDAD' => 'Unidad',
            'TIPR_ID' => 'Tipo',
            'ARLA_ID' => 'Area',
            'NILA_ID' => 'Nivel',
            'PROC_CREATEBY' => 'Proc  Createby',
            'PROC_UPDATEAT' => 'Proc  Updateat',
        ];
    }
	
	public function getTiposprocedimientos() {
        return $this->hasOne(Tiposprocedimientos::className(), ['TIPR_ID' => 'TIPR_ID']);
    }
}
