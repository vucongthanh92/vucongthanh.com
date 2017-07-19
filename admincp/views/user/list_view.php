<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Hệ thống/ Quản lý admin  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN?>user/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> Thêm mới</a>
</div>

<form action = 'index.php?mod=user&act=del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<th width="50"><input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.rowsForm.check_list)"></th>
	<th width="50">ID</th>
	<th>Username</th>
	<th>Email</th>
    <th>Level</th>
    <th><?php echo G_LOCK; ?></th>
	<th colspan = '2'>Hành động</th>
	
	<?php
	if(!empty($data))
	{
		foreach($data as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?=$item['Id']?>"><br></td>
			<td><?php echo $item['Id']?></td>
			<td><a href = '<?php echo BASE_URL_ADMIN?>user/edit/<?php echo $item['Id']?>'><?php echo $item['username']?></a></td>
			<td><a href = '<?php echo BASE_URL_ADMIN?>user/edit/<?php echo $item['Id']?>'><?php echo $item['email']?></a></td>
            <td><?php if($item['level']==1) echo "Administrator"; else if($item['level']==2) echo "--- Mod"; ?></td>
           <td align = 'center'>
			<?php 
			if($item['ticlock'] == "1"){
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_ADMIN."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
			}else{
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_ADMIN."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
			}
			?>
			</td>
			<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN?>user/edit/<?php echo $item['Id']?>'><img src = '<?php echo ADMIN_PATH_IMG?>b_edit.png' title = 'Edit'></a></td>
			<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN?>user/del/<?php echo $item['Id']?>' alt = 'Delete'><img src = '<?php echo ADMIN_PATH_IMG?>b_drop.png' title = 'Delete'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<div class="list_button" style="text-align:left">
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'  class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE?>',document.rowsForm.check_list)"  class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG?>/b_drop.png" alt="Delete" title="Delete item selected" /> Delete</a>
</div>
</form>

</div>