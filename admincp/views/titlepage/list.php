<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
          <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px"></td>
          <td>Quản lý liên hệ / Hỗ trợ trực tuyến </td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form name = "frm1" action = '<?=BASE_URL_ADMIN;?>titlepage/list' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class='title_td'>Facebook</td>
		<td><input type='text' name='facebook' size='100' value="<?=$data['facebook'];?>"></td>
	</tr>
    
    <tr>
		<td class='title_td'>Twitter</td>
		<td><input type='text' name='twitter' size='100' value="<?=$data['twitter'];?>"></td>
	</tr>
	
	<tr>
		<td class = 'title_td'>Google +</td>
		<td> <input type='text' name='gplus' size='100' value="<?=$data['gplus'];?>"></td>
	</tr>

    <tr>
		<td class='title_td'>Youtube</td>
		<td><input type='text' name='youtube' size='100' value = "<?=$data['youtube'];?>"></td>
	</tr>
    
    <tr>
		<td class='title_td'>LinkedIn</td>
		<td><input type='text' name='linkedin' size='100' value = "<?=$data['linkedin'];?>"></td>
	</tr>
    
    <tr>
		<td class='title_td'>Blogger</td>
		<td><input type='text' name='blogger' size='100' value="<?=$data['blogger'];?>"></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Hotline</td>
		<td><input type='text' name='hotline' size='70' value="<?=$data['hotline'];?>"></td>
	</tr>
     
    <tr>
		<td class = 'title_td'>Email nhận liên hệ</td>
		<td><input type = 'text' name = 'emaillienhevn' size = '100' value = "<?=$data['emaillienhe_vn'];?>"></td>
	</tr>
    
    <tr>
		<td class='title_td'>Email gửi liên hệ</td>
		<td><input type='text' name='email_send' size='100' value="<?=$data['email_send'];?>"></td>
	</tr>
    
    <tr>
		<td class='title_td'>Password</td>
		<td><input type='password' name='pass_send' size='100' value="<?=$data['pass_send'];?>"></td>
	</tr>
    
    <tr>
    	<th></th>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?=G_BUTTON_EDIT;?>' name = 'save' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?=G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>
</table>
</form>

</div>
</div>
