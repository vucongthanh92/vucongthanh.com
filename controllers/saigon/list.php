<?php
    
	$sql="select * from mn_comment where ticlock='0' order by sort desc, Id desc";
	$ds = mysql_query($sql) or die(mysql_error());
	$sp['info'] = $ds;
	$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 $map_title.'<meta itemprop="position" content="1"/>'.
							 $arrowmap.
						'</li>'.
						'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
							 '<a itemprop="item" href="'.BASE_URL.'sai-gon-viet-voi.html"><span itemprop="name">'.MN_SAIGONVIETVOI.'</span></a>'.
							 '<meta itemprop="position" content="2"/>'.
						'</li>';

	loadview("saigon/list_view",$sp);
?>