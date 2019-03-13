<?php
//GLOBAL VARiABLES
global $sql,$session,$config,$phpmailer,$msg,$pg,$view,$viewpage,$option,$pkey,$msg,$status,$siteRoot,$gallery;

define("SPATH_ROOT",dirname(__FILE__));
define("DS",DIRECTORY_SEPARATOR);
define( 'SPATH_ADMIN',	 	    SPATH_ROOT.DS.'admin');
define( 'SPATH_LIBRARIES',	 	SPATH_ROOT.DS.'library');
define( 'SPATH_PLUGINS',		SPATH_ROOT.DS.'plugins');
define( 'SPATH_PUBLIC',			SPATH_ROOT.DS.'public');
define( 'SPATH_MEDIA',			SPATH_ROOT.DS.'media');
define( 'SPATH_CONFIGURATION',  SPATH_ROOT.DS.'configuration');
define( 'SHOST_IMAGES_',		SPATH_MEDIA.DS.'uploaded/');
define( 'SHOST_IMAGES_ADVERTS', SPATH_MEDIA.DS.'uploaded/adverts/');
define( 'SHOST_IMAGES_PRODUCT', SPATH_MEDIA.DS.'uploaded/productphotos/');
define( 'SHOST_IMAGES_PHOTOS',  SPATH_MEDIA.DS.'uploaded/userphotos/');
define( 'SHOST_IMAGES_ARTICLES',SPATH_MEDIA.DS.'uploaded/articles/');
define( 'SHOST_IMAGES_MAGAZINE',SPATH_MEDIA.DS.'uploaded/magazines/');
define( 'SHOST_IMAGES_SLIDES',  SPATH_MEDIA.DS.'uploaded/slides/');
define( 'SHOST_IMAGES_IDCARD',	SPATH_MEDIA.DS.'idcards/');
define( 'SHOST_IMAGES_PASSPIC',	SPATH_MEDIA.DS.'passportpictures/');
define( 'SHOST_PAGES',			SPATH_ADMIN.DS.'pages/');
define( 'SHOST_TEMPLATE',		SPATH_ADMIN.DS.'template/');
define( 'SPATH_APIFUNCTIONS' ,  SPATH_ROOT.DS.'api/classes/' );


//Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited,"",$value);
		$$key = @trim($value);
	}
}

if($_FILES){
	
		foreach($_FILES as $keyimg => $values){	
			foreach($values as $key => $value){
				$$key = $value;
				}
		}
	
	}
//SYSTEM TIMEZONE FORMAT
date_default_timezone_set('UTC');
//This defines the maximum size for each image attached
$MAX_FILE_SIZE = 3;

class JConfig {

	public $secret='86QwesiGyCh77';
	public $debug = false;
	public $autoRollback= true;
	public $ADODB_COUNTRECS = false;
	private static $_instance;	
	public $smsusername ="";
	public $smspassword="";
	public $smsurl="";
	
	public function __construct(){
	}
	
	private function __clone(){}
	
	public static function getInstance(){
	if(!self::$_instance instanceof self){
	     self::$_instance = new self();
	 }
	    return self::$_instance;
	}

}

$config = JConfig::getInstance();

//Enter Your Subfolder Name Here.
$siteRoot = "/colossium/";
	
//included classes
include SPATH_LIBRARIES.DS."Session.class.php";
include SPATH_PLUGINS.DS."adodb".DS."adodb.inc.php";
include SPATH_CONFIGURATION.DS."configuration.php";
include SPATH_LIBRARIES.DS."sql.php";
include SPATH_LIBRARIES.DS."cryptCls.php";
include SPATH_PLUGINS.DS."autoload.php";
include SPATH_LIBRARIES.DS."OrconsMailer.php";

spl_autoload_register(function ($class_name) {
    include SPATH_APIFUNCTIONS.DS. $class_name . '.php';
});

?>