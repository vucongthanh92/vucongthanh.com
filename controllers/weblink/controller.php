<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}
switch($act)
{
	case "danh-muc":include ("controllers/weblink/list.php");break;
	case "chi-tiet":include ("controllers/weblink/detail.php");break;
	default:include ("controllers/hoidap/list.php");break;	
}

?>