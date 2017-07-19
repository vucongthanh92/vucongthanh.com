<?php

	$pg = new Paging;	
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 24;
	$div = 10;
	$start = $p * $numrow;
	$select = "*";
	$orderby = " sort desc, Id desc ";
	$limit = " $start,$numrow ";

	$sql="select * from mn_catimages where ticlock='0' order by $orderby limit $limit";
	$ds=mysql_query($sql) or die(mysql_error());
	
	$total = mysql_num_rows($ds);
	$sp['pro_1'] = $ds;	
	$sp['page'] = $pg->divPageViet($total,$p,$div,$numrow,BASE_URL."nhiep-anh/album.html");

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
						'</li>';
						
	loadview("news/list_album",$sp);
?>