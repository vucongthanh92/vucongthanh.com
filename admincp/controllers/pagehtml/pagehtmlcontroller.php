<?php
	
$act = $_GET['act'];

switch($act)
{
	case "list":	include ("controllers/pagehtml/list.php");break;
	case "add": 	include ("controllers/pagehtml/add.php");break;
	case "edit": 	include ("controllers/pagehtml/edit.php");break;
	case "del": 	include ("controllers/pagehtml/del.php");break;
	default:		include ("controllers/pagehtml/list.php");break;
}
?>