<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/catelog/add.php');break;
	case 'edit':	include('controllers/catelog/edit.php');break;
	case 'del':		include('controllers/catelog/del.php');break;
	case 'list':	include('controllers/catelog/list.php');break;
	case 'save':	include('controllers/catelog/save.php');break;
	default:		include('controllers/catelog/list.php');break;
}
?>