<?php

$soluong = $_POST["soluong"];
foreach($soluong as $k => $v){
	if($v==0){ unset($_SESSION["cart2"][$k]);}
	else
	 $_SESSION["cart2"][$k]= $v;
}

redirect(BASE_URL."gio-hang.html");

?>