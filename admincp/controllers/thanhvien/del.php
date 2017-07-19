<?php
$db = new Models_MThanhvien();
$id = $_GET['id'];
if(isset($_POST['check_list'])){
	
	$db -> del_allcheck($_POST['check_list']);
}
else{
	$db -> del_onecheck($id);
}
redirect(BASE_URL_ADMIN."thanhvien/list");
?>