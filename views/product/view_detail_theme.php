<section class="defaul_main">
<div class="listprod_content">
    <h2 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h2>
    <div class="grid_detailpro">
        <!--thông tin giao diện-->
        <div class="box-images">
           <img class="theme_hinhanh" id="theme_hinhanh" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."data/Theme/".$data['prod']['images'];?>" />
        </div>
        <div class="desc-info">
             <h1><?=$data['prod']['title_'.lang];?></h1>
             <div class="detail_mota"><?=stripcslashes($data['prod']['description_'.lang]);?></div>
             <div class="detail_plugin">
                 <div class="detail_plugin_info">
                    <div class="default_news_time"><?=date('d-m-Y',$data['prod']['date']);?></div>
                    <div class="default_news_view"><?=$data['prod']['view'];?></div>
                    <div style="clear:both"></div>
                 </div>
                 <div class="detail_plugin_social">
                    <div class="addthis_inline_share_toolbox_hmiv"></div>
                 </div>
             </div>
        </div>
    
        <div class="detail">
             <div class="contentsp"><?=stripcslashes($data['prod']['content_'.lang]);?></div>
        </div>
        <!----------------------->
        <div class="space_10"></div>
        
        <div class="fb-comments" data-href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="100%" data-numposts="5"></div>
    </div>
    
    <!--giao diện cùng loại-->
    <div class="breakcum_label"><span>Những Mẫu Giao Diện Khác</span></div>
    <aside class="prod_cungloai">
        <?php
          if(!empty($data['spcl'])){
          foreach($data['spcl'] as $item){
        ?>
        <div class="item-prod">
            <div class="images">
            <a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>">
               <img class="listpro_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."data/Theme/".$item['images'];?>" />
            </a>
            </div>
            <h2><a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
            <div class="listprod_mota"><?=$item['description_'.lang];?></div>
            <a href="<?=BASE_URL."website/giao-dien/".$item['alias'].".html";?>"><div class="listprod_xemtiep"><?=XEMTIEP?></div></a>
        </div>
        <?php }} ?>
        <div style="clear:both"></div>
    </aside>
    <!----------------------->
    
</div>

<?php loadview('pagefixed/left',$left);?>
</section>

<script>
   $(document).ready(function(e) {
       $(".list_subimg").click(function()
	   {
	      var url = $(this).attr("src");
		  $("#theme_hinhanh").attr("src",url);
		  $(".list_subimg").css("border","1px solid #ccc");
		  $(this).css("border","1px solid #F39E1D");
	   })
   });
</script>



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
  "headline": "<?=$data['prod']['title_'.lang];?>",
  "image": 
  {
    "@type": "ImageObject",
    "url": "<?=BASE_URL."data/Theme/".$data['prod']['images'];?>",
    "height": 800,
    "width": 800
  },
  "datePublished": "<?=date('m-d-Y',$data['prod']['date']);?>",
  "dateModified": "<?=date('m-d-Y',$data['prod']['date']);?>",
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
      "url": "<?=BASE_URL."data/Theme/".$data['prod']['images'];?>",
      "width": 600,
      "height": 60
    }
  },
  "description": "<?=stripcslashes($data['prod']['description_'.lang]);?>"
}
</script>
<!----------------------------------------------------------------------->