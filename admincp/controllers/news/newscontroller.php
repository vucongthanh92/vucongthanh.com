<?php

$act = $_GET['act'];



switch($act)

{

	case 'add':		include('controllers/news/add.php');break;

	case 'edit':	include('controllers/news/edit.php');break;

	case 'del':		include('controllers/news/del.php');break;

	case 'list':	include('controllers/news/list.php');break;

	case 'save':	include('controllers/news/save.php');break;
	case 'laytin':	include('controllers/news/laytin.php');break;
	case 'duyettin':	include('controllers/news/duyettin.php');break;
	
	case 'delete':	include('controllers/news/delete.php');break;
	case 'coppy':	include('controllers/news/coppy.php');break;

	default:		include('controllers/news/list.php');break;

}

?>