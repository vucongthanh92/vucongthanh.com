<section class="defaul_main">
<div class="listprod_content">
    <h1 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h1>
    <div class="default_tintuc">
	<?php
        if(!empty($data['pro_1'])){
        foreach($data['pro_1'] as $item){
			$idcat=$item['idcat'];
			$sql="select * from mn_catworks where Id='$idcat'";
			$ds=mysql_query($sql) or die(mysql_error());
			$row=mysql_fetch_assoc($ds);
    ?>
    <div class="default_news_box">
        <a href="<?=BASE_URL."seo/".$row['alias']."/".$item['alias'].".html"?>">
        <img class="default_news_images" src="<?=BASE_URL."data/Seo/".$item['images'] ?>" alt="<?=$item['title_'.lang];?>">
        </a>
        <div class="default_news_info">
            <a href="<?=BASE_URL."seo/".$row['alias']."/".$item['alias'].".html"?>">
               <h2 class="default_news_title"><?=$item['title_'.lang];?></h2>
            </a>
            <div class="default_news_mota"><?=$item['description_'.lang];?></div>
        </div>
        <div class="listprod_info">
            <div class="default_news_time"><?=date('d-m-Y',$item['date']);?></div>
            <div class="default_news_view"><?=$item['view'];?></div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
        </a>
    </div>
    <?php }} ?>
    
	<?php 
    if($data['page'] != "") {
        echo '<div class="clear"></div>';
        echo "<div class='pagging'>".$data['page']."</div>";
    }
    ?>
    </div>
</div>

<?php loadview('pagefixed/left',$left);?>
</section>