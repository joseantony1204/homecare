<?php

namespace app\modules\afiliaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\afiliaciones\models\Pagos;

/**
 * PagosSearch represents the model behind the search form about `app\modules\afiliaciones\models\Pagos`.
 */
class PagosSearch extends Pagos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAGO_ID', 'ESPA_ID', 'AFIL_ID', 'MEPA_ID', 'PAGO_CREATEBY'], 'integer'],
            [['PAGO_FECHA', 'PAGO_FECHAINICIO', 'PAGO_FECHAFINAL', 'PAGO_VALOR', 'PAGO_UPDATEAT', 'PAGO_SOPORTE'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pagos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'PAGO_ID' => $this->PAGO_ID,
            'PAGO_FECHA' => $this->PAGO_FECHA,
            'PAGO_FECHAINICIO' => $this->PAGO_FECHAINICIO,
            'PAGO_FECHAFINAL' => $this->PAGO_FECHAFINAL,
            'PAGO_VALOR' => $this->PAGO_VALOR,
            'AFIL_ID' => $this->AFIL_ID,
            'MEPA_ID' => $this->MEPA_ID,
            'PAGO_CREATEBY' => $this->PAGO_CREATEBY,
            'PAGO_UPDATEAT' => $this->PAGO_UPDATEAT,
        ]);
		
		$query
			->andFilterWhere(['like', 'PAGO_SOPORTE', $this->PAGO_SOPORTE]);

        return $dataProvider;
    }
}
