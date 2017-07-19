<?php
$act = $_GET['act'];

switch($act)
{
	case 'del':		include('controllers/email/del.php');break;
	case 'list':	include('controllers/email/list.php');break;
	default:		include('controllers/email/list.php');break;
}
?>