<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Empleados;

/**
 * EmpleadosSearch represents the model behind the search form of `app\modules\configuration\models\Empleados`.
 */
class EmpleadosSearch extends Empleados
{
    /**
     * {@inheritdoc}
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_SEGUNDONOMBRE, $PERS_PRIMERAPELLIDO, $PERS_SEGUNDOAPELLIDO; 
    public function rules()
    {
        return [
            [['EMPL_ID', 'PERS_ID', 'CARG_ID', 'ESTA_ID', 'EMPL_CREATEBY'], 'integer'],
            [['EMPL_FECHAINGRESO', 'EMPL_UPDATEAT'], 'safe'],
			[['PERS_IDENTIFICACION','PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO',], 'safe'],
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
        $query = Empleados::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO', 'EMPL_FECHAINGRESO', 'CARG_ID', 'ESTA_ID',]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'EMPL_ID' => $this->EMPL_ID,
            'EMPL_FECHAINGRESO' => $this->EMPL_FECHAINGRESO,
            'PERS_ID' => $this->PERS_ID,
            'CARG_ID' => $this->CARG_ID,
            'ESTA_ID' => $this->ESTA_ID,
            'EMPL_CREATEBY' => $this->EMPL_CREATEBY,
            'EMPL_UPDATEAT' => $this->EMPL_UPDATEAT,
        ]);
		
		$query
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
			->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_SEGUNDONOMBRE', $this->PERS_SEGUNDONOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'PERS_SEGUNDOAPELLIDO', $this->PERS_SEGUNDOAPELLIDO]);

        return $dataProvider;
    }
}
