<?php
$db = new Models_MImages;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);

}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);

}
redirect(BASE_URL_ADMIN.'images/list');
?>