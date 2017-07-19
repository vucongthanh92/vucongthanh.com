<?php
$db = new Models_Mflash();

if(isset($_POST['check_list'])){
	
	$db -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."flash/list");
	exit();
}
else{
	$id = varGetPost('id');
	$data = $db->getOneflash($id);
	if(file_exists('../data/Flash/'.$data['file_vn']))
		unlink('../data/Flash/'.$data['file_vn']);
	if(file_exists('../data/Flash/'.$data['file_en']))
		unlink('../data/Flash/'.$data['file_en']);
		
	$db -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."flash/list");
}
?>