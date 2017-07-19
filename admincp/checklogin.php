<?php
session_start();
include('../libraries/session.php');
$session_user = new session();

include ('../libraries/class_db.php');
//include ('../config/config.php');
include ('../config/config_site.php');
include ('../libraries/project.php');
include ('../libraries/controls.php');
include ('models/muser.php');

$data = array(
	'Username ='	=> $_POST['user'],
	'Password ='	=> md5(md5($_POST['pass'])),
	'Email ='		=> $_POST['email'],
);

$muser = new Models_Muser;
$check = $muser->checklogin($data);
if($check != 0)
{
	$_SESSION['user_admin_id'] =1;
	$session_user->set_var('user_log',$check['user']);
	$session_user->set_var('level',$check['level']);
	echo 1;
}
else
{
	echo 0;
}

?>