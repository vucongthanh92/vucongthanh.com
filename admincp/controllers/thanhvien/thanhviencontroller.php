<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/thanhvien/add.php');break;
	case 'edit':	include('controllers/thanhvien/edit.php');break;
	case 'del':		include('controllers/thanhvien/del.php');break;
	case 'list':	include('controllers/thanhvien/list.php');break;
	case 'save':	include('controllers/thanhvien/save.php');break;
	default:		include('controllers/thanhvien/list.php');break;
}
?>