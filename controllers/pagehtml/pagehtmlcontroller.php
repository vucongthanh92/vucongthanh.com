<?php
	
$act = $_GET['act'];

switch($act)
{
	case "chi-tiet":	include ("controllers/pagehtml/detail.php");break;
	default:		include ("controllers/pagehtml/detail.php");break;
}
?>