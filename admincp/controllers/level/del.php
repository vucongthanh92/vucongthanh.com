<?php
$mcatnews = new Models_MLevel;

if(isset($_POST['check_list'])){
	$mcatnews -> del_allcheck($_POST['check_list']);
}
else{
	$id = varGetPost('id');
	$mcatnews -> del_onecheck($id);
}
redirect(BASE_URL_ADMIN."level/list");
exit();
?>