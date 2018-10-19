<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Diagnosticos;

/**
 * DiagnosticosSearch represents the model behind the search form of `app\modules\historias\models\Diagnosticos`.
 */
class DiagnosticosSearch extends Diagnosticos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATDI_ID', 'DIAG_ID', 'CLDI_ID', 'TIDI_ID', 'AGEN_ID', 'ATDI_CREATEBY'], 'integer'],
            [['ATDI_RIESGOVICTIMA', 'ATDI_RIESGOVICTIMAVIO', 'ATDI_UPDATEAT'], 'safe'],
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
        $query = Diagnosticos::find();

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
            'ATDI_ID' => $this->ATDI_ID,
            'DIAG_ID' => $this->DIAG_ID,
            'CLDI_ID' => $this->CLDI_ID,
            'TIDI_ID' => $this->TIDI_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATDI_CREATEBY' => $this->ATDI_CREATEBY,
            'ATDI_UPDATEAT' => $this->ATDI_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATDI_RIESGOVICTIMA', $this->ATDI_RIESGOVICTIMA])
            ->andFilterWhere(['like', 'ATDI_RIESGOVICTIMAVIO', $this->ATDI_RIESGOVICTIMAVIO]);

        return $dataProvider;
    }
}
