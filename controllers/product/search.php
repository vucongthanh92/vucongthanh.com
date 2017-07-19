<?php
	$db = new Models_MProduct;
	$pg = new Paging;
	 $mcatelog = new Models_MCatelog;
	 
	$query =explode('?',$_SERVER['REQUEST_URI']);
	$arr = getParam($query[1]);
	$sp['tukhoa']= $tukhoa = $arr["q"];
	
	$sp['q'] = $q = mysql_real_escape_string($tukhoa); 
	
	$where = "ticlock = '0' AND ( title_vn like '%".$q."%'  )";
	$p = (int)str_replace('/p','',$arr['p']);
	$numrow = 25;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	
	
	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	$sp['prod'] = $db->listdata($select,$where,$orderby,$limit);
	
	$link = BASE_URL."search/?q=".$q."&p=";

	$sp['page']=$pg->divPage($total,$p,$div,$numrow,$link);
	
	$sp['title_pro'] = "Tìm kiếm";
	$sp['total'] = $total;
	$sp['tukhoa'] = $tukhoa;
	
	$sp['map_title'] = $map_title.$arrowmap."<a href=''>Tìm kiếm</a>";
	
	$sp['support'] = $title;

	loadview("product/searchnc_view",$sp);
?>