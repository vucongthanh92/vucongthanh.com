<?php include('submenu_duan.php'); ?>

<div class="main_area">

    <div class="breakcrumb">

    <table border="0">

    <tbody>

    <tr>

    <td width="25">

    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">

    </td>

    <td> Quản lý nội dung / Dự án / Thêm mới hình ảnh</td>

    </tr>

    </tbody>

    </table>

    </div>

</div>

<div class="content">

<div class="content_i">

<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>works/addimages/<?php echo $data['info']['Id']; ?>' method = 'post' enctype = "multipart/form-data" >
<input type="hidden" name="title_vn" value="<?php echo $data['info']['alias'] ?>" >
<table>
<?php
for($i=1;$i<=10;$i++){ 
?>
<tr>
    <td class = 'title_td'>Hình  <?php echo $i; ?></td>
    <td><input type = 'file' name = 'images<?php echo $i; ?>' size = "50"></td>
</tr>
<?php } ?>
<tr>
    	<td></td>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button" style="margin-left:250px;">
		</th>

	</tr>
</table>

</form>

</div>

</div>
