<?php include('submenu_duan.php'); ?>

<div class="main_area">

    <div class="breakcrumb">

    <table border="0">

    <tbody>

    <tr>

    <td width="25">

    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">

    </td>

    <td> Quản lý nội dung / Dự án / Sửa hình ảnh</td>

    </tr>

    </tbody>

    </table>

    </div>

</div>

<div class="content">

<div class="content_i">

<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>works/editimages/<?php echo $data['pic']['Id'] ?>/<?php echo $data['info']['Id']; ?>' method = 'post' enctype = "multipart/form-data" >
<input type="hidden" name="title_vn" value="<?php echo $data['info']['alias'] ?>" >
<table>

<tr>
    <td class = 'title_td'>Hình  </td>
    <td>
    <img src="<?php echo BASE_URL.PATH_IMG_WORKS.$data['pic']['images'] ?>" width="60" /> <br />
    <input type = 'file' name = 'images1' size = "50"></td>
</tr>
<tr>
    	<td></td>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'addnew' class="button" style="margin-left:250px;">
		</th>

	</tr>
</table>

</form>

</div>

</div>
