<section class="defaul_main">
<div class="listprod_content">
    <ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol>
    <article class="grid_detailpro">
        <!--thông tin giao diện-->
        <div class="box-images">
             <img class="theme_hinhanh" alt="<?=$data['info']['title_'.lang];?>" id="theme_hinhanh" 
             src="<?=BASE_URL."data/SaiGon/".$data['info']['images'];?>" />
        </div>
        <div class="desc-info">
             <h1><?=$data['info']['title_'.lang];?></h1>
             <div class="detail_mota"><?=stripcslashes($data['info']['description_'.lang]);?></div>
             <div class="detail_plugin">
                 <div class="detail_plugin_info">
                    <div class="default_news_time"><?=date('d-m-Y',$data['info']['date']);?></div>
                    <div class="default_news_view"><?=$data['info']['view'];?></div>
                    <div style="clear:both"></div>
                 </div>
                 <div class="detail_plugin_social">
                    <div class="addthis_inline_share_toolbox_hmiv"></div>
                 </div>
             </div>
        </div>
    
        <div class="detail">
             <div class="contentsp"><?=stripcslashes($data['info']['content_'.lang]);?></div>
        </div>
        <!----------------------->
        <div class="space_10"></div>
        <div class="fb-comments" data-href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="100%" data-numposts="5"></div>
    </article>
    
    <!--giao diện cùng loại-->
    <div class="breakcum_label"><span>Bài Viết Khác</span></div>
    <aside class="prod_cungloai">
        <?php
          if(!empty($data['othernews'])){
          foreach($data['othernews'] as $item){
        ?>
        <div class="item-prod">
            <div class="images">
            <a href="<?=BASE_URL."sai-gon/".$item['alias'].".html";?>">
               <img class="listpro_img" alt="<?=$item['title_'.lang];?>" src="<?=BASE_URL."data/SaiGon/".$item['images'];?>" />
            </a>
            </div>
         <h2><a href="<?=BASE_URL."sai-gon/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
         <div class="listprod_mota"><?=$item['description_'.lang];?></div>
         <div class="listprod_xemtiep"><a href="<?=BASE_URL."sai-gon/".$item['alias'].".html";?>"><?=XEMTIEP?></a></div>
        </div>
        <?php }} ?>
        <div style="clear:both"></div>
    </aside>
    <!----------------------->
</div>

<?php loadview('pagefixed/left',$left);?>
</section>



<!---------phần tạo dữ liệu có cấu trúc cho bài viết----------->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": 
  {
    "@type": "WebPage",
    "@id": "<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>"
  },
  "headline": "<?=$data['info']['title_'.lang];?>",
  "image": 
  {
    "@type": "ImageObject",
    "url": "<?=BASE_URL."data/SaiGon/".$data['info']['images'];?>",
    "height": 800,
    "width": 800
  },
  "datePublished": "<?=date('m-d-Y',$data['info']['date']);?>",
  "dateModified": "<?=date('m-d-Y',$data['info']['date']);?>",
  "author": 
  {
    "@type": "Person",
    "name": "Vũ Công Thành"
  },
  "publisher": 
  {
    "@type": "Organization",
    "name": "Thiết Kế Website Chuẩn Seo",
    "logo": 
	{
      "@type": "ImageObject",
      "url": "<?=BASE_URL."data/SaiGon/".$data['info']['images'];?>",
      "width": 600,
      "height": 60
    }
  },
  "description": "<?=stripcslashes($data['info']['description_'.lang]);?>"
}
</script>
<!----------------------------------------------------------------------->