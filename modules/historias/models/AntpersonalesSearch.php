<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Antpersonales;

/**
 * AntpersonalesSearch represents the model behind the search form of `app\modules\historias\models\Antpersonales`.
 */
class AntpersonalesSearch extends Antpersonales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAP_ID', 'PERS_ID', 'ATAP_CREATEBY'], 'integer'],
            [['ATAP_HIPERTENSION', 'ATAP_DIABETES', 'ATAP_ENETOMBOTICA', 'ATAP_CONVULSIONES', 'ATAP_VALVULOPATIAS', 'ATAP_HEPATICA', 'ATAP_CEFALEA', 'ATAP_MAMARIA', 'ATAP_OTROS', 'ATAP_UPDATEAT'], 'safe'],
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
        $query = Antpersonales::find();

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
            'ATAP_ID' => $this->ATAP_ID,
            'PERS_ID' => $this->PERS_ID,
            'ATAP_CREATEBY' => $this->ATAP_CREATEBY,
            'ATAP_UPDATEAT' => $this->ATAP_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATAP_HIPERTENSION', $this->ATAP_HIPERTENSION])
            ->andFilterWhere(['like', 'ATAP_DIABETES', $this->ATAP_DIABETES])
            ->andFilterWhere(['like', 'ATAP_ENETOMBOTICA', $this->ATAP_ENETOMBOTICA])
            ->andFilterWhere(['like', 'ATAP_CONVULSIONES', $this->ATAP_CONVULSIONES])
            ->andFilterWhere(['like', 'ATAP_VALVULOPATIAS', $this->ATAP_VALVULOPATIAS])
            ->andFilterWhere(['like', 'ATAP_HEPATICA', $this->ATAP_HEPATICA])
            ->andFilterWhere(['like', 'ATAP_CEFALEA', $this->ATAP_CEFALEA])
            ->andFilterWhere(['like', 'ATAP_MAMARIA', $this->ATAP_MAMARIA])
            ->andFilterWhere(['like', 'ATAP_OTROS', $this->ATAP_OTROS]);

        return $dataProvider;
    }
}
