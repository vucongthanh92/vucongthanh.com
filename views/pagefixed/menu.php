<?php
    $mcatworks = new Models_MCatworks;
	$mcatelog = new Models_MCatelog;
	$mcatnews = new Models_MCatNews;
?>

<!--phần menu trên top-->
<div class="header-right-wrap"> 
    <nav id="site-navigation" class="main-navigation">
    <ul class="wpc-menu">
        <li <?php if($mod == "") echo 'class="selected"';?>><a href="<?=BASE_URL?>"><?=MN_HOME?></a></li>
        <li><a href="<?=BASE_URL."gioi-thieu.html"?>"><?=MN_GIOITHIEU?></a></li>
        <!--phần menu website-->
        <li><a href="<?=BASE_URL."website.html"?>"><?=WEBSITE?></a>
            <ul class="dropdown-menu">
            <li><a href="<?=BASE_URL."website/giao-dien.html";?>"><?=MN_KHOGIAODIEN?></a></li>
			<?php
			    $ds = $mcatelog->listdata("*","ticlock='0' and parentid='0'","sort asc, Id desc");
                if(!empty($ds)){
                foreach($ds as $item) {
            ?>
            <li><a href="<?=BASE_URL."website/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></li>
            <?php }} ?>
            </ul>
        </li>
        <!----------------------->
        <!--phần menu kiến thức seo-->
        <li><a href="<?=BASE_URL."seo.html"?>"><?=DICHVUSEO?></a>
            <?php
			    $ds2 = $mcatworks->listdata("*","ticlock='0'","sort asc, Id desc");
                if(!empty($ds2)){
				echo '<ul class="dropdown-menu">';
                foreach($ds2 as $item2) {
            ?>
            <li><a href="<?=BASE_URL."seo/".$item2['alias'].".html";?>"><?=$item2['title_'.lang];?></a></li>
            <?php } echo '</ul>'; } ?>
        </li>
        <!--------------------------->
        <!--phần menu nhiếp ảnh-->
        <li><a href="<?=BASE_URL."nhiep-anh.html"?>"><?=MN_NHIEPANH?></a>
            <ul class="dropdown-menu">
            <li><a href="<?=BASE_URL."nhiep-anh/album.html";?>"><?=MN_ALBUM?></a></li>
			<?php
			    $ds3 = $mcatnews->listdata("*","ticlock='0'","sort asc, Id desc");
                if(!empty($ds3)){
                foreach($ds3 as $item3) {
            ?>
            <li><a href="<?=BASE_URL."nhiep-anh/".$item3['alias'].".html";?>"><?=$item3['title_'.lang];?></a></li>
            <?php }} ?>
            </ul>
        </li>
        <!-------------------------->
        <li><a href="<?=BASE_URL."khoa-hoc.html"?>"><?=KHOAHOC?></a></li>
        <li><a href="<?=BASE_URL."sai-gon-viet-voi.html"?>"><?=MN_SAIGONVIETVOI?></a></li>
        <li><a href="<?=BASE_URL."lien-he.html"?>"><?=MN_LIENHE?></a></li>
    </ul>
    <div class="clear"></div>
    </nav>
    <!------------------------->
</div>

<!--phần slide và quảng cáo-->
<div class="slide-box">
     <div id="owl-slide" class="owl-carousel" >
          <?php
             if(!empty($data['slide'])){
               foreach($data['slide'] as $item){
          ?>
             <div class="item"><a href="<?=$item['link'];?>">
                <img src="<?=PATH_IMG_FLASH.$item['file_vn'];?>" alt="<?=$_SESSION['title_page']?>">
             </a></div>
          <?php }} ?>
     </div>
</div>
<!--------------------------->