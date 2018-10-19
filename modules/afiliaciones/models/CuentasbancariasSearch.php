<?php

namespace app\modules\afiliaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\afiliaciones\models\Cuentasbancarias;

/**
 * CuentasbancariasSearch represents the model behind the search form of `app\modules\afiliaciones\models\Cuentasbancarias`.
 */
class CuentasbancariasSearch extends Cuentasbancarias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FOPA_ID', 'FOPA_NUMEROSEGURIDAD', 'FOPA_ACTUAL', 'BANC_ID', 'TICU_ID', 'PEPA_ID', 'AFIL_ID', 'FOPA_CREATEBY'], 'integer'],
            [['FOPA_NUMEROCUENTA', 'FOPA_FECHAVENCIMIENTO', 'FOMA_UPDATEAT'], 'safe'],
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
        $query = Cuentasbancarias::find();

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
            'FOPA_ID' => $this->FOPA_ID,
            'FOPA_NUMEROSEGURIDAD' => $this->FOPA_NUMEROSEGURIDAD,
            'FOPA_FECHAVENCIMIENTO' => $this->FOPA_FECHAVENCIMIENTO,
            'FOPA_ACTUAL' => $this->FOPA_ACTUAL,
            'BANC_ID' => $this->BANC_ID,
            'TICU_ID' => $this->TICU_ID,
            'PEPA_ID' => $this->PEPA_ID,
            'AFIL_ID' => $this->AFIL_ID,
            'FOPA_CREATEBY' => $this->FOPA_CREATEBY,
            'FOMA_UPDATEAT' => $this->FOMA_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'FOPA_NUMEROCUENTA', $this->FOPA_NUMEROCUENTA]);

        return $dataProvider;
    }
}
