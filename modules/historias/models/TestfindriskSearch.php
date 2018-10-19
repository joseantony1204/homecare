<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Testfindrisk;

/**
 * TestfindriskSearch represents the model behind the search form of `app\modules\historias\models\Testfindrisk`.
 */
class TestfindriskSearch extends Testfindrisk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATTF_ID', 'AGEN_ID', 'ATTF_CREATEBY'], 'integer'],
            [['ATTF_EDAD', 'ATTF_EDADPNTS', 'ATTF_PESO', 'ATTF_TALLA', 'ATTF_IMC', 'ATTF_IMCTOTAL', 'ATTF_IMCPNTS', 'ATTF_PC', 'ATTF_PCMUJERES', 'ATTF_PCPNTS', 'ATTF_ACTIVIDADFISICA', 'ATTF_ACTIVIDADFISICAPNTS', 'ATTF_CONSUMEVERDURAS', 'ATTF_CONSUMEVERDURASPNTS', 'ATTF_TOMAMEDICAMENTOS', 'ATTF_TOMAMEDICAMENTOSPNTS', 'ATTF_GLUCOSA', 'ATTF_GLUCOSAPNTS', 'ATTF_DIABETESPARIENTES', 'ATTF_DIABETESPARIENTESPNTS', 'ATTF_TOTALPNTS', 'ATTF_UPDATEAT'], 'safe'],
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
        $query = Testfindrisk::find();

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
            'ATTF_ID' => $this->ATTF_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATTF_CREATEBY' => $this->ATTF_CREATEBY,
            'ATTF_UPDATEAT' => $this->ATTF_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATTF_EDAD', $this->ATTF_EDAD])
            ->andFilterWhere(['like', 'ATTF_EDADPNTS', $this->ATTF_EDADPNTS])
            ->andFilterWhere(['like', 'ATTF_PESO', $this->ATTF_PESO])
            ->andFilterWhere(['like', 'ATTF_TALLA', $this->ATTF_TALLA])
            ->andFilterWhere(['like', 'ATTF_IMC', $this->ATTF_IMC])
            ->andFilterWhere(['like', 'ATTF_IMCTOTAL', $this->ATTF_IMCTOTAL])
            ->andFilterWhere(['like', 'ATTF_IMCPNTS', $this->ATTF_IMCPNTS])
            ->andFilterWhere(['like', 'ATTF_PC', $this->ATTF_PC])
            ->andFilterWhere(['like', 'ATTF_PCMUJERES', $this->ATTF_PCMUJERES])
            ->andFilterWhere(['like', 'ATTF_PCPNTS', $this->ATTF_PCPNTS])
            ->andFilterWhere(['like', 'ATTF_ACTIVIDADFISICA', $this->ATTF_ACTIVIDADFISICA])
            ->andFilterWhere(['like', 'ATTF_ACTIVIDADFISICAPNTS', $this->ATTF_ACTIVIDADFISICAPNTS])
            ->andFilterWhere(['like', 'ATTF_CONSUMEVERDURAS', $this->ATTF_CONSUMEVERDURAS])
            ->andFilterWhere(['like', 'ATTF_CONSUMEVERDURASPNTS', $this->ATTF_CONSUMEVERDURASPNTS])
            ->andFilterWhere(['like', 'ATTF_TOMAMEDICAMENTOS', $this->ATTF_TOMAMEDICAMENTOS])
            ->andFilterWhere(['like', 'ATTF_TOMAMEDICAMENTOSPNTS', $this->ATTF_TOMAMEDICAMENTOSPNTS])
            ->andFilterWhere(['like', 'ATTF_GLUCOSA', $this->ATTF_GLUCOSA])
            ->andFilterWhere(['like', 'ATTF_GLUCOSAPNTS', $this->ATTF_GLUCOSAPNTS])
            ->andFilterWhere(['like', 'ATTF_DIABETESPARIENTES', $this->ATTF_DIABETESPARIENTES])
            ->andFilterWhere(['like', 'ATTF_DIABETESPARIENTESPNTS', $this->ATTF_DIABETESPARIENTESPNTS])
            ->andFilterWhere(['like', 'ATTF_TOTALPNTS', $this->ATTF_TOTALPNTS]);

        return $dataProvider;
    }
}
