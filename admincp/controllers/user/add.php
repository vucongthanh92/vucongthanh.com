<?php

if($_SESSION['level'] != 1){
	redirect(BASE_URL_ADMIN);
}

if(isset($_POST['addnew']))
{
	$help = new Helpers_Validation;
	$help -> check_empty($_POST['txtuser'],ERROR_USER_EMPTY);
	$help -> check_email($_POST['txtemail']);
	$help -> check_pass($_POST['txtpass'],$_POST['txtrepass']);
	//$help -> check_empty($_POST['level'],ERROR_LEVEL_EMPTY);
	
	$data['error'] = $help->_mess;
	if($help->valid() == 0) //khong co loi
	{
		$id = idMax(PREFIX."admin") + 1;
		$data = array(
			"Id"		=> $id,
			"username"	=> $_POST['txtuser'],
			"password"  => md5(md5($_POST['txtpass'])),
			"email"		=> $_POST['txtemail'],
			"fullname"		=> $_POST['fullname'],
			"level" 	=> $_POST['level'],
			"note" 	=> $_POST['note'],
			"address" 	=> $_POST['address'],
		);
		
		$db = new Models_Muser;
		if($db->create_user($data) == 0)
		{
			$data['error'] = ERROR_USER_REGISTER;
		}
		else
		{
			$link = BASE_URL_ADMIN."user/list";
			redirect($link);
		}
	}
}else{
	$data = '';
}

loadview("user/add_view",$data);
?>