<?php
	$db = new Models_MWeblink();
	$pg = new Paging;
	
	//paging
	$p = isset($_GET['p'])?varGetPost('p'):0;
	$numrow = 15;
	$div = 10;
	$total = $db->countdata();
	$start = $p * $numrow;
	$where = "ticlock='0'";
	$limit = "$start,$numrow";	
	$select = "*";
	$order = "Id desc";
	$data['info'] = $db->listdata($select,$where,$order,$limit);
	
	$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."khoa-hoc");
	$data["map_title"] = $map_title.$arrowmap."<a href='khoa-hoc.html'>".KHOAHOC."</a>";
	
	loadview("weblink/view_list",$data);
?>