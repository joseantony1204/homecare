<?php

namespace app\modules\afiliaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\afiliaciones\models\Afiliados;

/**
 * AfiliadosSearch represents the model behind the search form about `app\modules\afiliaciones\models\Afiliados`.
 */
class AfiliadosSearch extends Afiliados
{
    /**
     * @inheritdoc
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_SEGUNDONOMBRE, $PERS_PRIMERAPELLIDO, $PERS_SEGUNDOAPELLIDO;  
    public function rules()
    {
        return [
            [['AFIL_ID', 'PERS_ID', 'TIPL_ID', 'PLAN_ID', 'AFIL_CREATEBY'], 'integer'],
            [['AFIL_FECHAINGRESO',], 'safe'],
            [['AFIL_PERSONACONTACTO','AFIL_PARENTESCOPERSONACONTACTO','AFIL_MOVILPERSONACONTACTO','AFIL_FIJOPERSONACONTACTO','AFIL_ASESOR',], 'safe'],
            [['PERS_IDENTIFICACION','PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO',], 'safe'],
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
        $query = Afiliados::find();
		$query->innerJoinWith('persona', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO', 'AFIL_FECHAINGRESO', 'ESAF_ID', 'TIPL_ID', 'PLAN_ID',]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'AFIL_ID' => $this->AFIL_ID,
            'AFIL_FECHAINGRESO' => $this->AFIL_FECHAINGRESO,
            'PERS_ID' => $this->PERS_ID,
            'TIPL_ID' => $this->TIPL_ID,
            'PLAN_ID' => $this->PLAN_ID,
            'ESAF_ID' => $this->ESAF_ID,
            'AFIL_CREATEBY' => $this->AFIL_CREATEBY,
            'AFIL_UPDATEAT' => $this->AFIL_UPDATEAT,
        ]);

        $query
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
			->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_SEGUNDONOMBRE', $this->PERS_SEGUNDONOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'PERS_SEGUNDOAPELLIDO', $this->PERS_SEGUNDOAPELLIDO])
            ->andFilterWhere(['like', 'AFIL_PERSONACONTACTO', $this->AFIL_PERSONACONTACTO])
            ->andFilterWhere(['like', 'AFIL_PARENTESCOPERSONACONTACTO', $this->AFIL_PARENTESCOPERSONACONTACTO])
            ->andFilterWhere(['like', 'AFIL_MOVILPERSONACONTACTO', $this->AFIL_MOVILPERSONACONTACTO])
            ->andFilterWhere(['like', 'AFIL_FIJOPERSONACONTACTO', $this->AFIL_FIJOPERSONACONTACTO])
            ->andFilterWhere(['like', 'AFIL_ASESOR', $this->AFIL_ASESOR]);

        return $dataProvider;
    }
}
