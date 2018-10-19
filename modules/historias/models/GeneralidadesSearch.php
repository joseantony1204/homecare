<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Generalidades;

/**
 * GeneralidadesSearch represents the model behind the search form of `app\modules\historias\models\Generalidades`.
 */
class GeneralidadesSearch extends Generalidades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATGE_ID', 'CAEX_ID', 'AGEN_ID', 'ATGE_CREATEBY'], 'integer'],
            [['ATGE_FECHA', 'ATGE_MOTIVO', 'ATGE_ENFERMEDAD', 'ATGE_UPDATEAT'], 'safe'],
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
        $query = Generalidades::find();

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
            'ATGE_ID' => $this->ATGE_ID,
            'ATGE_FECHA' => $this->ATGE_FECHA,
            'CAEX_ID' => $this->CAEX_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATGE_CREATEBY' => $this->ATGE_CREATEBY,
            'ATGE_UPDATEAT' => $this->ATGE_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATGE_MOTIVO', $this->ATGE_MOTIVO])
            ->andFilterWhere(['like', 'ATGE_ENFERMEDAD', $this->ATGE_ENFERMEDAD]);

        return $dataProvider;
    }
}
