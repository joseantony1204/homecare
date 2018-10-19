<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Epss;

/**
 * EpssSearch represents the model behind the search form of `app\modules\configuration\models\Epss`.
 */
class EpssSearch extends Epss
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EPSS_ID', 'EPSS_CREATEBY'], 'integer'],
            [['EPSS_NOMBRE', 'EPSS_CODIGO', 'EPSS_DIRECCION', 'EPSS_TELEFONO', 'EPSS_UPDATEAT'], 'safe'],
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
        $query = Epss::find();

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
            'EPSS_ID' => $this->EPSS_ID,
            'EPSS_CREATEBY' => $this->EPSS_CREATEBY,
            'EPSS_UPDATEAT' => $this->EPSS_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'EPSS_NOMBRE', $this->EPSS_NOMBRE])
            ->andFilterWhere(['like', 'EPSS_CODIGO', $this->EPSS_CODIGO])
            ->andFilterWhere(['like', 'EPSS_DIRECCION', $this->EPSS_DIRECCION])
            ->andFilterWhere(['like', 'EPSS_TELEFONO', $this->EPSS_TELEFONO]);

        return $dataProvider;
    }
}
