<?php

$mproduct = new Models_MProduct();
$mcatelog = new Models_MCatelog();
$mflash = new Models_MFlash();
$mnews = new Models_MNews;
$mcatworks = new Models_MCatworks;
$works = new Models_MWorks;
$weblink = new Models_MWeblink;
$pg = new Paging;

$default['website'] = $mproduct->listdata("*","ticlock='0' and hot='1'","sort DESC, Id DESC",5);
$default['seo'] = $works->listdata("*","ticlock='0' and home='1'","sort DESC, Id DESC",5);
$default['nhiepanh'] = $mnews->listdata("*","ticlock='0' AND home='1'","sort DESC, Id DESC",5);
$default['prodhot'] = $mproduct->listdata("*","ticlock= '0'","sort DESC, Id DESC",10);

loadview("default/view_default",$default);

?>