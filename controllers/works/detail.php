<?php
if(isset($_GET['id']))
{
	$val = varGet("id");
	$mcat = new Models_MCatworks;
	$db = new Models_MWorks;
	$mpicture = new Models_MPicture;
	$pg = new Paging;
	
 	$id = $db ->getalias($val);
	$sp['idpro'] = $id;
	$sp['prod'] = $db->getOneProduct($id);
	$idcat=$sp['prod']['idcat'];
	$numrow = 5;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	$db->countView($id);
	if($sp['prod']['idcat']>0)
	{
		$sp['map_title'] = $map_title.$arrowmap;
		$sp['cat'] = $info_cat = $mcat->getOneCatelog($sp['prod']['idcat']);
	}
	
	$sp['spcl'] = $db->listdata("*","ticlock='0' and idcat='$idcat' and Id!=$id","rand()",4);
	$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
	                        $map_title.'<meta itemprop="position" content="1"/>'.
					   	    $arrowmap.
					   '</li>'.
	                   '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
					        '<a itemprop="item" href="'.BASE_URL.'seo.html"><span itemprop="name">Seo</span></a>'.
							'<meta itemprop="position" content="2"/>'.
							$arrowmap.
					   '</li>'.
					   '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
	                        '<a itemprop="item" href="'.BASE_URL."seo/".$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'"><span itemprop="name">'.$info_cat['title_'.lang].'</span></a>'.
							'<meta itemprop="position" content="3"/>'.
					   '</li>';
					   
	loadview("works/detail_view",$sp);
}

?>