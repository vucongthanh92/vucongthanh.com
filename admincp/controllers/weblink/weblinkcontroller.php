<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/weblink/add.php');break;
	case 'edit':	include('controllers/weblink/edit.php');break;
	case 'del':		include('controllers/weblink/del.php');break;
	case 'list':	include('controllers/weblink/list.php');break;
	case 'save':	include('controllers/weblink/save.php');break;
	default:		include('controllers/weblink/list.php');break;
}
?>