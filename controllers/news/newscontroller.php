<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}

switch($act)
{
	case "danh-muc":          include ("controllers/news/list.php");break;
	case "chi-tiet":          include ("controllers/news/detailnews.php");break;
	case "allprod":           include ("controllers/news/allprod.php");break;
	case "album":             include ("controllers/news/album.php");break;
	case "chi-tiet-album":    include ("controllers/news/detail_album.php");break;
}

?>