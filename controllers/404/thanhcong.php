<div id="index-box">
<?php loadview('pagefixed/left'); ?>
<div id="box-h-right">
<div class="breadcrumb"><?php  echo $map_title.$arrowmap." Khuyến  mãi"; ?></div>
<?php
$mflash = new Models_MFlash();
$adv = $mflash->listdata('file_vn,file_en,link', 'location = "4" AND ticlock = "0"','sort asc, Id desc');
?>
<div class="adv-bottom">
<?php 
if(!empty($adv)){
   foreach($adv as $item){
?>
<a href="<?php echo $item['link'] ?>" target="_blank">
<img  src="<?php echo PATH_IMG_FLASH.$item['file_vn'] ?>"   />
</a>
<?php }} ?>
</div>
</div>
</div>