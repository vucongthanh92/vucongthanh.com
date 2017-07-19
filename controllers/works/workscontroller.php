<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else $act = "";

switch($act)
{
	case 'chi-tiet':		include('controllers/works/detail.php');break;
	case 'danh-muc':		include('controllers/works/list.php');break;
	case 'allprod':			include('controllers/works/allprod.php');break;
}
?>