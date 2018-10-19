<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Tiposidentificaciones;

/**
 * TiposidentificacionesSearch represents the model behind the search form about `app\modules\configuration\models\Tiposidentificaciones`.
 */
class TiposidentificacionesSearch extends Tiposidentificaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIID_ID', 'TIID_CREATEBY'], 'integer'],
            [['TIID_NOMBRE', 'TIID_DETALLE', 'TIID_UPDATEAT'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tiposidentificaciones::find();

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
            'TIID_ID' => $this->TIID_ID,
            'TIID_CREATEBY' => $this->TIID_CREATEBY,
            'TIID_UPDATEAT' => $this->TIID_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'TIID_NOMBRE', $this->TIID_NOMBRE])
            ->andFilterWhere(['like', 'TIID_DETALLE', $this->TIID_DETALLE]);

        return $dataProvider;
    }
}
