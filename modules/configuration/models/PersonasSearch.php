<?php

namespace app\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\configuration\models\Personas;

/**
 * PersonasSearch represents the model behind the search form about `app\modules\afiliaciones\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERS_ID', 'PERS_SENDSMS', 'PERS_SENDMAIL', 'ESCI_ID', 'TIID_ID', 'TIGE_ID', 'PAIS_ID', 'DEPA_ID', 'MUNI_ID', 'PERS_CREATEBY'], 'integer'],
            [['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO', 'PERS_FECHANACIMIENTO', 'PERS_DIRECCION', 'PERS_TELEFONO', 'PERS_EMAIL', 'PERS_PATHIMG', 'PERS_UPDATEAT'], 'safe'],
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
    public function buscar($params)
    {
		$fecha = date('Y-m-d');				 
		$query = Personas::find()
						    ->alias('t')
							->select('t.*,a.ESAF_ID, a.AFIL_FECHAINGRESO')
							->innerJoin('TBL_AFILIADOS a', 't.PERS_ID = a.PERS_ID')
							->innerJoin('TBL_PAGOS p', 'p.AFIL_ID = p.AFIL_ID');
							//->andWhere(['<=', 'p.PAGO_FECHAINICIO', $fecha])
							//->andWhere(['<=', 'p.PAGO_FECHAFINAL', $fecha]);
		
		$query2 = Personas::find()
						    ->alias('t')
							->select('t.*, a.ESAF_ID, b.BENE_FECHAINGRESO AS AFIL_FECHAINGRESO')
							->innerJoin('TBL_BENEFICIARIOS b', 't.PERS_ID = b.PERS_ID')
							->innerJoin('TBL_AFILIADOS a', 'b.AFIL_ID = a.AFIL_ID')
							->innerJoin('TBL_PAGOS p', 'p.AFIL_ID = p.AFIL_ID');
							//->andWhere(['>=', 'p.PAGO_FECHAINICIO', $fecha])
							//->andWhere(['<=', 'p.PAGO_FECHAFINAL', $fecha]);

        // add conditions that should always apply here
        $query->union($query2,false);
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
            't.PERS_ID' => $this->PERS_ID,
            'PERS_FECHANACIMIENTO' => $this->PERS_FECHANACIMIENTO,
            'PERS_SENDSMS' => $this->PERS_SENDSMS,
            'PERS_SENDMAIL' => $this->PERS_SENDMAIL,
            'ESCI_ID' => $this->ESCI_ID,
            'TIID_ID' => $this->TIID_ID,
            'TIGE_ID' => $this->TIGE_ID,
            'PAIS_ID' => $this->PAIS_ID,
            'DEPA_ID' => $this->DEPA_ID,
            'MUNI_ID' => $this->MUNI_ID,
            'PERS_CREATEBY' => $this->PERS_CREATEBY,
            'PERS_UPDATEAT' => $this->PERS_UPDATEAT,
        ]);
		
		// grid filtering conditions
        $query2->andFilterWhere([
            't.PERS_ID' => $this->PERS_ID,
            'PERS_FECHANACIMIENTO' => $this->PERS_FECHANACIMIENTO,
            'PERS_SENDSMS' => $this->PERS_SENDSMS,
            'PERS_SENDMAIL' => $this->PERS_SENDMAIL,
            'ESCI_ID' => $this->ESCI_ID,
            'TIID_ID' => $this->TIID_ID,
            'TIGE_ID' => $this->TIGE_ID,
            'PAIS_ID' => $this->PAIS_ID,
            'DEPA_ID' => $this->DEPA_ID,
            'MUNI_ID' => $this->MUNI_ID,
            'PERS_CREATEBY' => $this->PERS_CREATEBY,
            'PERS_UPDATEAT' => $this->PERS_UPDATEAT,
        ]);

        $query
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
            ->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_SEGUNDONOMBRE', $this->PERS_SEGUNDONOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'PERS_SEGUNDOAPELLIDO', $this->PERS_SEGUNDOAPELLIDO])
            ->andFilterWhere(['like', 'PERS_DIRECCION', $this->PERS_DIRECCION])
            ->andFilterWhere(['like', 'PERS_TELEFONO', $this->PERS_TELEFONO])
            ->andFilterWhere(['like', 'PERS_EMAIL', $this->PERS_EMAIL])
            ->andFilterWhere(['like', 'PERS_PATHIMG', $this->PERS_PATHIMG]);
			
		$query2
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
            ->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_SEGUNDONOMBRE', $this->PERS_SEGUNDONOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'PERS_SEGUNDOAPELLIDO', $this->PERS_SEGUNDOAPELLIDO])
            ->andFilterWhere(['like', 'PERS_DIRECCION', $this->PERS_DIRECCION])
            ->andFilterWhere(['like', 'PERS_TELEFONO', $this->PERS_TELEFONO])
            ->andFilterWhere(['like', 'PERS_EMAIL', $this->PERS_EMAIL])
            ->andFilterWhere(['like', 'PERS_PATHIMG', $this->PERS_PATHIMG]);

        return $dataProvider;
    }
	
	public function search($params)
    {
        $query = Personas::find();

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
            'PERS_ID' => $this->PERS_ID,
            'PERS_FECHANACIMIENTO' => $this->PERS_FECHANACIMIENTO,
            'PERS_SENDSMS' => $this->PERS_SENDSMS,
            'PERS_SENDMAIL' => $this->PERS_SENDMAIL,
            'ESCI_ID' => $this->ESCI_ID,
            'TIID_ID' => $this->TIID_ID,
            'TIGE_ID' => $this->TIGE_ID,
            'PAIS_ID' => $this->PAIS_ID,
            'DEPA_ID' => $this->DEPA_ID,
            'MUNI_ID' => $this->MUNI_ID,
            'PERS_CREATEBY' => $this->PERS_CREATEBY,
            'PERS_UPDATEAT' => $this->PERS_UPDATEAT,
        ]);

        $query
			->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
            ->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_SEGUNDONOMBRE', $this->PERS_SEGUNDONOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'PERS_SEGUNDOAPELLIDO', $this->PERS_SEGUNDOAPELLIDO])
            ->andFilterWhere(['like', 'PERS_DIRECCION', $this->PERS_DIRECCION])
            ->andFilterWhere(['like', 'PERS_TELEFONO', $this->PERS_TELEFONO])
            ->andFilterWhere(['like', 'PERS_EMAIL', $this->PERS_EMAIL])
            ->andFilterWhere(['like', 'PERS_PATHIMG', $this->PERS_PATHIMG]);

        return $dataProvider;
    }
}
