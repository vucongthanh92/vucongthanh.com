<?php
	$db = new Models_MWorks;
	$mcatelog = new Models_MCatworks;
	$pg = new Paging;

	$val = varGet("id");
	$id = $mcatelog ->getalias($val);
	$sp['cat']= $info_cat = $mcatelog->getOneCatelog($id);
	$subid =  $mcatelog->getSubId($id);
	if($subid != ""){
		$subid = substr($subid,0,-1);
		 $where = " idcat in ($id,$subid) and ticlock = '0' ";
	}else{
		$where = " ticlock ='0' and idcat = '$id'  ";
	}
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort desc, Id desc";
	$limit = "$start,$numrow";	

	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$info_cat['alias']);
	
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

	loadview("works/list_view",$sp);

?>