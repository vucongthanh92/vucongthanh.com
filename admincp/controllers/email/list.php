<?php

$db = new Models_MEmail;
$pg = new Paging;

//menu cat
$mcatnews = new Models_MCatnews;
$data['catnews'] = $mcatnews->listdata("","","parentid asc","");

if(isset($_POST['idcat']) || isset($_GET['idcat']))
{
	$idcat = varGetPost("idcat");
	$where = "idcat = '$idcat'";
	$link = "/$idcat";
}else{
	$where = '';
	$link = '';
}

//paging
$p = isset($_GET['p'])?varGetPost('p'):0;
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata("","","Id desc","$start,$numrow");

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."email/list$link");

loadview("email/list_view",$data);

?>