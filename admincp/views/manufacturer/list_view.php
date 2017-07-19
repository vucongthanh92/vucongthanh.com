<?php include('submenu_sanpham.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
         <td width="25"><img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px"></td>
         <td> Quản lý Giao Diện Web / Danh Mục </td>
       </tr>
    </table>
    </div>
</div>


<div class="content">
<div class="list_button">
<a href='<?=BASE_URL_ADMIN;?>manufacturer/add' class="button"><span class='them'><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></span></a>
</div>

<form action='<?=BASE_URL_ADMIN;?>manufacturer/del' method='post' name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
        <th>Hình Ảnh</th>
        <th>Trang Chủ</th>
		<th><?=G_LOCK;?></th>
		<th colspan='2'><?=G_ACTION; ?></th>
	</tr>
	<?php if(empty($data)){ ?>
	<tr><td colspan='7' class='emptydata'><?=G_EMPTYDATA;?></td></tr>
	<?php } else {
		function TreeCatnews($pid,$data,$text="--"){
		foreach($data as $item){
		   if($item['parentid'] == $pid){
	?>
        <tr>
            <td align='center'><input type="checkbox" id='check_list' name="check_list[]" value="<?=$item['Id'];?>"><br></td>
            <td><?=$item['Id'];?></td>
            <td><?=$item['title_vn'];?></td>
            <td><?php if($item['images']!="") { ?> 
            <img src='<?=BASE_URL."/data/Theme/".$item['images'];?>' width='60'><?php } ?></td>
            <td align='center'>
            <?php 
            if($item['hot'] == "1"){
                echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_MANUFACTURER."\",\"hot\",\"".$item['Id']."\",\"0\",\"hot"
				.$item['Id']."\",\"".BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
            }else{
                echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_MANUFACTURER."\",\"hot\",\"".$item['Id']."\",\"1\",\"hot"
				.$item['Id']."\",\"".BASE_URL_ADMIN."\");' title='Khóa tin'><img src='".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
            }?>
            </td>
            <td align='center'>
            <?php 
            if($item['ticlock'] == "1"){
                echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_MANUFACTURER."\",\"ticlock\",\"".$item['Id']."\",\"0\",\""
				.BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
            }else{
                echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_MANUFACTURER."\",\"ticlock\",\"".$item['Id']."\",\"1\",\""
				.BASE_URL_ADMIN."\");' title='Khóa tin'><img src='".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
            }?>
            </td>
            <td align='center'><a href='<?=BASE_URL_ADMIN."manufacturer/edit/".$item['Id'];?>' title='Sửa'>
                <img src='<?=ADMIN_PATH_IMG;?>b_edit.png'></a></td>
            <td align='center'><a href='<?=BASE_URL_ADMIN."manufacturer/del/".$item['Id'];?>' title='Xóa' onclick='javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
        </tr>
	<?php
			TreeCatnews($item['Id'],$data,$text."++"); }}
			return;
		}
		TreeCatnews(0,$data,"--");
	}
	?>
</table>

<div class="list_button">
<a href='<?=BASE_URL_ADMIN;?>manufacturer/add' class="button"><span class='them'> <img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></span></a>
<a href='javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href='javascript:UnCheckAll(document.rowsForm.check_list)' class="button">Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button">
<img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" />Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?=JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?=BASE_URL_ADMIN;?>manufacturer/save')" class="button">
<img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" />Save</a>
</div>
</form>
