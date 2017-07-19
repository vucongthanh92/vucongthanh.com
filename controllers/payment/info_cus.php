<?php
$cart['danhmuc']= $mcatelog->listdata('*', ' parentid = "0" AND ticlock = "0"','sort asc, Id desc');
$cart['adv'] = $mflash->listdata('file_vn,file_en,link', 'location = "4"','sort asc, Id desc');
$cart['adv2'] = $mflash->listdata('file_vn,file_en,link', 'location = "3"','sort asc, Id desc');
$cart['news'] = $mnews -> listdata("Id,title_".lang,"ticlock ='0' and idcat = '6'","Id desc","10");
$cart['map_title'] = $map_title.$arrowmap." Đặt hàng thành công";	
loadview('payment/info_cus',$cart);
?>