<?php

namespace app\modules\historias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\historias\models\History;

/**
 * HistorySearch represents the model behind the search form of `app\modules\historias\models\History`.
 */
class HistorySearch extends History
{
    /**
     * {@inheritdoc}
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_SEGUNDONOMBRE, $PERS_PRIMERAPELLIDO, $PERS_SEGUNDOAPELLIDO;  
    public function rules()
    {
        return [
            [['AGEN_ID', 'FINA_ID', 'PERS_ID', 'EMPL_ID', 'ESCI_ID', 'AGEN_CREATEBY'], 'integer'],
            [['AGEN_TOKEN', 'AGEN_FECHAPROCESO', 'AGEN_FECHA', 'AGEN_HORAINICIO', 'AGEN_HORAFINAL', 'AGEN_UPDATEAT'], 'safe'],
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
        $query = History::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['defaultOrder' => ['AGEN_FECHA'=>SORT_DESC, 'AGEN_HORAINICIO'=>SORT_DESC], 'attributes' => ['AGEN_FECHA', 'PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_PRIMERAPELLIDO', 'AGEN_HORAINICIO', 'AGEN_HORAFINAL', 'FINA_ID', 'ESCI_ID', 'EMPL_ID', ]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'AGEN_ID' => $this->AGEN_ID,
            'AGEN_TOKEN' => $this->AGEN_TOKEN,
            'AGEN_FECHAPROCESO' => $this->AGEN_FECHAPROCESO,
            'AGEN_FECHA' => $this->AGEN_FECHA,
            'AGEN_HORAINICIO' => $this->AGEN_HORAINICIO,
            'AGEN_HORAFINAL' => $this->AGEN_HORAFINAL,
            'FINA_ID' => $this->FINA_ID,
            'PERS_ID' => $this->PERS_ID,
            'EMPL_ID' => $this->EMPL_ID,
            'ESCI_ID' => $this->ESCI_ID,
            'AGEN_CREATEBY' => $this->AGEN_CREATEBY,
            'AGEN_UPDATEAT' => $this->AGEN_UPDATEAT,
        ]);
		
		$query
			->andFilterWhere(['like', 'AGEN_FECHA', $this->AGEN_FECHA])
			->andFilterWhere(['like', 'AGEN_HORAINICIO', $this->AGEN_HORAINICIO])
			->andFilterWhere(['like', 'AGEN_HORAFINAL', $this->AGEN_HORAFINAL])
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
			->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO]);

        return $dataProvider;
    }
}
