<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Generos;

/**
 * GenerosSearch represents the model behind the search form about `app\modules\configuration\models\Generos`.
 */
class GenerosSearch extends Generos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIGE_ID', 'TIGE_CREATEBY'], 'integer'],
            [['TIGE_NOMBRE', 'TIGE_DETALLE', 'TIGE_UPDATEAT'], 'safe'],
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
        $query = Generos::find();

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
            'TIGE_ID' => $this->TIGE_ID,
            'TIGE_CREATEBY' => $this->TIGE_CREATEBY,
            'TIGE_UPDATEAT' => $this->TIGE_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'TIGE_NOMBRE', $this->TIGE_NOMBRE])
            ->andFilterWhere(['like', 'TIGE_DETALLE', $this->TIGE_DETALLE]);

        return $dataProvider;
    }
}
