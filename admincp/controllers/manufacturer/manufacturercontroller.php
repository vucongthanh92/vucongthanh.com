<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/manufacturer/add.php');break;
	case 'edit':	include('controllers/manufacturer/edit.php');break;
	case 'del':		include('controllers/manufacturer/del.php');break;
	case 'list':	include('controllers/manufacturer/list.php');break;
	case 'save':	include('controllers/manufacturer/save.php');break;
	default:		include('controllers/manufacturer/list.php');break;
}
?>