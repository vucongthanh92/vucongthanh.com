<?php include('submenu_duan.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
          <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px;height:23px"></td>
          <td> Quản lý nội dung / Khóa Học Online</td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="list_button">
<a href='<?=BASE_URL_ADMIN;?>weblink/add' class="button"><span class='them'><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></span></a>
<form action="" method="post">
<table style="width:430px; float:left" >
   <tr>
       <td>Tìm kiếm tiêu đề: </td>
       <td><input type="text" name="title" size="40" value="<?=$_POST['title'];?>" /><input type="submit" name="btntim" value="Tìm" style="margin-left:10px;" class="btn"/></td>
   </tr>
</table>
</form>
</div>

<form action='<?=BASE_URL_ADMIN;?>weblink/del' method='post' name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">ID</th>
		<th>Tiêu Đề</th>
        <th>Hình Ảnh</th>
        <th>Location</th>
        <th>Giảng Viên</th>
        <th>Ngày Đăng</th>
		<th width="100">Sắp Xếp</th>
        <th width="50">Nổi Bật</th>
		<th width="50">Khóa</th>
		<th colspan='2'>Hành Động</th>
	</tr>
	<?php if(empty($data['info'])){ ?>
	<tr>
		<td colspan='11' class='emptydata'><?=G_EMPTYDATA;?></td>
	</tr>
	<?php } else { foreach($data['info'] as $item){ ?>
    <tr>
        <td align='center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?=$item['Id'];?>"><br></td>
        <td><?=$item['Id'];?></td>
        <td align="left"><a style="<?=$cls?>" href='<?=BASE_URL_ADMIN."weblink/edit/".$item['Id'];?>' title='Sửa'><?=$text.$item['title_vn'];?></a></td>
        <td><?php if($item['images']!="") { ?><img src="<?=BASE_URL."data/KhoaHoc/".$item['images'];?>" border="0" width="60" /><?php } ?></td>
        <td><?=$item['location'];?></td>
        <td><?=$item['giangvien'];?></td>
        <td align="center"><?=date('d/m/Y',$item['date']);?></td>
        <td align='center'><input type='text' size='5' name = 'sort[<?=$item['Id'];?>]' value="<?=$item['sort'];?>" style='text-align:center;' /></td>
        
        <td align='center'>
        <?php 
        if($item['hot'] == "1"){
           echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_WEBLINK."\",\"hot\",\"".$item['Id']."\",\"0\",\"hot".$item['Id']
		   ."\",\"".BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
        }
		else{
           echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_WEBLINK."\",\"hot\",\"".$item['Id']."\",\"1\",\"hot".$item['Id']
		   ."\",\"".BASE_URL_ADMIN."\");' title='Khóa tin'><img src='".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
        }
        ?>
        </td>	
        
        <td align = 'center'>
        <?php 
        if($item['ticlock'] == "1"){
            echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_WEBLINK."\",\"ticlock\",\"".$item['Id']."\",\"0\",\""
			.BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
        }else{
            echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_WEBLINK."\",\"ticlock\",\"".$item['Id']."\",\"1\",\""
			.BASE_URL_ADMIN."\");' title='Khóa tin'><img src='".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
        }
        ?>
        </td>
        
        <td align='center' width="50"><a href='<?=BASE_URL_ADMIN."weblink/edit/".$item['Id'];?>'><img src='<?=ADMIN_PATH_IMG;?>b_edit.png'></a></td>
        <td align='center' width="50"><a href='<?=BASE_URL_ADMIN."weblink/del/".$item['Id'];?>' onclick='javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src='<?=ADMIN_PATH_IMG;?>b_drop.png'></a></td>
    </tr>
    <?php }} ?>
</table>
<?php 
if(isset($data['page']) && $data['page'] != "")
{
	echo "<div style='height:10px; clear:10px'></div>";
	echo "<div class='page'>";
	echo "<span>Trang:</span> ";
	echo $data['page'];
	echo "</div>";
}
?>

<div class="list_button">
<a href='<?=BASE_URL_ADMIN;?>weblink/add' class="button"><span class='them'><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></span></a>
<a href='javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href='javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button">
   <img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?=JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?=BASE_URL_ADMIN;?>weblink/save')" class="button">
   <img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</div>
</form>
</div>

