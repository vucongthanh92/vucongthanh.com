<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/flash/add.php');break;
	case 'edit':	include('controllers/flash/edit.php');break;
	case 'del':		include('controllers/flash/del.php');break;
	case 'list':	include('controllers/flash/list.php');break;
	case 'save':	include('controllers/flash/save.php');break;
	default:		include('controllers/flash/list.php');break;
}
?>