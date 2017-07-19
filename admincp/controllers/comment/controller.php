<?php
$act = $_GET['act'];

switch($act) 
{
	case 'add':		include('controllers/comment/add.php');break;
	case 'edit':	include('controllers/comment/edit.php');break;
	case 'del':		include('controllers/comment/del.php');break;
	case 'list':	include('controllers/comment/list.php');break;
	default:		include('controllers/comment/list.php');break;
}
?>