<section class="defaul_main">
<div class="listprod_content">
    <h1 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h1>
    <div class="grid_detailpro">
        <!--thông tin giao diện-->
        <div class="album_images">
             <?php
			     if(!empty($data['prod_1'])){
                 foreach($data['prod_1'] as $item2){
			 ?>
             <div class="album_detail">
                  <img alt="<?=$_SESSION['title_page']?>" class="album_hinhanh" id="theme_hinhanh" src="<?=BASE_URL."data/Album/".$item2['images'];?>" />
                  <div class="detail_album_info"><?=$data['cat']['meta_description']?></div>
             </div>
             <?php }} ?>
             <div class="album_subimg">
             <?php
			     if(!empty($data['prod'])){
                 foreach($data['prod'] as $item){
			 ?>
                 <img class="list_subimg" alt="<?=$data['cat']['title_vn']?>" src="<?=BASE_URL."data/Album/".$item['images'];?>" />
             <?php }} ?>
             </div>
             <div style="clear:both"></div>
             <div class="detail_plugin">
                 <div class="detail_plugin_social">
                    <div class="addthis_inline_share_toolbox_hmiv"></div>
                 </div>
             </div>
             <div class="fb-comments" data-href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="100%" data-numposts="5">
             </div>
        </div>
        <!----------------------->
    </div>
    
    <div class="space_10"></div>
    <!--giao diện cùng loại-->
    <h2 class="breakcum_label"><span>Những Album Ảnh Khác</span></h2>
    <aside class="prod_cungloai">
        <?php
          if(!empty($data['spcl'])){
          foreach($data['spcl'] as $item){
        ?>
        <div class="item-prod">
            <div class="images">
            <a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>">
               <img class="listpro_img" alt="<?=$_SESSION['title_page']?>" src="<?=BASE_URL."data/NhomAlbum/".$item['images'];?>" />
            </a>
            </div>
            <h2><a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
            <a href="<?=BASE_URL."nhiep-anh/album/".$item['alias'].".html";?>"><div class="listprod_xemtiep"><?=XEMTIEP?></div></a>
        </div>
        <?php }} ?>
        <div style="clear:both"></div>
    </aside>
    <!----------------------->
</div>

<?php loadview('pagefixed/left',$left);?>
</section>

<script>
   $(document).ready(function(e) 
   {
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
  "headline": "<?=$_SESSION['title_page']?>",
  "image": 
  {
    "@type": "ImageObject",
    "url": "<?=BASE_URL."data/NhomAlbum/".$data['cat']['images'];?>",
    "height": 800,
    "width": 800
  },
  "datePublished": "1/10/2017",
  "dateModified": "1/10/2017",
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
      "url": "<?=BASE_URL."data/NhomAlbum/".$data['cat']['images'];?>",
      "width": 600,
      "height": 60
    }
  },
  "description": "<?=stripcslashes($_SESSION['description_page']);?>"
}
</script>
<!----------------------------------------------------------------------->