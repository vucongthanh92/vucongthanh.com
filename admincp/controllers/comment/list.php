<?php

$db = new Models_MComment();
$pg = new Paging;

//paging
$p = isset($_GET['p'])?varGetPost('p'):0;
$numrow = 15;
$div = 10;
$total = $db->countdata();
$start = $p * $numrow;

$data['info'] = $db->listdata("",$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."comment/list");

loadview("comment/list_view",$data);

?>