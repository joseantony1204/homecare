<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "TBL_USUSUARIOS".
 *
 * @property integer $USUA_ID
 * @property string $USUA_USUARIO
 * @property string $USUA_CLAVE
 * @property string $USUA_SESSION
 * @property string $USUA_FECHAALTA
 * @property string $USUA_FECHABAJA
 * @property string $USUA_ULTIMOACCESO
 * @property integer $USUA_NUMINTENTOS
 * @property integer $USES_ID
 * @property integer $PERS_ID
 * @property integer $USPE_ID
 * @property string $USUA_FECHACAMBIO
 * @property integer $USUA_REGISTRADOPOR
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
	
    public static function tableName()
    {
        return 'TBL_USUSUARIOS';
    }

    /**
     * @inheritdoc
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
			 ['USES_ID', 'default', 'value' => self::STATUS_ACTIVE],
			 ['USES_ID', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USUA_ID' => 'ID',
            'USUA_USUARIO' => 'USUARIO',
            'USUA_CLAVE' => 'CLAVE',
            'USUA_SESSION' => 'SESSION ID',
            'USUA_FECHAALTA' => 'FECHA ALTA',
            'USUA_FECHABAJA' => 'FECHA BAJA',
            'USUA_ULTIMOACCESO' => 'ULTIMO ACCESO',
            'USUA_NUMINTENTOS' => 'NUM. INTENTOS',
            'USES_ID' => 'Uses  ID',
            'PERS_ID' => 'Peem  ID',
            'USPE_ID' => 'Uspe  PERFIL',
            'USUA_FECHACAMBIO' => 'Usua  Fechacambio',
            'USUA_REGISTRADOPOR' => 'Usua  Registradopor',
        ];
    }
	
	/**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
 
	
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
	
	/**
     * @inheritdoc
     */
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
