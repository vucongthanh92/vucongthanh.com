<?php

######################################
# general
//fix base

$server_name = $_SERVER['HTTP_HOST'];
define("BASE_URL","http://$server_name/");
define("PREFIX","mn_");
define("TBL_LEVEL","".PREFIX."level");
define("TBL_PAGEHTML","".PREFIX."pagehtml");
define("TBL_CATNEWS","".PREFIX."catnews");
define("TBL_NEWS","".PREFIX."news");
define("TBL_WEBSITE","".PREFIX."website");
define("TBL_CATELOG","".PREFIX."catelog");
define("TBL_WEBLINK","".PREFIX."weblink");
define("TBL_PRODUCT","".PREFIX."product");
define("TBL_FLASH","".PREFIX."flash");
define("TBL_WORKS","".PREFIX."works");
define("TBL_CATWORKS","".PREFIX."catworks");
define("TBL_COMMENTCAT","".PREFIX."commentcat");
define("TBL_ADMIN","".PREFIX."admin");
define("TBL_CUSTOMER","".PREFIX."customer");
define("TBL_PICTURE","".PREFIX."picture");
define("TBL_CUSTOMER_CART","".PREFIX."customer_cart");
define("TBL_COMMENT","".PREFIX."comment");
define("TBL_MANUFACTURER","".PREFIX."manufacturer");
define("TBL_EMAIL","".PREFIX."email");
define("TBL_CATIMAGES","".PREFIX."catimages");
define("TBL_IMAGES","".PREFIX."images");
define("TBL_SAIGON","".PREFIX."comment");

################################################
# trang giao dien 
//config thu muc hinh anh, css, java giao dien nguoi dung

define("USER_PATH_JS","public/js/");
define("USER_PATH_CAPTCHA","public/captcha/");
define("USER_PATH_IMG","public/template/images/");
define("USER_PATH_CSS","public/template/css/");
define("PATH_IMG_NEWS","data/News/");
define('PATH_IMG_PARTNERS','data/Partners/');
define("PATH_IMG_PRODUCT","data/Product/");
define('PATH_IMG_PICTURE','data/Picture/');
define('PATH_IMG_WORKS','data/Works/');
define('PATH_IMG_FLASH','data/Flash/');
define("PATH_IMG_USER","data/User/");
define("PATH_IMG_CATELOG","data/Catelog/");

#################################################

# admin

define("BASE_URL_ADMIN","".BASE_URL."admincp/");
define("ADMIN_PATH_PUBLIC","".BASE_URL_ADMIN."public/");
define("ADMIN_PATH_JS","".BASE_URL_ADMIN."public/js/");
define("ADMIN_PATH_IMG","".BASE_URL_ADMIN."public/template/");
define("ADMIN_PATH_CSS","".BASE_URL_ADMIN."public/css/");

?>