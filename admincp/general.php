<?php
     $mwebsite = new Models_MProduct;
	 $mtheme = new Models_MManufacturer;
	 $mwork = new Models_MWorks;
	 $mnews = new Models_MNews;
	 $malbum = new Models_MCatimages;
	 $mcomment = new Models_MComment;
	 
	 $total_web = $mwebsite->countdata("");
	 $total_theme = $mtheme->countdata("");
	 $total_seo = $mwork->countdata("");
	 $total_news = $mnews->countdata("");
	 $total_album = $malbum->countdata("");
	 $total_cmt = $mcomment->countdata("");
?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
          <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-item.png" style="width:23px; height: 23px"></td>
          <td>Thống Kê Dữ Liệu Website</td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<table class="thongke_tab">

    <tr><td colspan="2" class='thongke_th'>Chuyên Mục Website</td></tr>
	<tr>
		<td class='thongke_td'>Số Lượng Bài Viết</td>
		<td class="thongke_info"><?=$total_web?> bài viết</td>
	</tr>
    <tr>
		<td class='thongke_td'>Số Lượng Theme</td>
		<td><?=$total_theme?> theme</td>
	</tr>
	
    <tr><td colspan="2" class='thongke_th'>Chuyên Mục SEO</td></tr>
	<tr>
		<td class = 'thongke_td'>Số Bài Viết</td>
		<td><?=$total_seo?> bài viết</td>
	</tr>
    
    <tr><td colspan="2" class='thongke_th'>Chuyên Mục Nhiếp Ảnh</td></tr>
    <tr>
		<td class='thongke_td'>Số Bài Viết</td>
		<td><?=$total_news?> bài viết</td>
	</tr>
    <tr>
		<td class='thongke_td'>Số Album Ảnh</td>
		<td><?=$total_album?> album</td>
	</tr>
    
    <tr><td colspan="2" class='thongke_th'>Chuyên Mục Sài Gòn Viết Vội</td></tr>
    <tr>
		<td class='thongke_td'>Số Bài Viết</td>
		<td><?=$total_cmt?> bài viết</td>
	</tr>
</table>
</div>
</div>
