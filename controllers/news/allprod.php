<?php
	$mcat = new Models_MCatNews;
	$db = new Models_MNews;
	$pg = new Paging;

	$where = " ticlock ='0'";
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 5; 
	$div = 8;
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort desc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info']=$db->listdata($select,$where,$orderby,$limit);
	$infonews['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 $map_title.'<meta itemprop="position" content="1"/>'.
								 $arrowmap.
							 '</li>'.
							 '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 '<a itemprop="item" href="'.BASE_URL.'nhiep-anh.html"><span itemprop="name">'.MN_NHIEPANH.'</span></a>'.
								 '<meta itemprop="position" content="2"/>'.
							 '</li>';
	
	loadview("news/view_allprod",$infonews);

?>