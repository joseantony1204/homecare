<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\Recetarios;

/**
 * RecetariosSearch represents the model behind the search form of `app\modules\historias\models\Recetarios`.
 */
class RecetariosSearch extends Recetarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ATRE_ID', 'ATRE_CANTIDAD', 'MEDI_ID', 'AGEN_ID', 'ATRE_CREATEBY'], 'integer'],
            [['ATRE_TOMACADA', 'ATRE_TOMACADADESCRIPCION', 'ATRE_DURACION', 'ATRE_DURACIONDESCRIPCION', 'ATRE_DETALLES', 'ATRE_VIASUMINISTRO', 'ATRE_FECHAINICIO', 'ATRE_FORMULA', 'ATRE_UPDATEAT'], 'safe'],
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
        $query = Recetarios::find();

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
            'ATRE_ID' => $this->ATRE_ID,
            'ATRE_CANTIDAD' => $this->ATRE_CANTIDAD,
            'ATRE_FECHAINICIO' => $this->ATRE_FECHAINICIO,
            'MEDI_ID' => $this->MEDI_ID,
            'AGEN_ID' => $this->AGEN_ID,
            'ATRE_CREATEBY' => $this->ATRE_CREATEBY,
            'ATRE_UPDATEAT' => $this->ATRE_UPDATEAT,
        ]);

        $query->andFilterWhere(['like', 'ATRE_TOMACADA', $this->ATRE_TOMACADA])
            ->andFilterWhere(['like', 'ATRE_TOMACADADESCRIPCION', $this->ATRE_TOMACADADESCRIPCION])
            ->andFilterWhere(['like', 'ATRE_DURACION', $this->ATRE_DURACION])
            ->andFilterWhere(['like', 'ATRE_DURACIONDESCRIPCION', $this->ATRE_DURACIONDESCRIPCION])
            ->andFilterWhere(['like', 'ATRE_DETALLES', $this->ATRE_DETALLES])
            ->andFilterWhere(['like', 'ATRE_VIASUMINISTRO', $this->ATRE_VIASUMINISTRO])
            ->andFilterWhere(['like', 'ATRE_FORMULA', $this->ATRE_FORMULA]);

        return $dataProvider;
    }
}
