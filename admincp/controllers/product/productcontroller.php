<?php
$act = $_GET['act'];

switch($act)
{
	case 'addto':	include('controllers/product/addto.php');break;
	case 'add':		include('controllers/product/add.php');break;
	case 'edit':	include('controllers/product/edit.php');break;
	case 'del':		include('controllers/product/del.php');break;
	case 'list':	include('controllers/product/list.php');break;
	case 'trash':	include('controllers/product/trash.php');break;
	case 'untrash':	include('controllers/product/untrash.php');break;
	case 'save':	include('controllers/product/save.php');break;
	case 'xoa':	include('controllers/product/xoa.php');break;
	case 'savebrand':	include('controllers/product/savebrand.php');break;
	case 'chondanhmuc':	include('controllers/product/chondanhmuc.php');break;
	case 'chonshop':	include('controllers/product/chonshop.php');break;
	case 'nocatelog':	include('controllers/product/nocatelog.php');break;
	case 'noshop':	include('controllers/product/noshop.php');break;
	case 'getproduct':	include('controllers/product/getproduct.php');break;
	default:		include('controllers/product/list.php');break;
}
?>