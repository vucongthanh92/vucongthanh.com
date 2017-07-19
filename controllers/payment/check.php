<?php
	$mpayment = new Models_MPayment;
	if(isset($_POST['sdt'])){
		$mobile = $_POST['sdt'];
		if(get_magic_quotes_gpc()==false){
			$mobile = mysql_real_escape_string($mobile);
		}
		$error = 0;
		if(strlen($mobile)<8){
			$error = 1;
			$message = "Số điện thoại không chính xác";
		}
		if($error==0){
			$where = "tel like '%".$mobile."%'";
			$sp['info'] = $mpayment -> listdata_limit("*",$where,"Id desc");
		}else{
			$sp['error'] = 1;
			$sp['message'] = $message;
		}
	}
	loadview("payment/view_check",$sp);

?>