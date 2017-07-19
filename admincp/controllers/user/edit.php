<?php

if($_SESSION['level'] != 1){
	redirect(BASE_URL_ADMIN);
}

$id = varGetPost("id");
$db = new Models_Muser;

if(isset($_POST['edituser']))
{
	
		$data=array(
			"username"	=> $_POST['txtuser'],
			"email"		=> $_POST['txtemail'],
			"level" 	=> $_POST['level'],
			"fullname" 	=> $_POST['fullname'],
			"note" 	=> $_POST['note'],
			"address" 	=> $_POST['address'],
		);
		
		if($_POST['txtpass'] != "")
			$data["password"] = md5(md5($_POST['txtpass']));
		
		if($db->update_user($data,$id) == 0)
		{
			$data['error'][]= ERROR_USER_REGISTER;
			redirect(BASE_URL_ADMIN."user/list");
			exit();
		}
		else
		{
			$link = array(
				'list'	=> "user/list",
				'add'	=> "user/add"
			);
			redirect(BASE_URL_ADMIN."user/list");
			exit();
		}
}
else
{
	$data['info'] = $db->get_user($id);
	loadview("user/edit_view",$data);
}


?>