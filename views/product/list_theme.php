<section class="defaul_main">
<div class="listprod_content">
    <h1 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h1>
    <div class="default_tintuc">
	<?php
    if(!empty($data['pro_1'])){
        foreach($data['pro_1'] as $item){
    ?>
        <div class="item-prod">
             <div class="images">
                <a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>">
                   <img class="listpro_img" src="<?=BASE_URL."data/Theme/".$item['images'];?>" alt="<?=$item['title_'.lang];?>" />
                </a>
             </div>
             <h2><a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
             <div class="listprod_mota"><?=$item['description_'.lang];?></div>
             <a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>"><div class="listprod_xemtiep"><?=XEMTIEP?></div></a>
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