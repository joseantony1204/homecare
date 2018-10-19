<?php

namespace app\modules\configuration\models;

use Yii;
use app\modules\configuration\models\Generos;
use app\modules\configuration\models\Tiposidentificaciones;
use app\modules\configuration\models\Estadosciviles;
use app\modules\configuration\models\Estractos;
use app\modules\configuration\models\Nivelesestudios;
use app\modules\configuration\models\Zonas;
use app\modules\configuration\models\Epss;

use app\modules\historias\models\Antfamiliares;
use app\modules\historias\models\Antpersonales;
use app\modules\historias\models\Antginecologicos;
use app\modules\historias\models\Habitos;

use app\modules\afiliaciones\models\Afiliados;

/**
 * This is the model class for table "TBL_PERSONAS".
 *
 * @property int $PERS_ID
 * @property string $PERS_IDENTIFICACION
 * @property string $PERS_LUGAREXPEDICION
 * @property string $PERS_FECHAEXPEDICION
 * @property string $PERS_PRIMERNOMBRE
 * @property string $PERS_SEGUNDONOMBRE
 * @property string $PERS_PRIMERAPELLIDO
 * @property string $PERS_SEGUNDOAPELLIDO
 * @property string $PERS_FECHANACIMIENTO
 * @property string $PERS_DIRECCION
 * @property string $PERS_BARRIO
 * @property int $ZONA_ID
 * @property string $PERS_TELEFONO
 * @property string $PERS_TELEFONOMOVIL
 * @property int $PERS_SENDSMS
 * @property string $PERS_EMAIL
 * @property int $PERS_SENDMAIL
 * @property string $PERS_PATHIMG
 * @property string $PERS_CUALOTRAEPS
 * @property int $EPSS_ID
 * @property int $ESTR_ID
 * @property int $NIES_ID
 * @property int $ESCI_ID
 * @property int $TIID_ID
 * @property int $TIGE_ID
 * @property int $PAIS_ID
 * @property int $DEPA_ID
 * @property int $MUNI_ID
 * @property int $PERS_CREATEBY
 * @property string $PERS_UPDATEAT
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $ESAF_ID, $AFIL_FECHAINGRESO; 
    public static function tableName()
    {
        return 'TBL_PERSONAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_FECHANACIMIENTO',  'TIID_ID', 'TIGE_ID'], 'required'],
            [['ZONA_ID', 'PERS_SENDSMS', 'PERS_SENDMAIL', 'EPSS_ID', 'ESTR_ID', 'NIES_ID', 'ESCI_ID', 'TIID_ID', 'TIGE_ID', 'PAIS_ID', 'DEPA_ID', 'MUNI_ID', 'PERS_CREATEBY'], 'integer'],
            [['PERS_EMAIL'], 'string'],
            [['PERS_PATHIMG'], 'safe'],
			[['PERS_PATHIMG'], 'file', 'extensions' => 'jpg, png, jpeg',],
            [['PERS_IDENTIFICACION', 'PERS_PRIMERNOMBRE', 'PERS_SEGUNDONOMBRE', 'PERS_PRIMERAPELLIDO', 'PERS_SEGUNDOAPELLIDO'], 'string', 'max' => 45],
            [['PERS_LUGAREXPEDICION'], 'string', 'max' => 100],
            [['PERS_DIRECCION', 'PERS_TELEFONO'], 'string', 'max' => 200],
            [['PERS_BARRIO', 'PERS_TELEFONOMOVIL', 'PERS_CUALOTRAEPS'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PERS_ID' => 'ID',
            'PERS_IDENTIFICACION' => 'Identificacion',
            'PERS_LUGAREXPEDICION' => 'Lugar Expedicion',
            'PERS_FECHAEXPEDICION' => 'Fecha Expedicion',
            'PERS_PRIMERNOMBRE' => 'Nombre',
            'PERS_SEGUNDONOMBRE' => 'Segundo Nombre',
            'PERS_PRIMERAPELLIDO' => 'Apellido',
            'PERS_SEGUNDOAPELLIDO' => 'Segundo Apellido',
            'PERS_FECHANACIMIENTO' => 'F. Nacimiento',
            'PERS_DIRECCION' => 'Direccion',
            'PERS_BARRIO' => 'Barrio',
            'ZONA_ID' => 'Zona',
            'PERS_TELEFONO' => 'Telefono fijo',
            'PERS_TELEFONOMOVIL' => 'Telefono Movil',
            'PERS_SENDSMS' => 'Enviar sms?',
            'PERS_EMAIL' => 'Email',
            'PERS_SENDMAIL' => 'Enviar email?',
            'PERS_PATHIMG' => 'Foto',
            'PERS_CUALOTRAEPS' => 'Cual Eps?',
            'EPSS_ID' => 'Epss',
            'ESTR_ID' => 'Estrato',
            'NIES_ID' => 'Nivel Estudio',
            'ESCI_ID' => 'Estado Civil',
            'TIID_ID' => 'Tipo Identificacion',
            'TIGE_ID' => 'Sexo',
            'PAIS_ID' => 'Pais',
            'DEPA_ID' => 'Dep',
            'MUNI_ID' => 'Mun',
            'PERS_CREATEBY' => 'Pers  Createby',
            'PERS_UPDATEAT' => 'Pers  Updateat',
			
            'ESAF_ID' => 'Estado',
            'AFIL_FECHAINGRESO' => 'F. Ingreso',
        ];
    }
	
	public function getImgestado() {
       if($this->ESAF_ID==1){
		return Yii::getAlias('@web/img/0.png');
	   }else{
		return Yii::getAlias('@web/img/1.png');   
	   }
    }
	
	public function getGenero() {
        return $this->hasOne(Generos::className(), ['TIGE_ID' => 'TIGE_ID']);
    }
	
	public function getAfiliado() {
        return $this->hasOne(Afiliados::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getTiposidentificaciones() {
        return $this->hasOne(Tiposidentificaciones::className(), ['TIID_ID' => 'TIID_ID']);
    }
	
	public function getEstadosciviles() {
        return $this->hasOne(Estadosciviles::className(), ['ESCI_ID' => 'ESCI_ID']);
    }
	
	public function getAntfamiliares() {
        return $this->hasOne(Antfamiliares::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getAntpersonales() {
        return $this->hasOne(Antpersonales::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getAntginecologicos() { 
        return $this->hasOne(Antginecologicos::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getHabitos() {
        return $this->hasOne(Habitos::className(), ['PERS_ID' => 'PERS_ID']);
    }
	
	public function getZonas() {
        return $this->hasOne(Zonas::className(), ['ZONA_ID' => 'ZONA_ID']);
    }
	
	public function getNivelesestudios() {
        return $this->hasOne(Nivelesestudios::className(), ['NIES_ID' => 'NIES_ID']);
    }
	
	public function getEstractos() {
        return $this->hasOne(Estractos::className(), ['ESTR_ID' => 'ESTR_ID']);
    }
	
	public function getEpss() {
        return $this->hasOne(Epss::className(), ['EPSS_ID' => 'EPSS_ID']);
    }
		
	public function getTime($fechaInicial, $fechaFinal)
	{
	$fecha_actual = $fechaFinal;

	if(!strlen($fecha_actual))
	{
	  $fecha_actual = date('d/m/Y');
	}

	// separamos en partes las fechas 
	$array_nacimiento = explode ( "/", $fechaInicial ); 
	$array_actual = explode ( "/", $fecha_actual ); 

	$anos =  $array_actual[2] - $array_nacimiento[2]; // calculamos años 
	$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses 
	$dias =  $array_actual[0] - $array_nacimiento[0]; // calculamos días 

	//ajuste de posible negativo en $días 
	if ($dias < 0) 
	{ 
	  --$meses; 

	  //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual 
	  switch ($array_actual[1]) { 
		 case 1: 
			$dias_mes_anterior=31;
			break; 
		 case 2:     
			$dias_mes_anterior=31;
			break; 
		 case 3:  
			if ($this->bisiesto($array_actual[2])) 
			{ 
			   $dias_mes_anterior=29;
			   break; 
			} 
			else 
			{ 
			   $dias_mes_anterior=28;
			   break; 
			} 
		 case 4:
			$dias_mes_anterior=31;
			break; 
		 case 5:
			$dias_mes_anterior=30;
			break; 
		 case 6:
			$dias_mes_anterior=31;
			break; 
		 case 7:
			$dias_mes_anterior=30;
			break; 
		 case 8:
			$dias_mes_anterior=31;
			break; 
		 case 9:
			$dias_mes_anterior=31;
			break; 
		 case 10:
			$dias_mes_anterior=30;
			break; 
		 case 11:
			$dias_mes_anterior=31;
			break; 
		 case 12:
			$dias_mes_anterior=30;
			break; 
	  } 

	  $dias=$dias + $dias_mes_anterior;

	  if ($dias < 0)
	  {
		 --$meses;
		 if($dias == -1)
		 {
			$dias = 30;
		 }
		 if($dias == -2)
		 {
			$dias = 29;
		 }
	  }
	}

	//ajuste de posible negativo en $meses 
	if ($meses < 0) 
	{ 
	  --$anos; 
	  $meses=$meses + 12; 
	}

	$tiempo[0] = $anos;
	$tiempo[1] = $meses;
	$tiempo[2] = $dias;

	return $tiempo;
	}

	public function bisiesto($anio_actual){ 
		$bisiesto=false; 
		//probamos si el mes de febrero del año actual tiene 29 días 
		if (checkdate(2,29,$anio_actual)) 
		{ 
			$bisiesto=true; 
		} 
		return $bisiesto; 
	}
}
