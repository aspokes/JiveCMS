<?php
include "../config.php";

include SPATH_LIBRARIES.DS."engine.Class.php";
include SPATH_LIBRARIES.DS."login.Class.php";

if(isset($action) && strtolower($action) == 'login'){
include('pages/login/login.php');
	die();
}

$log = new Login();

if(isset($action) && strtolower($action) == 'logout'){
$log->logout();
}
if(isset($doLogin) && $doLogin == 'systemPingPass'){
	header('Location: index.php?action=index&pg=dashboard');
	die('Please wait...redirecting page');
}

//INSIDE THE SYSTEMS NOW
$engine = new engineClass();
$config = new JConfig();


//ini_set('display_errors', 0);

include("pages/platform.php");

?>