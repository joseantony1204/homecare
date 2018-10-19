<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Procedimientos;

/**
 * ProcedimientosSearch represents the model behind the search form of `app\modules\historias\models\Procedimientos`.
 */
class ProcedimientosSearch extends Procedimientos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATPR_ID', 'ATPR_ESTADO', 'PROC_ID', 'AGEN_ID', 'ATPR_CREATEBY'], 'integer'],
            [['ATPR_OBSERVACIONES', 'ATPR_CANTIDAD', 'ATPR_FECHASOLICITUD', 'ATPR_RESULTADOS', 'ATPR_FECHAPROCESO', 'ATPR_UPDATEAT'], 'safe'],
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
        $query = Procedimientos::find();

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
            'ATPR_ID' => $this->ATPR_ID,
            'ATPR_FECHASOLICITUD' => $this->ATPR_FECHASOLICITUD,
            'ATPR_FECHAPROCESO' => $this->ATPR_FECHAPROCESO,
            'ATPR_ESTADO' => $this->ATPR_ESTADO,
            'PROC_ID' => $this->PROC_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATPR_CREATEBY' => $this->ATPR_CREATEBY,
            'ATPR_UPDATEAT' => $this->ATPR_UPDATEAT,
        ]);

        $query
			->andFilterWhere(['like', 'ATPR_OBSERVACIONES', $this->ATPR_OBSERVACIONES])
			->andFilterWhere(['like', 'ATPR_CANTIDAD', $this->ATPR_CANTIDAD])
            ->andFilterWhere(['like', 'ATPR_RESULTADOS', $this->ATPR_RESULTADOS]);

        return $dataProvider;
    }
}
