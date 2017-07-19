<?php
$db = new Models_MNews;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."news/list");
	exit();
}
else{
	$id = varGetPost('id');
	
	$cat = $db->getOneNews($id);
	$db -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."news/list");
	
}
?>