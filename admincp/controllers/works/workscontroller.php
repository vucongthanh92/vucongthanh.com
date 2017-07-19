<?php
$act = $_GET['act'];
switch($act)
{
	case 'add':		include('controllers/works/add.php');break;
	case 'edit':	include('controllers/works/edit.php');break;
	case 'del':		include('controllers/works/del.php');break;
	case 'list':	include('controllers/works/list.php');break;
	case 'save':	include('controllers/works/save.php');break;
	case 'addimages':	include('controllers/works/addimages.php');break;
	case 'editimages':	include('controllers/works/editimages.php');break;
	case 'delimages':	include('controllers/works/delimages.php');break;
	case 'saveimages':	include('controllers/works/saveimages.php');break;
	default:		include('controllers/works/list.php');break;
}

?>