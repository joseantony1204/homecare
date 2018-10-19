<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Signosvitales;

/**
 * SignosvitalesSearch represents the model behind the search form of `app\modules\historias\models\Signosvitales`.
 */
class SignosvitalesSearch extends Signosvitales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATSV_ID', 'AGEN_ID', 'ATSV_CREATEBY'], 'integer'],
            [['ATSV_PRESIONHH', 'ATSV_PRESIONMM', 'ATSV_PESO', 'ATSV_TALLA', 'ATSV_IMC', 'ATSV_FRECUENCIAC', 'ATSV_FRECUENCIAR', 'ATSV_PERIMETROA', 'ATSV_PERIMETROC', 'ATSV_PERIMETROB', 'ATSV_TEMPERATURA', 'ATSV_UPDATEAT'], 'safe'],
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
        $query = Signosvitales::find();

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
            'ATSV_ID' => $this->ATSV_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATSV_CREATEBY' => $this->ATSV_CREATEBY,
            'ATSV_UPDATEAT' => $this->ATSV_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATSV_PRESIONHH', $this->ATSV_PRESIONHH])
            ->andFilterWhere(['like', 'ATSV_PRESIONMM', $this->ATSV_PRESIONMM])
            ->andFilterWhere(['like', 'ATSV_PESO', $this->ATSV_PESO])
            ->andFilterWhere(['like', 'ATSV_TALLA', $this->ATSV_TALLA])
            ->andFilterWhere(['like', 'ATSV_IMC', $this->ATSV_IMC])
            ->andFilterWhere(['like', 'ATSV_FRECUENCIAC', $this->ATSV_FRECUENCIAC])
            ->andFilterWhere(['like', 'ATSV_FRECUENCIAR', $this->ATSV_FRECUENCIAR])
            ->andFilterWhere(['like', 'ATSV_PERIMETROA', $this->ATSV_PERIMETROA])
            ->andFilterWhere(['like', 'ATSV_PERIMETROC', $this->ATSV_PERIMETROC])
            ->andFilterWhere(['like', 'ATSV_PERIMETROB', $this->ATSV_PERIMETROB])
            ->andFilterWhere(['like', 'ATSV_TEMPERATURA', $this->ATSV_TEMPERATURA]);

        return $dataProvider;
    }
}
