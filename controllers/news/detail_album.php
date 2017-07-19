<?php
	$val = varGet("id");
	$mcat = new Models_MCatimages;
	$mimg = new Models_MImages;
	
	$id = $mcat ->getalias($val);
	$sp['cat'] = $info_cat = $mcat->getOneCatelog($id);
	$sp['prod_1'] = $mimg->listdata("*","idcat='".$id."' AND ticlock='0'","sort ASC, Id DESC","1");
	$sp['prod'] = $mimg->listdata("*","idcat='".$id."' AND ticlock='0'","sort ASC, Id DESC");
	$sp['spcl'] = $mcat->listdata("*","ticlock='0' and Id<>'$id'","rand()",4);
	$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 $map_title.'<meta itemprop="position" content="1"/>'.
							 $arrowmap.
						'</li>'.
						'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 '<a itemprop="item" href="'.BASE_URL.'nhiep-anh.html"><span itemprop="name">'.MN_NHIEPANH.'</span></a>'.
							 '<meta itemprop="position" content="2"/>'.
							 $arrowmap.
						'</li>'.
						'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 '<a itemprop="item" href="'.BASE_URL.'nhiep-anh/album.html"><span itemprop="name">'.MN_ALBUM.'</span></a>'.
							 '<meta itemprop="position" content="3"/>'.
							 $arrowmap.
						'</li>'.
						'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 '<a href="/nhiep-anh/album/'.$info_cat['alias'].'.html" title="'.$info_cat['title'.lang].'"><span itemprop="name">'.$info_cat['title_'.lang].'</span></a>'.
							 '<meta itemprop="position" content="4"/>'.
						'</li>';
	
	loadview("news/view_detail_album",$sp);
?>