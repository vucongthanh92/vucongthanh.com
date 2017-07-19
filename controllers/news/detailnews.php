<?php
if(isset($_GET['id']))
{	
	$mnews = new Models_MNews;
	$val = varGet("id");
	//$id = substr($val,0,strpos($val, '-'));
	$id = $mnews->getAlias($val);
	$mnews->countView($id);

	$arr['info'] = $mnews -> getOneNews($id,"*");
	$idcat = $arr['info']['idcat']; 
	$mcat = new Models_MCatNews;
	$arr['cat'] = $info_cat = $mcat->getOneCatnews($idcat);
	$arr['title'] = $info_cat['title_vn'];
	$url = "<a href='/chu-de/".$info_cat['alias'].".html'>".$info_cat["title_".lang]."</a>";
	$arr['othernews'] = $mnews -> listdata("*","Id != '$id' and ticlock ='0' and idcat='".$idcat."'","rand()",4);
	
	$arr['map_title'] = 
	    '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
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
	
	loadview("news/view_detailnews",$arr);
}
?>