<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Clasdiagnosticos;

/**
 * ClasdiagnosticosSearch represents the model behind the search form of `app\modules\configuration\models\Clasdiagnosticos`.
 */
class ClasdiagnosticosSearch extends Clasdiagnosticos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DIAG_ID', 'DIAG_CREATEBY'], 'integer'],
            [['DIAG_NOMBRE', 'DIAG_CODIGO', 'DIAG_UPDATEAT'], 'safe'],
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
        $query = Clasdiagnosticos::find();

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
            'DIAG_ID' => $this->DIAG_ID,
            'DIAG_CREATEBY' => $this->DIAG_CREATEBY,
            'DIAG_UPDATEAT' => $this->DIAG_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'DIAG_NOMBRE', $this->DIAG_NOMBRE])
            ->andFilterWhere(['like', 'DIAG_CODIGO', $this->DIAG_CODIGO]);

        return $dataProvider;
    }
}
