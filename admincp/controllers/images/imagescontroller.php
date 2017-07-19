<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/images/add.php');break;
	case 'edit':	include('controllers/images/edit.php');break;
	case 'del':		include('controllers/images/del.php');break;
	case 'list':	include('controllers/images/list.php');break;
	case 'save':	include('controllers/images/save.php');break;
	default:		include('controllers/images/list.php');break;
}
?>