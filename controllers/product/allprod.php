<?php
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
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
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."website.html");
	$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							$map_title.'<meta itemprop="position" content="1"/>'.
							$arrowmap.
					   '</li>'.
					   '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							'<a itemprop="item" href="'.BASE_URL.'website.html"><span itemprop="name">Website</span></a>'.
							'<meta itemprop="position" content="2"/>'.
					   '</li>';
					   
	loadview("product/list_sp",$sp);
?>