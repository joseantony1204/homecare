<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Clasprocedimientos;

/**
 * ClasprocedimientosSearch represents the model behind the search form of `app\modules\configuration\models\Clasprocedimientos`.
 */
class ClasprocedimientosSearch extends Clasprocedimientos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROC_ID', 'PROC_VALOR', 'TIPR_ID', 'ARLA_ID', 'NILA_ID', 'PROC_CREATEBY'], 'integer'],
            [['PROC_NOMBRE', 'PROC_DESCRIPCION', 'PROC_CUPS', 'PROC_SOAT', 'PROC_REFERENCIA', 'PROC_UNIDAD', 'PROC_UPDATEAT'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Clasprocedimientos::find();

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
            'PROC_ID' => $this->PROC_ID,
            'PROC_VALOR' => $this->PROC_VALOR,
            'TIPR_ID' => $this->TIPR_ID,
            'ARLA_ID' => $this->ARLA_ID,
            'NILA_ID' => $this->NILA_ID,
            'PROC_CREATEBY' => $this->PROC_CREATEBY,
            'PROC_UPDATEAT' => $this->PROC_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'PROC_NOMBRE', $this->PROC_NOMBRE])
            ->andFilterWhere(['like', 'PROC_DESCRIPCION', $this->PROC_DESCRIPCION])
            ->andFilterWhere(['like', 'PROC_CUPS', $this->PROC_CUPS])
            ->andFilterWhere(['like', 'PROC_SOAT', $this->PROC_SOAT])
            ->andFilterWhere(['like', 'PROC_REFERENCIA', $this->PROC_REFERENCIA])
            ->andFilterWhere(['like', 'PROC_UNIDAD', $this->PROC_UNIDAD]);

        return $dataProvider;
    }
}
