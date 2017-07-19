<?php



$db = new Models_MPicture;

$id = varGet('id');

/*cap nhat thu tu sap xep*/
var_dump($_POST['sort']);
if(isset($_POST['sort'])){

	$data = $_POST['sort'];

	$db->sortData($data);

}


redirect(BASE_URL_ADMIN."works/edit/".$id);



?>