<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Revsistemas;

/**
 * RevsistemasSearch represents the model behind the search form of `app\modules\historias\models\Revsistemas`.
 */
class RevsistemasSearch extends Revsistemas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRS_ID', 'AGEN_ID', 'ATRS_CREATEBY'], 'integer'],
            [['ATRS_GENERAL', 'ATRS_RESPIRATORIO', 'ATRS_CARDIOVASCULAR', 'ATRS_GASTROINTESTINAL', 'ATRS_GENITOURINARIO', 'ATRS_ENDOCRINO', 'ATRS_NEUROLOGICO', 'ATRS_UPDATEAT'], 'safe'],
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
        $query = Revsistemas::find();

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
            'ATRS_ID' => $this->ATRS_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATRS_CREATEBY' => $this->ATRS_CREATEBY,
            'ATRS_UPDATEAT' => $this->ATRS_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATRS_GENERAL', $this->ATRS_GENERAL])
            ->andFilterWhere(['like', 'ATRS_RESPIRATORIO', $this->ATRS_RESPIRATORIO])
            ->andFilterWhere(['like', 'ATRS_CARDIOVASCULAR', $this->ATRS_CARDIOVASCULAR])
            ->andFilterWhere(['like', 'ATRS_GASTROINTESTINAL', $this->ATRS_GASTROINTESTINAL])
            ->andFilterWhere(['like', 'ATRS_GENITOURINARIO', $this->ATRS_GENITOURINARIO])
            ->andFilterWhere(['like', 'ATRS_ENDOCRINO', $this->ATRS_ENDOCRINO])
            ->andFilterWhere(['like', 'ATRS_NEUROLOGICO', $this->ATRS_NEUROLOGICO]);

        return $dataProvider;
    }
}
