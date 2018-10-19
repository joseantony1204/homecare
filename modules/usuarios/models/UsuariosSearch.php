<?php

namespace app\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usuarios\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\modules\usuarios\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
	public $PERS_IDENTIFICACION, $PERS_PRIMERNOMBRE, $PERS_PRIMERAPELLIDO; 
    public function rules()
    {
        return [
            [['USUA_ID', 'USUA_NUMINTENTOS', 'USES_ID', 'PERS_ID', 'USPE_ID', 'USUA_REGISTRADOPOR'], 'integer'],
            [['USUA_USUARIO', 'USUA_CLAVE', 'USUA_SESSION', 'USUA_FECHAALTA', 'USUA_FECHABAJA', 'USUA_ULTIMOACCESO', 'USUA_FECHACAMBIO'], 'safe'],
			[['PERS_IDENTIFICACION','PERS_PRIMERNOMBRE', 'PERS_PRIMERAPELLIDO',], 'safe'],
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
        $query = Usuarios::find();
		$query->innerJoinWith('persona', true);
		$query->innerJoinWith('perfiles', true);
		$query->innerJoinWith('estados', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_PRIMERAPELLIDO', 'USUA_USUARIO', 'USPE_ID', 'USES_ID',]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'USUA_ID' => $this->USUA_ID,
            'USUA_FECHAALTA' => $this->USUA_FECHAALTA,
            'USUA_FECHABAJA' => $this->USUA_FECHABAJA,
            'USUA_ULTIMOACCESO' => $this->USUA_ULTIMOACCESO,
            'USUA_NUMINTENTOS' => $this->USUA_NUMINTENTOS,
            'USES_ID' => $this->USES_ID,
            'PERS_ID' => $this->PERS_ID,
            'USPE_ID' => $this->USPE_ID,
            'USUA_FECHACAMBIO' => $this->USUA_FECHACAMBIO,
            'USUA_REGISTRADOPOR' => $this->USUA_REGISTRADOPOR,
        ]);

        $query->andFilterWhere(['like', 'USUA_USUARIO', $this->USUA_USUARIO])
            ->andFilterWhere(['like', 'PERS_IDENTIFICACION', $this->PERS_IDENTIFICACION])
            ->andFilterWhere(['like', 'PERS_PRIMERNOMBRE', $this->PERS_PRIMERNOMBRE])
            ->andFilterWhere(['like', 'PERS_PRIMERAPELLIDO', $this->PERS_PRIMERAPELLIDO])
            ->andFilterWhere(['like', 'USUA_CLAVE', $this->USUA_CLAVE])
            ->andFilterWhere(['like', 'USUA_SESSION', $this->USUA_SESSION]);

        return $dataProvider;
    }
}
