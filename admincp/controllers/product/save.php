<?php

$db = new Models_MProduct;

/*cap nhat thu tu sap xep*/
if(isset($_POST['sort'])){
	$data = (int)$_POST['sort'];
	$db->sortData($data);
}

/*cap nhat giá */
if(isset($_POST['price'])){
	$data = $_POST['price'];
	$db->editPrice($data);
}
/*cap nhat giá  bán*/
if(isset($_POST['price2'])){
	$data = $_POST['price2'];
	$db->editPrice2($data);
}

redirect(BASE_URL_ADMIN."product/list");

?>