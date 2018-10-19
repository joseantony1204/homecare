<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Antfamiliares;

/**
 * AntfamiliaresSearch represents the model behind the search form of `app\modules\historias\models\Antfamiliares`.
 */
class AntfamiliaresSearch extends Antfamiliares
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAF_ID', 'PERS_ID', 'ATAF_CREATEBY'], 'integer'],
            [['ATAF_HIPERTENSION', 'ATAF_DIABETES', 'ATAF_CONVULSIVO', 'ATAF_MALFORMACIONES', 'ATAF_CANCER', 'ATAF_OTROS', 'ATAF_UPDATEAT'], 'safe'],
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
        $query = Antfamiliares::find();

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
            'ATAF_ID' => $this->ATAF_ID,
            'PERS_ID' => $this->PERS_ID,
            'ATAF_CREATEBY' => $this->ATAF_CREATEBY,
            'ATAF_UPDATEAT' => $this->ATAF_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATAF_HIPERTENSION', $this->ATAF_HIPERTENSION])
            ->andFilterWhere(['like', 'ATAF_DIABETES', $this->ATAF_DIABETES])
            ->andFilterWhere(['like', 'ATAF_CONVULSIVO', $this->ATAF_CONVULSIVO])
            ->andFilterWhere(['like', 'ATAF_MALFORMACIONES', $this->ATAF_MALFORMACIONES])
            ->andFilterWhere(['like', 'ATAF_CANCER', $this->ATAF_CANCER])
            ->andFilterWhere(['like', 'ATAF_OTROS', $this->ATAF_OTROS]);

        return $dataProvider;
    }
}
