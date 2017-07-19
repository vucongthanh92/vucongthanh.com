<div id="index-box">
<?php loadview('pagefixed/left'); ?>
<div id="box-h-right">
<div class="breadcrumb"><?php echo $data['map_title']; ?></div>
<p style=" margin:5px; margin-top:10px;"> Tìm được <b><?=$data["total"] ?></b> Sản phẩm với từ khóa <b><?php echo htmlspecialchars($data['q']); ?></b></p>
<div class="sup_prdouct">

<?php 
	if(!empty($data['prod'])){
		$i=0;
		foreach ($data['prod'] as $item) {
			if($item['price']>0)	$pt = 100-floor(($item['sale_price']/ $item['price'])*100); else  $pt=0;
	?>
	<div class="box-sp" >
     <?php if($pt>0)  { ?><span class="percent">-<?php echo $pt ?>%</span><?php } ?>
    <div class="bg-pro">
        <a href="/san-pham/<?php echo $item['alias'] ?>" title="<?php echo $item['title_vn'] ?>">
        <img alt="<?php echo $item['title_vn'] ?>" class="lazy" data-original="/timthumb.php?src=<?php echo PATH_IMG_PRODUCT.$item['images'] ?>&h=300&w=300&zc=1"  width="100%"></a>
        </div>
   		<div class="info-box">
     	
        <h3 ><a href="/san-pham/<?php echo $item['alias'] ?>" title="<?php echo $item['title_vn'] ?>"><?php echo $item['title_vn'] ?></a></h3>
        <p class="codepro">Mã sản phẩm: <?php echo $item['codepro'] ?></p>
            <div class="priceb">
              <span class="sale_price">Giá bán: <?php if($item['sale_price']>0)  echo bsVndDot($item['sale_price'])."đ"; else echo 'Liên hệ'; ?> </span> 
             <?php if($item['price']>0) echo " | <del>".bsVndDot($item['price'])."đ </del>"; ?>
            
            </div>
    	</div>
    </div>
	<?php 
		}
	}else{
?>
	<p style="color:#F00;">Không có  dữ liệu</p>
<?php
	}
if($data['page'] != "") {
	echo '<div class="clear"></div>';
	echo "<div class = 'phantrang'>". $data['page']."</div>";
}
?>
</div>
</div>
<div class = "clear"></div>
</div>
