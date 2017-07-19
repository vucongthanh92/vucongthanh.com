<?php
$mod = varGetPost('mod');
if(isset($_GET['timkiem']))	 
{   
	include ("controllers/product/search.php"); 
}
else
{
	switch ($mod)
	{
		case "404":			 include ("controllers/404/index.php"); break;
		case "works":		 include ("controllers/works/workscontroller.php"); break;
		case "lien-he":		 include ("controllers/contact/contact.php"); break;
		case "bai-viet":	 include ("controllers/pagehtml/pagehtmlcontroller.php"); break;
		case "tin-tuc":		 include ("controllers/news/newscontroller.php"); break;
		case "san-pham":	 include ("controllers/product/productcontroller.php"); break;
		case "email":		 include ("controllers/email/controller.php"); break;
		case "payment":	     include ("controllers/payment/paymentcontroller.php"); break;
		case "sai-gon":	     include ("controllers/saigon/saigon-controller.php"); break;
		case "khoa-hoc":	 include ("controllers/weblink/controller.php"); break;
		default:             include ("controllers/default/default.php"); break;
	}
}

?>

