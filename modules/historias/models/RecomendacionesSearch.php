<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Recomendaciones;

/**
 * RecomendacionesSearch represents the model behind the search form of `app\modules\historias\models\Recomendaciones`.
 */
class RecomendacionesSearch extends Recomendaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRE_ID', 'AGEN_ID', 'ATRE_CREATEBY'], 'integer'],
            [['ATRE_RECOMENDACIONES', 'ATRE_UPDATEAT'], 'safe'],
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
        $query = Recomendaciones::find();

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
            'ATRE_ID' => $this->ATRE_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATRE_CREATEBY' => $this->ATRE_CREATEBY,
            'ATRE_UPDATEAT' => $this->ATRE_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATRE_RECOMENDACIONES', $this->ATRE_RECOMENDACIONES]);

        return $dataProvider;
    }
}
