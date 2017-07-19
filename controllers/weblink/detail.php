<?php

	if(isset($_GET['id']))
	{	
		$db = new Models_MWeblink();
		$val = varGet("id");
		$id = $db ->getalias($val);
		$db->countView($id);
		
		$sp['info'] = $db->getOneNews($id,"*");
		$sp['othernews'] = $db->listdata('*','ticlock="0" AND Id !="'.$id.'" ','rand()',4);
		$sp['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 $map_title.'<meta itemprop="position" content="1"/>'.
								 $arrowmap.
							'</li>'.
							'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 '<a itemprop="item" href="'.BASE_URL.'khoa-hoc.html"><span itemprop="name">'.KHOAHOC.'</span></a>'.
								 '<meta itemprop="position" content="2"/>'.
								  $arrowmap.
							'</li>'.
							'<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
								 '<a itemprop="item" href="'.BASE_URL."khoa-hoc/".$sp['info']['alias'].'.html" title="'.$sp['info']['title_'.lang].'"><span itemprop="name">'.$sp['info']['title_'.lang].'</span></a>'.
								 '<meta itemprop="position" content="3"/>'.
							'</li>';
							
		loadview("weblink/view_detail",$sp);
	}

?>