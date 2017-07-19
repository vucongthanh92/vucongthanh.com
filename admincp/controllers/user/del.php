<?php

$db = new Models_Muser;

if(isset($_POST['check_list'])) //xoa nhieu record
{
	$db->del_more_user($_POST['check_list']);
	redirect(BASE_URL_ADMIN."user/list");
}
else //xoa mot record
{
	$db->del_user($_GET['id']);
	redirect(BASE_URL_ADMIN."user/list");
}
?>