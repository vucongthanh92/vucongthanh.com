<?php
$mpayment = new Models_MPayment;
$id = varGet("id");
$data = array(
	'view' => 1
);
$mpayment ->editCustomer($data,$id);

$data['cus'] = $mpayment->OneCustomer($id);
$data["cart"] = $mpayment->listCustomerCart($id);
if(isset($_POST['tinhtrang'])){
	$note = $_POST['note'];
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$ship = $_POST['ship'];
	$sql = "update mn_customer set status ='".$_POST['tinhtrang']."', note = '".$note."', fullname = '".$fullname."', address = '".$address."', ship = '".$ship."' where Id = ".$id;
	mysql_query($sql) or die(mysql_error());
	redirect(BASE_URL_ADMIN."payment/list");
}

loadview("payment/detail",$data);
?>