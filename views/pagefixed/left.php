<?php
	$mproduct = new Models_MProduct;
	$mflash = new Models_MFlash;
	$mnews = new Models_MNews;
	$mtheme = new Models_MManufacturer;
	$list_theme = $mtheme -> listdata('*','ticlock="0"','Id desc','10');
?>

<aside class="wap-left">
   
   <!--phần khóa học cột left-->
   <h3 class="title-left"><div><span><a href="<?=BASE_URL."khoa-hoc.html"?>"><?=KHOAHOC?></a></span></div></h3>
   <div class="box-left">
   <?php
       $sql2 = "select * from mn_weblink where ticlock='0' and hot='1' order by sort asc, Id desc limit 10";
	   $ds2 = mysql_query($sql2) or die(mysql_error());
	   while($row2 = mysql_fetch_assoc($ds2)) {
   ?>
       <div class="newsleft_box">
        <a title="<?=$row2['title_'.lang];?>" href="<?=BASE_URL."khoa-hoc/".$row2['alias'].".html";?>">
           <img class="newsleft_box_img" src="<?=BASE_URL."data/KhoaHoc/".$row2['images'];?>" alt="<?=$row2['title_'.lang];?>">
           <h5 class="newsleft_box_title"><?=$row2['title_'.lang];?></h5>
           <div style="clear:both"></div>
        </a>
   </div>
   <?php } ?>
   </div>
   <!------------------------->
   
   <!--phần giao diện web cột left-->
   <h3 class="title-left"><a href="<?=BASE_URL."website/giao-dien.html"?>"><?=MN_KHOGIAODIEN?></a></h3>
   <div class="box-left">
   <?php
       if(!empty($list_theme)){
       foreach($list_theme as $item){
   ?>
   <div class="newsleft_box">
        <a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>">
           <img class="newsleft_box_img" src="<?=BASE_URL."data/Theme/".$item['images'];?>" alt="<?=$item['title_'.lang];?>">
           <h5 class="newsleft_box_title"><?=$item['title_'.lang];?></h5>
           <div class="newsleft_box_date"><?=date("d/m/Y",$item['date'])?></div>
           <div style="clear:both"></div>
        </a>
   </div>
   <?php }} ?>
   </div>
   <!------------------------->

   <!--phần album cột left-->
   <h3 class="title-left"><div><span><a href="<?=BASE_URL."nhiep-anh/album.html"?>"><?=MN_ALBUM?></a></span></div></h3>
   <div class="box-left">
   <?php
       $sql="select * from mn_catimages where ticlock='0' order by sort asc, Id desc limit 10";
	   $ds=mysql_query($sql) or die(mysql_error());
	   while($row=mysql_fetch_assoc($ds)) {
   ?>
       <div class="newsleft_box">
        <a title="<?=$row['title_'.lang];?>" href="<?=BASE_URL."nhiep-anh/album/".$row['alias'].".html";?>">
           <img class="newsleft_box_img" src="<?=BASE_URL."data/NhomAlbum/".$row['images'];?>" alt="<?=$row['title_'.lang];?>">
           <h5 class="newsleft_box_title"><?=$row['title_'.lang];?></h5>
           <div style="clear:both"></div>
        </a>
   </div>
   <?php } ?>
   </div>
   <!------------------------->
</aside>
