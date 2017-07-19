<?php
	$db = new Models_MManufacturer;
	$pg = new Paging;

	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 24;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort desc, Id desc";
	$limit = "$start,$numrow";	
	$where = "ticlock = '0'";
	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPageViet($total,$p,$div,$numrow,BASE_URL."san-pham.html");

	$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							$map_title.'<meta itemprop="position" content="1"/>'.
							$arrowmap.
					   '</li>'.
					   '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							'<a itemprop="item" href="'.BASE_URL.'website.html"><span itemprop="name">Website</span></a>'.
							'<meta itemprop="position" content="2"/>'.
							$arrowmap.
					   '</li>'.
					   '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							'<a itemprop="item" href="'.BASE_URL.'website/giao-dien.html"><span itemprop="name">'.MN_KHOGIAODIEN.'</span></a>'.
							'<meta itemprop="position" content="3"/>'.
					   '</li>';
					   
	loadview("product/list_theme",$sp);
?>