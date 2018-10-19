<?php
namespace app\modules\informes\models;

use Yii;
use yii\base\Model;

use app\modules\afiliaciones\models\Pagos;
/**
 * Informes
 */
class Informes extends Model
{
    public $INFO_FECHAINICIAL;
    public $INFO_FECHAFINAL;
    public $INFO_FECHA;
    public $INFO_OPCION;
	
	public function rules()
    {
        return [
            [['INFO_FECHAINICIAL', 'INFO_FECHAFINAL', 'INFO_OPCION',], 'required'],
            [['INFO_FECHA',], 'safe'],            
        ];
    }
	
	public function attributeLabels()
    {
        return [
            'INFO_FECHAINICIAL' => 'Fecha inicial: ',
            'INFO_FECHAFINAL' => 'Fecha final: ',
            'INFO_FECHA' => 'Fecha corte',
            'INFO_OPCION' => 'Opcion',
        ];
    }
	
	public function reportepagos($params)
    {
        $Pagos = Pagos::find()
					->alias('t')
					->select('t.*')					
					->andWhere(['>=','t.PAGO_FECHA',$params->INFO_FECHAINICIAL])
					->andWhere(['<=','t.PAGO_FECHA',$params->INFO_FECHAFINAL])					   							
					->orderBy(['t.PAGO_FECHA'=>SORT_ASC])
					->all();
					
		return $Pagos;
    }
	
	public function reportevencidos($params)
    {
        $Pagos = Pagos::find()
					->alias('t')
					->select('t.*')					
					->andWhere(['<=','t.PAGO_FECHA',$params->INFO_FECHA])					   							
					->orderBy(['t.PAGO_FECHA'=>SORT_ASC])
					->all();
					
		return $Pagos;
    }

   
}