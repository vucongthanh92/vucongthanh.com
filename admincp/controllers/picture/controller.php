<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/picture/add.php');break;
	case 'edit':	include('controllers/picture/edit.php');break;
	case 'del':		include('controllers/picture/del.php');break;
	case 'list':	include('controllers/picture/list.php');break;
	case 'save':	include('controllers/picture/save.php');break;
	default:		include('controllers/picture/list.php');break;
}
?>