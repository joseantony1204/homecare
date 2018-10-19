<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Mediospagos;

/**
 * MediospagosSearch represents the model behind the search form about `app\modules\configuration\models\Mediospagos`.
 */
class MediospagosSearch extends Mediospagos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEPA_ID', 'MEPA_CREATEBY'], 'integer'],
            [['MEPA_NOMBRE', 'MEPA_UPDATEAT'], 'safe'],
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
        $query = Mediospagos::find();

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
            'MEPA_ID' => $this->MEPA_ID,
            'MEPA_CREATEBY' => $this->MEPA_CREATEBY,
            'MEPA_UPDATEAT' => $this->MEPA_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'MEPA_NOMBRE', $this->MEPA_NOMBRE]);

        return $dataProvider;
    }
}
