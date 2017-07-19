<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";
switch($act)
{
	case "info-customer":	include("controllers/payment/info_cus.php");break;
	case "addcart":		    include("controllers/payment/addcart.php");break;
	case "editcart":	    include("controllers/payment/editcart.php");break;
	case "delcart":		    include("controllers/payment/delcart.php");break;
	case "showcart":	    include("controllers/payment/showcart.php");break;
	case "showorder":	    include("controllers/payment/dathang.php");break;
	case "check":		    include("controllers/payment/check.php");break;
	case "order":		    include("controllers/payment/order.php");break;
}

?>