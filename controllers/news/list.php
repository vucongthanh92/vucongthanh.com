<?php
	$val = varGet('id');
	$mcat = new Models_MCatNews;
	$db = new Models_MNews;
	$pg = new Paging;
	$id = $mcat->getAlias($val);
	
	$where = " ticlock ='0' AND idcat ='$id' ";
	$select = "*";
	$total = $db->countdata($where);
	
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 8; 
	$div = 8;
	$start = $p * $numrow;

	$select = "*";
	$orderby = "sort desc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['cat'] = $info_cat = $mcat->getOneCatnews($id);
	
	$infonews['page'] = $pg->divPage($total,$p,$div,$numrow,BASE_URL."nhiep-anh/".$info_cat['alias'].".html");
	$infonews['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 $map_title.'<meta itemprop="position" content="1"/>'.
								 $arrowmap.
							 '</li>'.
							 '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 '<a itemprop="item" href="'.BASE_URL.'nhiep-anh.html"><span itemprop="name">'.MN_NHIEPANH.'</span></a>'.
								 '<meta itemprop="position" content="2"/>'.
								 $arrowmap.
							 '</li>'.
							 '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 '<a itemprop="item" href="'.BASE_URL."nhiep-anh/".$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'"><span itemprop="name">'.$info_cat['title_'.lang].'</span></a>'.
								 '<meta itemprop="position" content="3"/>'.
							 '</li>';
	
	loadview("news/view_listnews",$infonews);

?>