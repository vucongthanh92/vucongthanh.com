<?php
   require("header.php");
   require("controllers/pagefixed/pagefixed.php");
   $favicon = $mflash->getOneflashLocation(9);
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<head itemscope itemtype="http://schema.org/WebSite">
    <!--thẻ meta cho website-->
    <title itemprop='name'><?=htmlspecialchars($meta['title']);?></title>
 	<meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta name = "keywords" content = "<?=strip_tags($meta['keyword']);?>" />
    <meta name = "description" content = "<?=strip_tags($meta['description']);?>" />
    <meta name = "abstract" content = "<?=strip_tags($meta['description']);?>" />
    <meta name = "robots" content="index" />
    <meta http-equiv="content-language" content="vi" />
    
    <!--thẻ meta cho google-->
    <meta itemprop="name" content="<?=htmlspecialchars($meta['title']);?>">
    <meta itemprop="description" content="<?=strip_tags($meta['description']);?>">
    <meta itemprop="image" content="<?=$meta['images']?>">
    <meta name="google-site-verification" content="0onDtvjH6PmXLwbzGHe-5_acq7vSfqp2rcXRMl1IIJM" />
    <link rel="author" href="https://plus.google.com/108277050291975889646/posts"/>
    
    <!--thẻ meta cho facebook-->
    <meta property="og:title" content="<?=htmlspecialchars($meta['title']);?>" /> 
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" />
    <meta property="og:image" content="<?=$meta['images']?>" />
    <meta property="og:description" content="<?=strip_tags($meta['description']);?>" />
    <meta property="og:site_name" content="Thiết Kế Website - Seo - Nhiếp Ảnh" />
    
    <!--thẻ meta khác-->
    <link rel="alternate" href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" hreflang="vi" />
    <link rel="shortcut icon" href="<?=PATH_IMG_FLASH.$favicon['file_vn'];?>" type="image/x-icon" />
    <link rel='canonical' href='<?="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>' />
    <meta name="DC.title" content="Thiết Kế Website Chuẩn Seo" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Thiết Kế Website" />
    <meta name="geo.position" content="10.857138;106.640509" />
    <meta name="ICBM" content="10.857138, 106.640509" />
    <meta name="p:domain_verify" content="90e13bffcb4d4f839c8fcc337887dd82"/>
    <base href="<?=BASE_URL;?>" />
    
    <link rel= "stylesheet" type = "text/css" href = "<?=BASE_URL.USER_PATH_CSS;?>css.css" />
    <script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "WebSite",
	  "url": "http://vucongthanh.com/",
	  "potentialAction": {
		"@type": "SearchAction",
		"target": "http://vucongthanh.com/search?q={search_term_string}",
		"query-input": "required name=search_term_string"
	  }
	}
	</script>
    <!---------------------------------->
    
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery.hc-sticky.min.js"></script>
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>website.js"></script>
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>scrolltopcontrol.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58386018ba1927b5"></script> 
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>owl.carousel.js"></script>
    
    <?=stripcslashes($row_web['googleanalytics']);?>
    <?=stripcslashes($row_web['navigation']);?>
    
    <!--code facebook-->
    <div id="fb-root"></div>
    <!------------------>
</head>
<body>
	<?php loadview('pagefixed/banner',$banner);?>
    <?php loadview('pagefixed/menu',$menu);?>
	<?php include 'main.php';?> 
    <?php loadview('pagefixed/partners',$partners);?>
	<?php loadview('pagefixed/footer',$footer)?>
</body>
</html>