<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ob_start();
session_start();
include ("libraries/class_db.php");
include ("config/config.php");
include ("config/config_site.php");
include ("config/title_page.php");
include ("libraries/functions.php");
include ("libraries/controls.php");

$_SESSION['facebook'] = $title['facebook'];
$_SESSION['gplus'] = $title['gplus'];
$_SESSION['twitter'] = $title['twitter'];
$_SESSION['youtube'] = $title['youtube'];
$_SESSION['linkedin'] = $title['linkedin'];
$_SESSION['blogger'] = $title['blogger'];
$_SESSION['hotline'] = $title['hotline'];
$_SESSION['email_send'] = $title['email_send'];
$_SESSION['pass_send'] = $title['pass_send'];
$_SESSION['emaillienhe_vn'] = $title['emaillienhe_vn'];

//kiem tra ngon ngu
if(isset($_POST['lang'])){
	$lang = strtolower($_POST['lang']);
	//session_register("lang");
	$_SESSION['lang'] = $lang;
}elseif(isset($_SESSION['lang'])){
	$lang = strtolower($_SESSION['lang']);
}else{
	$lang = "vn"; //default language
	//session_register("lang");
	$_SESSION['lang']=$lang;
}

if(file_exists("language/$lang.php")){
	include ("language/$lang.php");
}else{
//lang not exists, default language
	include ("language/vn.php");
	//session_register("lang");
	$_SESSION['lang']="vn";
}

$lang = $_SESSION['lang'];
define("lang",$lang);

$map_title = '<a itemprop="item" href="'.BASE_URL.'"><span itemprop="name">'.MN_HOME.'</span></a>';
$arrowmap = "<img class='arrow_label' src='".BASE_URL."public/template/images/arrow.gif'>";
require 'meta.php';
?>