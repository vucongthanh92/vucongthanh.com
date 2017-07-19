<?php
$mcatnews = new Models_MEmail;

if(isset($_POST['check_list'])){
	$mcatnews -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "email/list",
		'add'	=> "email/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$mcatnews -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."email/list");
}
?>