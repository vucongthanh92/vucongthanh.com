<?php

$mpagehtml = new Models_MPagehtml;

if(isset($_POST['check_list'])){
	$mpagehtml -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."pagehtml/list");
	return;
}
else{
	$id = varGetPost('id');
	$mpagehtml -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."pagehtml/list");
	return;
}

?>