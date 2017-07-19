<?php

if(isset($_GET['id']))
{
	$val = varGet("id");
	$db = new Models_MProduct;
	$pg = new Paging;
 	$id = $db ->getalias($val);
	$sp['idpro'] = $id;
	$sp['prod'] = $db->getOneProduct($id);
	$numrow = 5;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	$db->countView($id);
	/*lay thong tin san pham*/

	if($sp['prod']['idcat']>0){
		$select = "*";
		$orderby = "sort asc";
		$where = "  Id != '$id' AND idcat = ".$sp['prod']['idcat']." AND ticlock= '0'";
		$limit = "$start,$numrow";	
		$sp['map_title'] = $map_title.$arrowmap;
		$mcat = new Models_MCatelog;
		$sp['spcl'] = $db->listdata("*",$where,"rand()",4);
		$sp['cat'] =$info_cat = $mcat->getOneCatelog($sp['prod']['idcat']);

	}
	if($info_cat['parentid'] !=0)
	{
		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);
		if($subcat['parentid'] != 0)
		{
			$subcat2=$mcatelog->getOneCatelog($subcat['parentid']);
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
									'<a itemprop="item" href="'.BASE_URL."website/".$subcat2['alias'].'.html" title="'.$subcat2['title_'.lang].'"><span itemprop="name">'.$subcat2['title_'.lang].'</span></a>'.
									'<meta itemprop="position" content="3"/>'.
							   '</li>';
		}
		else
		{
			$sp['title_pro'] = $subcat['title_'.lang]; 
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
									'<a itemprop="item" href="'.BASE_URL."website/".$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'"><span itemprop="name">'.$info_cat['title_'.lang].'</span></a>'.
									'<meta itemprop="position" content="3"/>'.
							   '</li>';
		}
	}
	else
	{
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
								'<a itemprop="item" href="'.BASE_URL."website/".$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'"><span itemprop="name">'.$info_cat['title_'.lang].'</span></a>'.
								'<meta itemprop="position" content="3"/>'.
						   '</li>';
	}
	
	$sp["adv"] = $mflash->getOneflashLocation(8);
	loadview("product/detail_view",$sp);
}
?>