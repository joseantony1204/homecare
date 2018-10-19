<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Habitos;

/**
 * HabitosSearch represents the model behind the search form of `app\modules\historias\models\Habitos`.
 */
class HabitosSearch extends Habitos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATHA_ID', 'PERS_ID', 'ATHA_CREATEBY'], 'integer'],
            [['ATHA_ALCOHOL', 'ATHA_CIGARRILLO', 'ATHA_DROGAS', 'ATHA_OTROS', 'ATHA_UPDATEAT'], 'safe'],
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
        $query = Habitos::find();

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
            'ATHA_ID' => $this->ATHA_ID,
            'PERS_ID' => $this->PERS_ID,
            'ATHA_CREATEBY' => $this->ATHA_CREATEBY,
            'ATHA_UPDATEAT' => $this->ATHA_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATHA_ALCOHOL', $this->ATHA_ALCOHOL])
            ->andFilterWhere(['like', 'ATHA_CIGARRILLO', $this->ATHA_CIGARRILLO])
            ->andFilterWhere(['like', 'ATHA_DROGAS', $this->ATHA_DROGAS])
            ->andFilterWhere(['like', 'ATHA_OTROS', $this->ATHA_OTROS]);

        return $dataProvider;
    }
}
