<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Servicios;

/**
 * ServiciosSearch represents the model behind the search form of `app\modules\configuration\models\Servicios`.
 */
class ServiciosSearch extends Servicios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FINA_ID', 'TIFI_ID', 'FINA_CREATEBY'], 'integer'],
            [['FINA_NOMBRE', 'FINA_UPDATEAT'], 'safe'],
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
        $query = Servicios::find();

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
            'FINA_ID' => $this->FINA_ID,
            'TIFI_ID' => $this->TIFI_ID,
            'FINA_CREATEBY' => $this->FINA_CREATEBY,
            'FINA_UPDATEAT' => $this->FINA_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'FINA_NOMBRE', $this->FINA_NOMBRE]);

        return $dataProvider;
    }
}
