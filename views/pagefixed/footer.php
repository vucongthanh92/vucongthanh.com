<?php
   $db = new Models_MWebsite;
   $mcatnews = new Models_MCatnews;
   $mcatworks = new Models_MCatworks;
   $mcatelog = new Models_MCatelog;
   $row_web = $db->getOneWebsite(1);
?>

<footer class="footer">
     <div class="ft_grid" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
          <nav class="box_website">
               <h4 itemprop="name" class="box_left_label"><a itemprop="url" href="<?=BASE_URL."website.html";?>"><?=WEBSITE?></a></h4>
               <?php
				   $ds = $mcatelog->listdata("*","ticlock='0' and parentid='0'","sort asc, Id desc");
				   if(!empty($ds)){
				   foreach($ds as $item) {
			   ?>
			   <a href="<?=BASE_URL."website/".$item['alias'].".html";?>"><div class="box_left_row"><?=$item['title_'.lang];?></div></a>
			   <?php }} ?>
          </nav>
          <nav class="box_left">
               <h4 itemprop="name" class="box_left_label"><a itemprop="url" href="<?=BASE_URL."nhiep-anh.html"?>"><?=MN_NHIEPANH?></a></h4>
               <a href="<?=BASE_URL."nhiep-anh/album.html";?>"><div class="box_left_row"><?=MN_ALBUM?></div></a>
               <?php
				   $ds3 = $mcatnews->listdata("*","ticlock='0'","sort asc, Id desc");
				   if(!empty($ds3)){
				   foreach($ds3 as $item3) {
			   ?>
			   <a href="<?=BASE_URL."nhiep-anh/".$item3['alias'].".html";?>"><div class="box_left_row"><?=$item3['title_'.lang];?></div></a>
			   <?php }} ?>
          </nav>
          <nav class="box_left">
               <h4 itemprop="name" class="box_left_label"><a itemprop="url" href="<?=BASE_URL."seo.html"?>"><?=DICHVUSEO?></a></h4>
               <?php
				   $ds2 = $mcatworks->listdata("*","ticlock='0'","sort asc, Id desc");
				   if(!empty($ds2)){
				   foreach($ds2 as $item2) {
			   ?>
			   <a href="<?=BASE_URL."seo/".$item2['alias'].".html";?>"><div class="box_left_row"><?=$item2['title_'.lang];?></div></a>
			   <?php }} ?>
          </nav>
          <!--------------------------------------->
          <div class="ft_social" itemscope itemtype="http://schema.org/Organization">
              <h4 class="ft_social_label"><?=KETNOIVOICHUNGTOI?></h4>
              <link itemprop="url" href="<?=BASE_URL;?>">
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['facebook']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_facebook.png";?>" />
              </a></div>
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['twitter']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_twitter.png";?>" />
              </a></div>
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['gplus']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_gplus.png";?>" />
              </a></div>
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['youtube']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_youtube.png";?>" />
              </a></div>
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['linkedin']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_in.png";?>" />
              </a></div>
              <div class="ft_social_info"><a itemprop="sameAs" rel="nofollow" href="<?=$_SESSION['blogger']?>">
                  <img class="ft_social_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon_bloger.png";?>" />
              </a></div>
          </div>
          
          <!--fanpage footer-->
          <div class="ft_info">
               <div class="fb-page" data-href="https://www.facebook.com/seovswebsite/" data-tabs="timeline" data-width="400" data-height="135" 
               data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
               <blockquote cite="https://www.facebook.com/seovswebsite/" class="fb-xfbml-parse-ignore">
               <a href="https://www.facebook.com/congtythietke247/?fref=ts">Thiết kế website Vũ Công Thành</a></blockquote></div>
          </div>
          <!------------------>
          
          <div style="clear:both"></div>
     </div>
     
     <div class="cpf">
          <div class="h-card vcard"><span class="p-org org">Design and Deverlopment by </span>
               <a class="p-name fn" href="<?=BASE_URL;?>">Vũ Công Thành</a> - vucongthanh92@gmail.com
               <!------------------------------------------->
               <div class="dcma_box"><a target="_blank" href="http://www.dmca.com/Protection/Status.aspx?ID=7e88b1b4-8390-44e3-a1b8-7e88d1443a77" 
               title="DMCA.com Protection Status" class="dmca-badge">
               <img src="//images.dmca.com/Badges/dmca-badge-w100-5x1-08.png?ID=7e88b1b4-8390-44e3-a1b8-7e88d1443a77" 
               alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
               </div>
               <!------------------------------------------->
          <div style="clear:both"></div>
     </div>
</footer>


<!--menu bottom mobie-->
<span class="mb_right_hotline">
    <span class="mb_bar">
    <ul>
       <li><span class="bar_dm">Danh mục</span></li>
       <li><a href="tel:<?=$_SESSION['hotline'];?>"><span><?=$_SESSION['hotline'];?></span></a></li>
       <li><a href="/"> <span>Trang chủ</span></a></li>
       <li><a href="sms:<?=$_SESSION['hotline'];?>"> <span id="bar_zopim">Gửi tin nhắn</span></a></li>
    </ul>
    <img class="icon_bottom" style="width:100%;z-index:0;" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL.USER_PATH_IMG;?>mb_bar_bgsk.png">
    </span>
</span>
<div class="overlay-open-menu "></div>
<!----------------------->

<!-----------menu left mobi------------>
<div class="slidebarmenu">
    <div id="accordiondemo4">
         <div id="menu_accor1" class="iconx"><img alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."public/template/images/icon-x.png";?>"></div>
         
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL;?>"><?=MN_HOME?></a></h3>
         </div>
         
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."gioi-thieu.html"?>"><?=MN_GIOITHIEU?></a></h3>
         </div>
         
         <!--menu danh mục website-->
         <div class="according_box">
            <h3 class="according_parent"><a onClick="return false" href="<?=BASE_URL."website.html";?>">Website</a></h3>
            <div class="accordion">
               <p class="according_child"><a href="<?=BASE_URL."website/giao-dien.html";?>"><?=MN_KHOGIAODIEN?></a></p>
            <?php
               $ds = $mcatelog->listdata("*","ticlock='0' and parentid='0'","sort asc, Id desc");
               if(!empty($ds)){
               foreach($ds as $item) {
            ?>
               <p class="according_child"><a href="<?=BASE_URL."website/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></p>
            <?php }} ?>
            </div>
         </div>
         <!-------------------------->
         
         <!--menu danh mục seo-->
         <div class="according_box">
            <h3 class="according_parent"><a onClick="return false" href="<?=BASE_URL."seo.html";?>">Seo</a></h3>
            <div class="accordion">
            <?php
			    $ds2 = $mcatworks->listdata("*","ticlock='0'","sort asc, Id desc");
                if(!empty($ds2)){
                foreach($ds2 as $item2) {
            ?>
               <p class="according_child"><a href="<?=BASE_URL."seo/".$item2['alias'].".html";?>"><?=$item2['title_'.lang];?></a></p>
            <?php }} ?>
            </div>
         </div>
         <!-------------------------->
         
         <!--menu danh mục nhiếp ảnh-->
         <div class="according_box">
            <h3 class="according_parent"><a onClick="return false" href="<?=BASE_URL."nhiep-anh.html";?>"><?=MN_NHIEPANH?></a></h3>
            <div class="accordion">
               <p class="according_child"><a href="<?=BASE_URL."nhiep-anh/album.html";?>"><?=MN_ALBUM?></a></p>
            <?php
			    $ds3 = $mcatnews->listdata("*","ticlock='0'","sort asc, Id desc");
                if(!empty($ds3)){
                foreach($ds3 as $item3) {
            ?>
               <p class="according_child"><a href="<?=BASE_URL."nhiep-anh/".$item3['alias'].".html";?>"><?=$item3['title_'.lang];?></a></p>
            <?php }} ?>
            </div>
         </div>
         <!-------------------------->
         
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."sai-gon-viet-voi.html"?>"><?=MN_SAIGONVIETVOI?></a></h3>
         </div>
         
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."lien-he.html"?>"><?=MN_LIENHE?></a></h3>
         </div>
         
    </div>
    <div style="clear:both;"></div>
</div>
<!------------------------------------------------>