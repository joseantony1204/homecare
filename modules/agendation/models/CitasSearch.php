<?php

namespace app\modules\agendation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\agendation\models\Citas;

/**
 * CitasSearch represents the model behind the search form of `app\modules\agendation\models\Citas`.
 */
class CitasSearch extends Citas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CITA_ID', 'CITA_LLEGADA', 'CIES_ID', 'CIFI_ID', 'CICE_ID', 'PEPA_ID', 'EMHO_ID', 'CIDI_ID', 'CICS_ID', 'CITA_REGISTRADOPOR'], 'integer'],
            [['CITA_FECHA', 'CITA_FECHAREGISTRO', 'CITA_FECHACAMBIO'], 'safe'],
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
        $query = Citas::find();

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
            'CITA_ID' => $this->CITA_ID,
            'CITA_FECHA' => $this->CITA_FECHA,
            'CITA_FECHAREGISTRO' => $this->CITA_FECHAREGISTRO,
            'CITA_LLEGADA' => $this->CITA_LLEGADA,
            'CIES_ID' => $this->CIES_ID,
            'CIFI_ID' => $this->CIFI_ID,
            'CICE_ID' => $this->CICE_ID,
            'PEPA_ID' => $this->PEPA_ID,
            'EMHO_ID' => $this->EMHO_ID,
            'CIDI_ID' => $this->CIDI_ID,
            'CICS_ID' => $this->CICS_ID,
            'CITA_FECHACAMBIO' => $this->CITA_FECHACAMBIO,
            'CITA_REGISTRADOPOR' => $this->CITA_REGISTRADOPOR,
        ]);

        return $dataProvider;
    }
}
