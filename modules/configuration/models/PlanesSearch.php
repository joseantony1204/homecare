<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Planes;

/**
 * PlanesSearch represents the model behind the search form about `app\modules\configuration\models\Planes`.
 */
class PlanesSearch extends Planes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PLAN_ID', 'MOPL_ID', 'TIPL_ID', 'PLAN_CREATEBY'], 'integer'],
            [['PLAN_NOMBRE', 'MOPL_ID', 'TIPL_ID', 'PLAN_DESCRIPCION', 'PLAN_UPDATEAT'], 'safe'],
            [['PLAN_VALOR',], 'number'],
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
        $query = Planes::find();

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
            'PLAN_ID' => $this->PLAN_ID,
            'MOPL_ID' => $this->MOPL_ID,
            'TIPL_ID' => $this->TIPL_ID,
            'PLAN_VALOR' => $this->PLAN_VALOR,
            'PLAN_CREATEBY' => $this->PLAN_CREATEBY,
            'PLAN_UPDATEAT' => $this->PLAN_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'PLAN_NOMBRE', $this->PLAN_NOMBRE])
            ->andFilterWhere(['like', 'PLAN_DESCRIPCION', $this->PLAN_DESCRIPCION]);

        return $dataProvider;
    }
}
