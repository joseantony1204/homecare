<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Causasexternas;

/**
 * CausasexternasSearch represents the model behind the search form of `app\modules\configuration\models\Causasexternas`.
 */
class CausasexternasSearch extends Causasexternas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CAEX_ID', 'CAEX_CREATEBY'], 'integer'],
            [['CAEX_NOMBRE', 'CAEX_CODIGO', 'CAEX_UPDATEAT'], 'safe'],
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
        $query = Causasexternas::find();

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
            'CAEX_ID' => $this->CAEX_ID,
            'CAEX_CREATEBY' => $this->CAEX_CREATEBY,
            'CAEX_UPDATEAT' => $this->CAEX_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'CAEX_NOMBRE', $this->CAEX_NOMBRE])
            ->andFilterWhere(['like', 'CAEX_CODIGO', $this->CAEX_CODIGO]);

        return $dataProvider;
    }
}
