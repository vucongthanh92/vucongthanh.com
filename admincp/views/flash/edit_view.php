<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý media / Banner / Thêm mới</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
	<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>flash/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'>Vị trí</td>
		<td>
		<select name = "location">
            <option value = '1' <?php if($data['info']['location'] == 1) echo 'selected';?>>Slogan</option>
			<option value = '2' <?php if($data['info']['location'] == 2) echo 'selected';?>>Logo Top</option>
			<option value = '3' <?php if($data['info']['location'] == 3) echo 'selected';?>>Sideshow</option>
            <option value = '4' <?php if($data['info']['location'] == 4) echo 'selected';?>>Quảng Cáo</option>
            <option value = '5' <?php if($data['info']['location'] == 5) echo 'selected';?>>Dự án</option>
            <option value = '6' <?php if($data['info']['location'] == 6) echo 'selected';?>>Tin tức</option>
            <option value = '7' <?php if($data['info']['location'] == 7) echo 'selected';?>>Giới thiệu</option>
            <option value = '8' <?php if($data['info']['location'] == 8) echo 'selected';?>>Sản phẩm</option>
            <option value = '9' <?php if($data['info']['location'] == 9) echo 'selected';?>>favicon</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>File</td>
		<td><input type = 'file' name = 'file_vn' size = '50'></td>
	</tr>
	<?php if($data['info']['file_vn'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td><div id = "file_vn">
     
        <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['info']['file_vn'] ?>"  style="max-width:400px"  />

        </p>
		&nbsp;&nbsp;&nbsp;
		<a href = "javascript: delFlash('<?php echo TBL_FLASH?>','file_vn',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['file_vn'];?>','file_vn','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a></div>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class = 'title_td'>Link</td>
		<td><input type = 'text' name = 'link' size = '60'  value = '<?php echo $data['info']['link'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Sắp xếp</td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
    	<td></td>
		<th  align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div></div>
<style>
.file_vn img{ max-width:500px; max-height:300px; }
</style>