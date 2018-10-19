<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Remisiones;

/**
 * RemisionesSearch represents the model behind the search form of `app\modules\historias\models\Remisiones`.
 */
class RemisionesSearch extends Remisiones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRM_ID', 'AGEN_ID', 'ATRM_CREATEBY'], 'integer'],
            [['ATRM_REMITIDOA', 'ATRM_OBSERVACIONES', 'ATRM_UPDATEAT'], 'safe'],
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
        $query = Remisiones::find();

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
            'ATRM_ID' => $this->ATRM_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATRM_CREATEBY' => $this->ATRM_CREATEBY,
            'ATRM_UPDATEAT' => $this->ATRM_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATRM_REMITIDOA', $this->ATRM_REMITIDOA])
            ->andFilterWhere(['like', 'ATRM_OBSERVACIONES', $this->ATRM_OBSERVACIONES]);

        return $dataProvider;
    }
}
