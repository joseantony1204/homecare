<?php

namespace app\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usuarios\models\Perfiles;

/**
 * PerfilesSearch represents the model behind the search form of `app\modules\usuarios\models\Perfiles`.
 */
class PerfilesSearch extends Perfiles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USPE_ID', 'USPE_REGISTRADOPOR'], 'integer'],
            [['USPE_NOMBRE', 'USPE_FECHACAMBIO'], 'safe'],
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
        $query = Perfiles::find();

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
            'USPE_ID' => $this->USPE_ID,
            'USPE_FECHACAMBIO' => $this->USPE_FECHACAMBIO,
            'USPE_REGISTRADOPOR' => $this->USPE_REGISTRADOPOR,
        ]);

        $query->andFilterWhere(['like', 'USPE_NOMBRE', $this->USPE_NOMBRE]);

        return $dataProvider;
    }
}
