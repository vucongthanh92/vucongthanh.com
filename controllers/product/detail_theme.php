<?php
	$db = new Models_MManufacturer;
	$val = varGet("id");
	$id = $db -> getAlias($val);
	$sp['prod'] = $db->getOneRows($id);
	$sp['spcl'] = $db->listdata("*","ticlock='0' and Id<>'$id'","rand()",4);
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
					   
	loadview("product/view_detail_theme",$sp);
?>