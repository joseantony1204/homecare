<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Estractos;

/**
 * EstractosSearch represents the model behind the search form of `app\modules\configuration\models\Estractos`.
 */
class EstractosSearch extends Estractos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ESTR_ID', 'ESTR_CREATEBY'], 'integer'],
            [['ESTR_NOMBRE', 'ESTR_UPDATEAT'], 'safe'],
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
        $query = Estractos::find();

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
            'ESTR_ID' => $this->ESTR_ID,
            'ESTR_CREATEBY' => $this->ESTR_CREATEBY,
            'ESTR_UPDATEAT' => $this->ESTR_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ESTR_NOMBRE', $this->ESTR_NOMBRE]);

        return $dataProvider;
    }
}
