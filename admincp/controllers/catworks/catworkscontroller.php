<?php
$act = $_GET['act'];
switch($act)
{
	case 'add':		include('controllers/catworks/add.php');break;
	case 'edit':	include('controllers/catworks/edit.php');break;
	case 'del':		include('controllers/catworks/del.php');break;
	case 'list':	include('controllers/catworks/list.php');break;
	case 'save':	include('controllers/catworks/save.php');break;
	default:		include('controllers/catworks/list.php');break;
}
?>