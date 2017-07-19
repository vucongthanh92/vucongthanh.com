<?php
$act = $_GET['act'];
switch($act)
{
	case 'add':		include('controllers/catimages/add.php');break;
	case 'edit':	include('controllers/catimages/edit.php');break;
	case 'del':		include('controllers/catimages/del.php');break;
	case 'list':	include('controllers/catimages/list.php');break;
	case 'save':	include('controllers/catimages/save.php');break;
	default:		include('controllers/catimages/list.php');break;
}
?>