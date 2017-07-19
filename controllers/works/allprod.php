<?php

	$db = new Models_MWorks;
	$mcatelog = new Models_MCatworks;
	$mpicture = new Models_MPicture;
	$pg = new Paging;
	
	$where = " ticlock = '0' ";
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 10;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort desc, Id desc";
	$limit = "$start,$numrow";	

	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page'] = $pg->divPage($total,$p,$div,$numrow,BASE_URL."seo.html");
	$sp['map_title'] = $map_title.$arrowmap."<a href='".BASE_URL."seo.html'>SEO</a>";

	loadview("works/list_view",$sp);

?>