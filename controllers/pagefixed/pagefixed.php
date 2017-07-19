<?php
$mpagehtml = new Models_MPagehtml;
$mnews = new Models_MNews;
$mcat = new Models_MCatnews;
$mcatelog = new Models_MCatelog;
$mflash = new Models_MFlash;
$mcatworks = new Models_MCatworks;
$mproduct = new Models_MProduct;
$mflash = new Models_MFlash();

$menu['slide'] = $mflash->listdata('*','location = "3" AND ticlock = "0"','sort asc, Id desc');
$banner["logo"] = $mflash->getOneflashLocation(2);
$banner["slogan"] = $mflash->getOneflashLocation(1);
$banner['catelog'] = $mcatelog->listdata('*', 'parentid = "0" and ticlock = "0" ','sort asc, Id desc');
$banner['catworks'] = $mcatworks->listdata('*', 'parentid = "0" and ticlock = "0" ','sort asc, Id desc');
$banner['tintuc'] = $mnews->listdata('*', 'home="1" and ticlock="0" ','sort asc, Id desc',5);
$banner['support'] = $title;
$footer['gioithieu'] = $mpagehtml->getpagehtmlid("10");

?>