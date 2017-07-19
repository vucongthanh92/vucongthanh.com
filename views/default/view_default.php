<?php
    $mcatnews = new Models_MCatnews;
	$mcatelog = new Models_MCatelog;
	$mcatworks = new Models_MCatworks;
?>

<!--phần main trang chủ-->
<section class="defaul_main">
<div class="defaul_main_left">

    <!--phần thông tin website trên trang chủ-->
    <h1 class="defaul_label"><a title="website" href="<?=BASE_URL."website.html"?>"><?=WEBSITE?></a></h1>
    <div class="default_tintuc">
    <?php
    if(!empty($data['website'])){
        foreach($data['website'] as $item){
			$id_web = $item['idcat'];
			$row_web = $mcatelog->getOneCatelog($id_web);
    ?>
    <div class="default_news_box">
        <a href="<?=BASE_URL."website/".$row_web['alias']."/".$item['alias'].".html"?>">
           <img class="default_news_images" src="<?=BASE_URL."data/Product/".$item['images'] ?>" alt="<?=$item['title_'.lang];?>">
        </a>
        <div class="default_news_info">
           <a href="<?=BASE_URL."website/".$row_web['alias']."/".$item['alias'].".html"?>"><div class="default_news_title"><?=$item['title_'.lang];?></div></a>
           <div class="default_news_mota"><?=limit_text($item['description_'.lang],300);?></div>
           <div class="default_news_date">
                <div class="default_news_time"><?=date('d-m-Y',$item['date']);?></div>
                <div class="default_news_view"><?=$item['view'];?></div>
                <div style="clear:both"></div>
           </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <?php }} ?>
    </div>
    <!---------------------------------------->
    
    <!--phần thông tin seo trên trang chủ-->
    <h2 class="defaul_label"><a href="<?=BASE_URL."seo.html";?>"><?=DICHVUSEO?></a></h2>
    <div class="default_tintuc">
    <?php
    if(!empty($data['seo'])){
        foreach($data['seo'] as $item2){
			$id_seo = $item2['idcat'];
			$row_seo = $mcatworks->getOneCatelog($id_seo);
    ?>
    <div class="default_news_box">
        <a href="<?=BASE_URL."seo/".$row_seo['alias']."/".$item2['alias'].".html"?>">
           <img class="default_news_images" src="<?=BASE_URL."data/Seo/".$item2['images'] ?>" alt="<?=$item2['title_'.lang];?>">
        </a>
        <div class="default_news_info">
            <a href="<?=BASE_URL."seo/".$row_seo['alias']."/".$item2['alias'].".html"?>"><div class="default_news_title"><?=$item2['title_'.lang];?></div></a>
            <div class="default_news_mota"><?=limit_text($item2['description_'.lang],300);?></div>
            <div class="default_news_date">
                <div class="default_news_time"><?=date('d-m-Y',$item2['date']);?></div>
                <div class="default_news_view"><?=$item2['view'];?></div>
                <div style="clear:both"></div>
           </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <?php }} ?>
    </div>
    <!---------------------------------------->
    
    <!--phần thông tin nhiếp ảnh trên trang chủ-->
    <h2 class="defaul_label"><a title="Nhiếp Ảnh" href="<?=BASE_URL."nhiep-anh.html"?>"><?=MN_NHIEPANH;?></a></h2>
    <div class="default_tintuc">
    <?php
    if(!empty($data['nhiepanh'])){
        foreach($data['nhiepanh'] as $item2){
			$id_photo = $item2['idcat'];
			$row_photo = $mcatnews->getOneCatnews($id_photo);
    ?>
    <div class="default_news_box">
        <a href="<?=BASE_URL."nhiep-anh/".$row_photo['alias']."/".$item2['alias'].".html"?>">
           <img class="default_news_images" src="<?=BASE_URL."data/NhiepAnh/".$item2['images'] ?>" alt="<?=$item2['title_'.lang];?>">
        </a>
        <div class="default_news_info">
            <a href="<?=BASE_URL."nhiep-anh/".$row_photo['alias']."/".$item2['alias'].".html"?>"><div class="default_news_title"><?=$item2['title_'.lang];?></div></a>
            <div class="default_news_mota"><?=limit_text($item2['description_'.lang],300);?></div>
            <div class="default_news_date">
                <div class="default_news_time"><?=date('d-m-Y',$item2['date']);?></div>
                <div class="default_news_view"><?=$item2['view'];?></div>
                <div style="clear:both"></div>
            </div>
        </div>
        <div style="clear:both"></div>
        </a>
    </div>
    <?php }} ?>
    </div>
    <!---------------------------------------->
    
</div>

<?php loadview('pagefixed/left',$left);?>
<div style="clear:both"></div>
</section>>
<!---------------------->
