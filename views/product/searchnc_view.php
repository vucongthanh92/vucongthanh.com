<section class="defaul_main">
<div class="listprod_content">
    <div class="breakcum_label"><?php echo $data['map_title'];?></div>
    <div class="default_tintuc">
	<?php
        if(!empty($data['prod'])){
        foreach($data['prod'] as $item){
			$idcat = $item['idcat'];
			$sql = "select * from mn_catelog where Id='$idcat'";
			$ds=mysql_query($sql) or die(mysql_error());
			$row=mysql_fetch_assoc($ds);
    ?>
    <div class="default_news_box">
        <a href="<?=BASE_URL."website/".$row['alias']."/".$item['alias'].".html"?>">
        <img class="default_news_images" src="<?=BASE_URL."data/Product/".$item['images'] ?>" alt="<?=$item['title_'.lang];?>">
        </a>
        <div class="default_news_info">
            <a href="<?=BASE_URL."website/".$row['alias']."/".$item['alias'].".html"?>"><div class="default_news_title"><?=$item['title_'.lang];?></div></a>
            <div class="default_news_mota"><?=$item['description_'.lang];?></div>
        </div>
        <div style="clear:both"></div>
        </a>
    </div>
    <?php }} ?>
    
    <?php 
    if($data['page'] != "") {
        echo '<div class="clear"></div>';
        echo "<div class = 'pagging'>". $data['page']."</div>";
    }
    ?>
    </div>
</div>

<?php loadview('pagefixed/left',$left);?>
</section>