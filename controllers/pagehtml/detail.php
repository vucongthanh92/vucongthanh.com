<?php
	$id = varGet("id");
	$mpagehtml = new Models_MPageHtml;
	$pagehtml['info'] = $mpagehtml->getpagehtmlid($id);
	$pagehtml['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								  $map_title.'<meta itemprop="position" content="1"/>'.
								  $arrowmap.
							 '</li>'.
							 '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								  '<a itemprop="item" href="'.BASE_URL.'gioi-thieu.html" title="'.$pagehtml['info']['title_'.lang].'"><span itemprop="name">'.$pagehtml['info']['title_'.lang].'</span></a>'.
								  '<meta itemprop="position" content="2"/>'.
							 '</li>';
	loadview("pagehtml/detail_view",$pagehtml);
?>