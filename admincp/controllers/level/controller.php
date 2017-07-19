<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/level/add.php');break;
	case 'edit':	include('controllers/level/edit.php');break;
	case 'del':		include('controllers/level/del.php');break;
	case 'list':	include('controllers/level/list.php');break;
	case 'save':	include('controllers/level/save.php');break;
	default:		include('controllers/level/list.php');break;
}
?>