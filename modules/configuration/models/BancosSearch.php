<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Bancos;

/**
 * BancosSearch represents the model behind the search form about `app\modules\configuration\models\Bancos`.
 */
class BancosSearch extends Bancos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANC_ID', 'BANC_CREATEBY'], 'integer'],
            [['BANC_NIT', 'BANC_NOMBRE', 'BANC_DIRECCION', 'BANC_TELEFONO', 'BANC_UPDATEAT'], 'safe'],
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
        $query = Bancos::find();

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
            'BANC_ID' => $this->BANC_ID,
            'BANC_CREATEBY' => $this->BANC_CREATEBY,
            'BANC_UPDATEAT' => $this->BANC_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'BANC_NIT', $this->BANC_NIT])
            ->andFilterWhere(['like', 'BANC_NOMBRE', $this->BANC_NOMBRE])
            ->andFilterWhere(['like', 'BANC_DIRECCION', $this->BANC_DIRECCION])
            ->andFilterWhere(['like', 'BANC_TELEFONO', $this->BANC_TELEFONO]);

        return $dataProvider;
    }
}
