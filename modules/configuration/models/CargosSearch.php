<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Cargos;

/**
 * CargosSearch represents the model behind the search form about `app\modules\configuration\models\Cargos`.
 */
class CargosSearch extends Cargos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CARG_ID', 'CARG_REGISTRADOPOR'], 'integer'],
            [['CARG_NOMBRE', 'CARG_FECHACAMBIO'], 'safe'],
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
        $query = Cargos::find();

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
            'CARG_ID' => $this->CARG_ID,
            'CARG_FECHACAMBIO' => $this->CARG_FECHACAMBIO,
            'CARG_REGISTRADOPOR' => $this->CARG_REGISTRADOPOR,
        ]);

        $query->andFilterWhere(['like', 'CARG_NOMBRE', $this->CARG_NOMBRE]);

        return $dataProvider;
    }
}
