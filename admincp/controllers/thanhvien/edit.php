<?php
$db = new Models_MThanhvien;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$tinh = $_POST['tinh'];
	if($email=="" ){
		$error = 1;
		$message .= "Email không được rỗng <br />";
	}
	
	$dta = array(
			"username" => $username,
			"email"    =>$email,
			"idtinh"   =>$tinh,
			"address"  =>$address,
			"phone"    =>$phone,
			"gioitinh" =>$gender,
			"birthday" =>$birthday,
			"fullname" =>$fullname,
			"hot"		=>$_POST['hot'],
			"hotline1" =>$_POST['hotline1'],
			"ticlock" =>$_POST['ticlock'],
			"level" =>$_POST['level'],
			"hotline2" =>$_POST['hotline2'],
 		);
	$db-> editUser($dta,$id);
	redirect(BASE_URL_ADMIN."thanhvien/list");
}

$data['info'] = $db -> getOneUser($id);
loadview("thanhvien/edit_view",$data);
?>