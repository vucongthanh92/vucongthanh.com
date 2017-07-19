<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/catnews/add.php');break;
	case 'edit':	include('controllers/catnews/edit.php');break;
	case 'del':		include('controllers/catnews/del.php');break;
	case 'list':	include('controllers/catnews/list.php');break;
	case 'save':	include('controllers/catnews/save.php');break;
	default:		include('controllers/catnews/list.php');break;
}
?>