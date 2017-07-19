<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/website/add.php');break;
	case 'edit':	include('controllers/website/edit.php');break;
	case 'del':		include('controllers/website/del.php');break;
	case 'list':	include('controllers/website/list.php');break;
	case 'save':	include('controllers/website/save.php');break;
	default:		include('controllers/website/list.php');break;
}
?>