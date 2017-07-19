<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";
switch($act)
{
	case 'chi-tiet':		include('controllers/saigon/detail.php');break;
	case 'danh-muc':		include('controllers/saigon/list.php');break;
}
?>