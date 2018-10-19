<?php

namespace app\modules\afiliaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\afiliaciones\models\Beneficiarios;

/**
 * BeneficiariosSearch represents the model behind the search form about `app\modules\afiliaciones\models\Beneficiarios`.
 */
class BeneficiariosSearch extends Beneficiarios
{
    /**
     * @inheritdoc
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_SEGUNDONOMBRE, $PERS_PRIMERAPELLIDO, $PERS_SEGUNDOAPELLIDO;  
    public function rules()
    {
        return [
            [['BENE_ID', 'PERS_ID', 'AFIL_ID', 'BENE_CREATEBY'], 'integer'],
            [['BENE_FECHAINGRESO', 'BENE_UPDATEAT'], 'safe'],
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
        $query = Beneficiarios::find();
		$query->innerJoinWith('persona', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO', 'BENE_FECHAINGRESO',]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'BENE_ID' => $this->BENE_ID,
            'BENE_FECHAINGRESO' => $this->BENE_FECHAINGRESO,
            'PERS_ID' => $this->PERS_ID,
            'AFIL_ID' => $this->AFIL_ID,
            'BENE_CREATEBY' => $this->BENE_CREATEBY,
            'BENE_UPDATEAT' => $this->BENE_UPDATEAT,
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
