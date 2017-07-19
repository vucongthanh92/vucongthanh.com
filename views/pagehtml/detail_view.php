<section class="defaul_main">
    <div class="listprod_content">
        <ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol>
        <div class="grid_detailpro">
            <!--thông tin giao diện-->
            <article class="detail">
                 <div class="contentsp"><?=stripcslashes($data['info']['content_'.lang]); ?></div>
            </article>
            <!----------------------->
            <div class="space_10"></div>
            
            <div class="fb-comments" data-href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="100%" data-numposts="5">
            </div>
        </div>
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
  "headline": "Giới Thiệu Dịch Vụ",
  "image": 
  {
    "@type": "ImageObject",
    "url": "<?=BASE_URL."/data/images/thiet-ke-website.jpg";?>",
    "height": 800,
    "width": 800
  },
  "datePublished": "1/12/2017",
  "dateModified": "1/12/2017",
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
      "url": "<?=BASE_URL."/data/images/thiet-ke-website.jpg";?>",
      "width": 600,
      "height": 60
    }
  },
  "description": "<?=stripcslashes($_SESSION['description_page']);?>"
}
</script>
<!----------------------------------------------------------------------->