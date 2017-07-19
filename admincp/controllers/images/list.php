<?php

$db = new Models_MImages;
$pg = new Paging;
$where = "";
//paging

$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 10;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);
$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."images/list");

loadview("images/list_view",$data);

?>