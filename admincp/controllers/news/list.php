<?php

$db = new Models_MNews;
$pg = new Paging;

//menu cat
$mcatnews = new Models_MCatnews;
$data['catnews'] = $mcatnews->listdata("","","parentid asc","");

if(isset($_POST['id']) || isset($_GET['id']))
{ 

	$idcat = varGetPost("id");
	$date = varGetPost("date");
	$where = "idcat = '$idcat' ";
	$link = "/$idcat";

}
else if(isset($_POST['title']) ) {
		$title = $_POST["title"];
		if(get_magic_quotes_gpc()==false) {
			$title = mysql_escape_string($title);
		}
		$where = " title_vn like   '%$title%'";
}
else {
	$where = "";
	$link = "";
}
//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."news/list$link");

loadview("news/list_view",$data);

?>