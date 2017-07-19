<section class="defaul_main">
<div class="listprod_content">
    <h1 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h1>
    <div class="default_tintuc">
	<?php
        if(!empty($data['pro_1'])){
        while($item = mysql_fetch_assoc($data['pro_1'])){
    ?>
        <div class="item-prod">
             <div class="images">
                <a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>">
                   <img class="listpro_img" alt="<?=$item['title_'.lang];?>" src="<?=BASE_URL."data/NhomAlbum/".$item['images'];?>" />
                </a>
             </div>
             <h2><a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
             <a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>"><div class="listprod_xemtiep"><?=XEMTIEP?></div></a>
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