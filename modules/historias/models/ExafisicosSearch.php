<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Exafisicos;

/**
 * ExafisicosSearch represents the model behind the search form of `app\modules\historias\models\Exafisicos`.
 */
class ExafisicosSearch extends Exafisicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATEF_ID', 'AGEN_ID', 'ATEF_CREATEBY'], 'integer'],
            [['ATEF_ASPECTO', 'ATEF_ESTADO', 'ATEF_CABEZA', 'ATEF_VISUAL', 'ATEF_CUELLO', 'ATEF_TORAX', 'ATEF_ABDOMEN', 'ATEF_GENITOURINARIO', 'ATEF_OSTEOMUSCULAR', 'ATEF_PIELYFANERAZ', 'ATEF_NEUROLOGICO', 'ATEF_UPDATEAT'], 'safe'],
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
        $query = Exafisicos::find();

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
            'ATEF_ID' => $this->ATEF_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATEF_CREATEBY' => $this->ATEF_CREATEBY,
            'ATEF_UPDATEAT' => $this->ATEF_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATEF_ASPECTO', $this->ATEF_ASPECTO])
            ->andFilterWhere(['like', 'ATEF_ESTADO', $this->ATEF_ESTADO])
            ->andFilterWhere(['like', 'ATEF_CABEZA', $this->ATEF_CABEZA])
            ->andFilterWhere(['like', 'ATEF_VISUAL', $this->ATEF_VISUAL])
            ->andFilterWhere(['like', 'ATEF_CUELLO', $this->ATEF_CUELLO])
            ->andFilterWhere(['like', 'ATEF_TORAX', $this->ATEF_TORAX])
            ->andFilterWhere(['like', 'ATEF_ABDOMEN', $this->ATEF_ABDOMEN])
            ->andFilterWhere(['like', 'ATEF_GENITOURINARIO', $this->ATEF_GENITOURINARIO])
            ->andFilterWhere(['like', 'ATEF_OSTEOMUSCULAR', $this->ATEF_OSTEOMUSCULAR])
            ->andFilterWhere(['like', 'ATEF_PIELYFANERAZ', $this->ATEF_PIELYFANERAZ])
            ->andFilterWhere(['like', 'ATEF_NEUROLOGICO', $this->ATEF_NEUROLOGICO]);

        return $dataProvider;
    }
}
