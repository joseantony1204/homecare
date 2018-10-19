<?php

namespace app\modules\usuarios\models;

use Yii;
use app\modules\configuration\models\Personas;
use app\modules\usuarios\models\Estados;
use app\modules\usuarios\models\Perfiles;

/**
 * This is the model class for table "TBL_USUSUARIOS".
 *
 * @property int $USUA_ID
 * @property string $USUA_USUARIO
 * @property string $USUA_CLAVE
 * @property string $USUA_SESSION
 * @property string $USUA_FECHAALTA
 * @property string $USUA_FECHABAJA
 * @property string $USUA_ULTIMOACCESO
 * @property int $USUA_NUMINTENTOS
 * @property int $USES_ID
 * @property int $PERS_ID
 * @property int $USPE_ID
 * @property string $USUA_FECHACAMBIO
 * @property int $USUA_REGISTRADOPOR
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1; 
    public static function tableName()
    {
        return 'TBL_USUSUARIOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USUA_USUARIO', 'USUA_CLAVE', 'USUA_SESSION', 'USUA_FECHAALTA', 'USUA_FECHABAJA', 'USUA_ULTIMOACCESO', 'USES_ID', 'PERS_ID', 'USPE_ID', 'USUA_FECHACAMBIO', 'USUA_REGISTRADOPOR'], 'required'],
            [['USUA_CLAVE', 'USUA_SESSION'], 'string'],
            [['USUA_FECHAALTA', 'USUA_FECHABAJA', 'USUA_ULTIMOACCESO', 'USUA_FECHACAMBIO'], 'safe'],
            [['USUA_NUMINTENTOS', 'USES_ID', 'PERS_ID', 'USPE_ID', 'USUA_REGISTRADOPOR'], 'integer'],
            [['USUA_USUARIO'], 'string', 'max' => 100],
            [['PERS_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USUA_ID' => 'Usua  ID',
            'USUA_USUARIO' => 'Usuario',
            'USUA_CLAVE' => 'Contraseña',
            'USUA_SESSION' => 'Session',
            'USUA_FECHAALTA' => 'Fecha alta',
            'USUA_FECHABAJA' => 'Fecha baja',
            'USUA_ULTIMOACCESO' => 'Ultimo acceso',
            'USUA_NUMINTENTOS' => 'Num. intentos',
            'USES_ID' => 'Estado',
            'PERS_ID' => 'Persona',
            'USPE_ID' => 'Perfil',
            'USUA_FECHACAMBIO' => 'Usua  Fechacambio',
            'USUA_REGISTRADOPOR' => 'Usua  Registradopor',
			
			'PERS_IDENTIFICACION' => 'Identificacion',
			'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
        ];
    }
	
	public function getPersona() {
        return $this->hasOne(Personas::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getEstados() {
        return $this->hasOne(Estados::className(), ['USES_ID' => 'USES_ID']);
    }
	
	public function getPerfiles() {
        return $this->hasOne(Perfiles::className(), ['USPE_ID' => 'USPE_ID']);
    }
	
	/**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
 
	public function validarContrasenia($valor)
	{		 
		 if(preg_match("/^[0-9]+$/", $valor) || preg_match("/^[0-9a-zA-Z]+$/", $valor)){
			return true;
		 }else{
			return false;
		    }	
	}
	
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->USUA_SESSION)===$this->USUA_CLAVE;
	}
	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	
	public function generateSalt()
	{
		return uniqid('',true);
	}
	
	/**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }	
		
	/**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['USUA_USUARIO' => $username, 'USES_ID' => self::STATUS_ACTIVE]);
    }
	
	 public static function findIdentity($id)
    {
        return static::findOne(['USUA_ID' => $id, 'USES_ID' => self::STATUS_ACTIVE]);
    }
	
	public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['USUA_SESSION' => $token]);
    }

    public function getAuthKey()
    {
        return $this->USUA_CLAVE;
    }

    public function validateAuthKey($authKey)
    {
        return $this->USUA_CLAVE === $authKey;
    }
	
}
