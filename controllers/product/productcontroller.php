<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";
switch($act)
{
	case 'tim-kiem':			include('controllers/product/search.php');break;
	case 'chi-tiet':			include('controllers/product/detail.php');break;
	case 'danh-muc':			include('controllers/product/list.php');break;
	case 'allprod':			    include('controllers/product/allprod.php');break;
	case 'theme':			    include('controllers/product/theme.php');break;
	case 'chi-tiet-theme':		include('controllers/product/detail_theme.php');break;
}
?>