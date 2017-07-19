<?php		

switch($mod)

{
	case 'flash': 			include ('controllers/flash/controller.php');break;
	case 'website': 		include ('controllers/website/controller.php');break;
	case 'picture': 		include ('controllers/picture/controller.php');break;	
	case 'project': 		include ('controllers/project/productcontroller.php'); break;
	case 'payment': 		include ('controllers/payment/paymentcontroller.php'); break;	
	case 'titlepage': 		include ('controllers/titlepage/list.php');break;	
	case 'pagehtml': 		include ('controllers/pagehtml/pagehtmlcontroller.php');break;	
	case 'catelog': 		include ('controllers/catelog/catelogcontroller.php');break;
	case 'product': 		include ('controllers/product/productcontroller.php');break;
	case 'news': 			include ('controllers/news/newscontroller.php');break;
	case 'catnews':			include ('controllers/catnews/catnewscontroller.php');break;
	case 'works': 			include ('controllers/works/workscontroller.php');break;
	case 'catworks':		include ('controllers/catworks/catworkscontroller.php');break;		
	case 'weblink': 		include ('controllers/weblink/weblinkcontroller.php');break;
	case 'comment': 		include ('controllers/comment/controller.php');break;
	case 'email': 		    include ('controllers/email/controller.php');break;
	case 'user': 		    include ('controllers/user/usercontroller.php');break;
	case 'manufacturer':    include ('controllers/manufacturer/manufacturercontroller.php');break;
	case 'catimages': 		include ('controllers/catimages/catimagescontroller.php');break;
	case 'images': 		include ('controllers/images/imagescontroller.php');break;
	case 'logout':			include ('logout.php'); break;
	default:				include ('general.php');break;
}

?>