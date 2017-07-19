<?php

$act = varGetPost("act");

switch($act)
{
	case "today":	include ("today.php");break;
	case "xacnhan":	include ("xacnhan.php");break;  
	case "chuaxacnhan":	include ("chuaxacnhan.php");break;  
	case "dahuy":	include ("dahuy.php");break;
	case "thanhcong":	include ("thanhcong.php");break;
	case "list":	include ("list.php");break;
	case "edit":	include ("detail.php");break;
	case "del":		include ("del.php");break;
}

?>