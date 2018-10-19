<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Medicamentos;

/**
 * MedicamentosSearch represents the model behind the search form of `app\modules\configuration\models\Medicamentos`.
 */
class MedicamentosSearch extends Medicamentos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MEDI_ID', 'MEDI_CREATEBY'], 'integer'],
            [['MEDI_CODIGOATC', 'MEDI_DESCRIPCIONATC', 'MEDI_PRINCIPIOACTIVO', 'MEDI_CONCENTRACION', 'MEDI_FORMAFARMACEUTICA', 'MEDI_ACLARACION', 'MEDI_LISTA', 'MEDI_VALOR', 'MEDI_UPDATEAT'], 'safe'],
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
        $query = Medicamentos::find();

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
            'MEDI_ID' => $this->MEDI_ID,
            'MEDI_CREATEBY' => $this->MEDI_CREATEBY,
            'MEDI_UPDATEAT' => $this->MEDI_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'MEDI_CODIGOATC', $this->MEDI_CODIGOATC])
            ->andFilterWhere(['like', 'MEDI_DESCRIPCIONATC', $this->MEDI_DESCRIPCIONATC])
            ->andFilterWhere(['like', 'MEDI_PRINCIPIOACTIVO', $this->MEDI_PRINCIPIOACTIVO])
            ->andFilterWhere(['like', 'MEDI_CONCENTRACION', $this->MEDI_CONCENTRACION])
            ->andFilterWhere(['like', 'MEDI_FORMAFARMACEUTICA', $this->MEDI_FORMAFARMACEUTICA])
            ->andFilterWhere(['like', 'MEDI_ACLARACION', $this->MEDI_ACLARACION])
            ->andFilterWhere(['like', 'MEDI_LISTA', $this->MEDI_LISTA])
            ->andFilterWhere(['like', 'MEDI_VALOR', $this->MEDI_VALOR]);

        return $dataProvider;
    }
}
