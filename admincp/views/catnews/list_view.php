<?php include('submenu_tintuc.php'); ?>
<div class="main_area">
   <div class="breakcrumb">
     <table border="0">
        <tbody>
          <tr>
             <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px;height: 23px"></td>
             <td> Quản lý nội dung / Chủ đề nhiếp ảnh / </td>
          </tr>
        </tbody>
     </table>
   </div>
</div>
        

<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>catnews/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></a>
</div>

<form action = '<?php echo BASE_URL_ADMIN;?>catnews/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">	
    <tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">ID</th>
		<th>Tiêu Đề</th>
        <th width="100">Sắp Xếp</th>
        <th width="100">Trang Chủ</th>
		<th width="50">Bật / Tắt</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data)){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '7' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php } 
	    else {
		function TreeCatnews($pid,$data,$text="--"){
			foreach($data as $item)
			{
				if($item['parentid'] == $pid){
	?>
    <tr>
        <td align='center'><input type="checkbox" id='check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
        <td><?=$item['Id'];?></td>
        <td align="left"><a href='<?=BASE_URL_ADMIN;?>catnews/edit/<?=$item['Id'];?>' title='Sửa'><?=$text.$item['title_vn']; ?></a></td>
        <td align='center'><input type='text' size='5' name='sort[<?=$item['Id'];?>]' value="<?=$item['sort'];?>" style='text-align:center;' /></td>
        <td align = 'center'>
        <?php
        if($item['home'] == 1){
            echo "<div id='home".$item['Id']."'><a href='javascript:hideshow(\"".TBL_CATNEWS."\",\"home\",\"".$item['Id']."\",\"0\",\"home".$item['Id']
			."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
        }else{
            echo "<div id='home".$item['Id']."'><a href='javascript:hideshow(\"".TBL_CATNEWS."\",\"home\",\"".$item['Id']."\",\"1\",\"home".$item['Id']
			."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 	 
        }
        ?>
        </td>
        
        <td align = 'center'>
        <?php 
        if($item['ticlock'] == "1"){
            echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_CATNEWS."\",\"ticlock\",\"".$item['Id']."\",\"0\",\""
			.BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
        }else{
            echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_CATNEWS."\",\"ticlock\",\"".$item['Id']."\",\"1\",\""
			.BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
        }
        ?>
        </td>
        <td align = 'center' width="50">
        <a href='<?=BASE_URL_ADMIN;?>catnews/edit/<?=$item['Id'];?>' title='Sửa'><img src='<?=ADMIN_PATH_IMG;?>b_edit.png'></a></td>
        <td align='center' width="50"><a href='<?=BASE_URL_ADMIN."catnews/del/".$item['Id'];?>' title='Xóa' onclick='javascript:thongbao("
		<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src='<?=ADMIN_PATH_IMG;?>b_drop.png'></a></td>
    </tr>
	<?php
		TreeCatnews($item['Id'],$data,$text." ____");
		}}
			return;
		}
		TreeCatnews(0,$data,"");
	}
	?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>catnews/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button" >Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="button" href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>catnews/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</a>
</div>
</form>

</div>