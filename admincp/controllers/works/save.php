<?php



$db = new Models_MWorks;



/*cap nhat thu tu sap xep*/

if(isset($_POST['sort'])){

	$data = (int)$_POST['sort'];

	$db->sortData($data);

}


redirect(BASE_URL_ADMIN."works/list");



?>