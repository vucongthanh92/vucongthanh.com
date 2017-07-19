<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

ob_start();

include('../libraries/session.php');

$session_user = new session();





//--------------

include ("../libraries/class_db.php");

include ('../config/config.php');

include ('../config/config_site.php');

include ('../config/config_lang.php');



include ('../libraries/controls.php');

include ('../libraries/functions.php');

include ('../libraries/class.UploadResizeImg.php');

include ('../libraries/paging.php');



include ('../helpers/validation.php');





//-----------------

if(!($session_user->get_var('user_log')))
{
	redirect(BASE_URL_ADMIN.'login.php');
}



// -------------- b�t ng�n ngu cua site

//kiem tra ngon ngu

if(isset($_GET['lang'])){

	$lang = strtolower($_GET['lang']);

	$session_user->set_var("lang",$lang);

}elseif(isset($_SESSION['lang'])){

	$lang = strtolower($_SESSION['lang']);

}else{

	$lang = 'vn'; //default language

	$session_user->set_var('lang',$lang);

}



if(file_exists('language/$lang.php')){

	include 'language/$lang.php';

}else{

//lang not exists, default language

	include ('language/vn.php');

	$session_user->set_var('lang',$lang);

}



?>