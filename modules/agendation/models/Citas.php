<?php

namespace app\modules\agendation\models;

use Yii;

/**
 * This is the model class for table "TBL_CITAS".
 *
 * @property int $CITA_ID
 * @property string $CITA_FECHA
 * @property string $CITA_FECHAREGISTRO
 * @property int $CITA_LLEGADA
 * @property int $CIES_ID
 * @property int $CIFI_ID
 * @property int $CICE_ID
 * @property int $PEPA_ID
 * @property int $EMHO_ID
 * @property int $CIDI_ID
 * @property int $CICS_ID
 * @property string $CITA_FECHACAMBIO
 * @property int $CITA_REGISTRADOPOR
 */
class Citas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $CITU_HORARIPS, $CIMI_NOMBRE, $CIFI_NOMBRE, $PEPA_NOMBRE1, $PEPA_APELLIDO1; 
    public static function tableName()
    {
        return 'TBL_CITAS';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CITA_FECHA', 'CITA_LLEGADA', 'CIES_ID', 'CIFI_ID', 'CICE_ID', 'PEPA_ID', 'EMHO_ID', 'CIDI_ID', 'CICS_ID', 'CITA_FECHACAMBIO', 'CITA_REGISTRADOPOR'], 'required'],
            [['CITA_FECHA', 'CITA_FECHAREGISTRO', 'CITA_FECHACAMBIO'], 'safe'],
            [['CITA_LLEGADA', 'CIES_ID', 'CIFI_ID', 'CICE_ID', 'PEPA_ID', 'EMHO_ID', 'CIDI_ID', 'CICS_ID', 'CITA_REGISTRADOPOR'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CITA_ID' => 'Cita  ID',
            'CITA_FECHA' => 'Cita  Fecha',
            'CITA_FECHAREGISTRO' => 'Cita  Fecharegistro',
            'CITA_LLEGADA' => 'Cita  Llegada',
            'CIES_ID' => 'Cies  ID',
            'CIFI_ID' => 'Cifi  ID',
            'CICE_ID' => 'Cice  ID',
            'PEPA_ID' => 'Pepa  ID',
            'EMHO_ID' => 'Emho  ID',
            'CIDI_ID' => 'Cidi  ID',
            'CICS_ID' => 'Cics  ID',
            'CITA_FECHACAMBIO' => 'Cita  Fechacambio',
            'CITA_REGISTRADOPOR' => 'Cita  Registradopor',
        ];
    }
}
