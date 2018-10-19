<?php

namespace app\modules\configuration\models;

use Yii;

use app\modules\configuration\models\Modalidadplan;
use app\modules\configuration\models\Tipoplan;

/**
 * This is the model class for table "TBL_PLANES".
 *
 * @property integer $PLAN_ID
 * @property string $PLAN_NOMBRE
 * @property string $PLAN_DESCRIPCION
 * @property double $PLAN_VALORMENSUAL
 * @property double $PLAN_VALORSEMESTRAL
 * @property double $PLAN_VALORANUAL
 * @property integer $PLAN_CREATEBY
 * @property string $PLAN_UPDATEAT
 */
class Planes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TBL_PLANES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PLAN_NOMBRE', 'PLAN_CREATEBY'], 'required'],
            [['PLAN_VALOR', 'MOPL_ID', 'TIPL_ID'], 'number'],
            [['PLAN_CREATEBY'], 'integer'],
            [['PLAN_UPDATEAT', 'MOPL_ID', 'TIPL_ID'], 'safe'],
            [['PLAN_NOMBRE', 'PLAN_DESCRIPCION'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PLAN_ID' => 'ID',
            'PLAN_NOMBRE' => 'Nombre del plan',
            'PLAN_DESCRIPCION' => 'Descripcion',
            'PLAN_VALOR' => 'Valor',
            'MOPL_ID' => 'Modalidad',
            'TIPL_ID' => 'Tipo',
            'PLAN_CREATEBY' => 'Create by',
            'PLAN_UPDATEAT' => 'Update at',
        ];
    }
	
	public function getModalidadplan() {
        return $this->hasOne(Modalidadplan::className(), ['MOPL_ID' => 'MOPL_ID']);
    }
	
	public function getTipoplan() {
        return $this->hasOne(Tipoplan::className(), ['TIPL_ID' => 'TIPL_ID']);
    }
}
