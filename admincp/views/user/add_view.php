<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Hệ thống/ Quản lý admin / Thêm mới </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<?php

if(!empty($data['error']))
{
	echo "<div id = 'error'>";
	echo "<h2>Lỗi!</h2>";
	echo "<ul>";
	echo getError($data['error']);
	echo "</ul>";
	echo "</div>";
}
?>


<form action = '<?php echo BASE_URL_ADMIN?>user/add' method = 'post' name = 'formadd'>
	<table>
    	<tr>
			<td  class = 'title_td' >Level</td>
			<td><select name = 'level' style = 'width:150px;'>
					<option value = '' checked>- - Chọn level - -</option>
					<option value = '1'>Administrator</option>
					<option value = '2'>Mod</option>
				</select>
			</td>
		</tr>
        <tr>
			<td  class = 'title_td' >Bật / Tắt</td>
			<td>
            	<select name = 'ticlock' style = 'width:150px;'>
				
					<option value = '0'>Bật</option>
					<option value = '1'>Tắt</option>
				</select>
            </td>
		</tr>
		<tr>
			<td  class = 'title_td' >Tài khoản</td>
			<td><input type = 'text' name = 'txtuser' size = '100' value = '<?php if(isset($_POST['txtuser'])) echo $_POST['txtuser'];?>'></td>
		</tr>
		<tr>
			<td  class = 'title_td' >Mật khẩu</td>
			<td><input type = 'password' name = 'txtpass' size = '100'></td>
		</tr>
		<tr>
			<td  class = 'title_td' >Nhập lại Mật khẩu</td>
			<td><input type = 'password' name = 'txtrepass' size = '100'></td>
		</tr>
		<tr>
			<td  class = 'title_td' >Email</td>
			<td><input type = 'text' name = 'txtemail' size = '100' value = '<?php if(isset($_POST['txtemail'])) echo $_POST['txtemail'];?>'></td>
		</tr>
		<tr>
			<td  class = 'title_td' > Họ và Tên</td>
			<td><input type = 'text' name = 'fullname' size = '100' value = '<?php if(isset($_POST['fullname'])) echo $_POST['fullname'];?>'></td>
		</tr>
		<tr>
			<td  class = 'title_td' > Địa chỉ</td>
			<td><input type = 'text' name = 'address' size = '100' value = '<?php if(isset($_POST['address'])) echo $_POST['address'];?>'></td>
		</tr>
        <tr>
			<td  class = 'title_td' > Thông tin thêm</td>
			<td><textarea name="note" style="width:610px; height:150px;" ><?php if(isset($_POST['note'])) echo $_POST['note'];?></textarea></td>
		</tr>
		
        <!-----------
		<tr>
			<td>Premission</td>
			<td><input type = 'text' name = 'user' size = '50'></td>
		</tr> -->
        <th></th>
		<th >
			<input type  = 'submit' value = 'Thêm mới' name = 'addnew' class = 'checkdata button' >
			<input type  = 'reset' value = 'Làm lại' class = 'checkdata button'>
		</th>
	</table>
</form>
</div>
</div>