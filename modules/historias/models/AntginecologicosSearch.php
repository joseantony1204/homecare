<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Antginecologicos;

/**
 * AntginecologicosSearch represents the model behind the search form of `app\modules\historias\models\Antginecologicos`.
 */
class AntginecologicosSearch extends Antginecologicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATAG_ID', 'PERS_ID', 'ATAG_CREATEBY'], 'integer'],
            [['ATAG_MENARGUIA', 'ATAG_CICLOS', 'ATAG_FUM', 'ATAG_GRAVIDA', 'ATAG_PARTOS', 'ATAG_ABORTO', 'ATAG_CESARIA', 'ATAG_LACTANDO', 'ATAG_DISMINORREA', 'ATAG_EPI', 'ATAG_COMPANEROS', 'ATAG_MASHIJOS', 'ATAG_ENFESEXU', 'ATAG_OTROS', 'ATAG_UPDATEAT'], 'safe'],
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
        $query = Antginecologicos::find();

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
            'ATAG_ID' => $this->ATAG_ID,
            'ATAG_FUM' => $this->ATAG_FUM,
            'PERS_ID' => $this->PERS_ID,
            'ATAG_CREATEBY' => $this->ATAG_CREATEBY,
            'ATAG_UPDATEAT' => $this->ATAG_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATAG_MENARGUIA', $this->ATAG_MENARGUIA])
            ->andFilterWhere(['like', 'ATAG_CICLOS', $this->ATAG_CICLOS])
            ->andFilterWhere(['like', 'ATAG_GRAVIDA', $this->ATAG_GRAVIDA])
            ->andFilterWhere(['like', 'ATAG_PARTOS', $this->ATAG_PARTOS])
            ->andFilterWhere(['like', 'ATAG_ABORTO', $this->ATAG_ABORTO])
            ->andFilterWhere(['like', 'ATAG_CESARIA', $this->ATAG_CESARIA])
            ->andFilterWhere(['like', 'ATAG_LACTANDO', $this->ATAG_LACTANDO])
            ->andFilterWhere(['like', 'ATAG_DISMINORREA', $this->ATAG_DISMINORREA])
            ->andFilterWhere(['like', 'ATAG_EPI', $this->ATAG_EPI])
            ->andFilterWhere(['like', 'ATAG_COMPANEROS', $this->ATAG_COMPANEROS])
            ->andFilterWhere(['like', 'ATAG_MASHIJOS', $this->ATAG_MASHIJOS])
            ->andFilterWhere(['like', 'ATAG_ENFESEXU', $this->ATAG_ENFESEXU])
            ->andFilterWhere(['like', 'ATAG_OTROS', $this->ATAG_OTROS]);

        return $dataProvider;
    }
}
