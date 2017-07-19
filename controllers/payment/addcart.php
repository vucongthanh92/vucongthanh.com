<?php
	$id = $_POST['idpro'];
	if($_SESSION['cart2'][$id]>1)
	{
		$_SESSION['cart2'][$id] = $_SESSION['cart2'][$id]+1;
	}else{
		$_SESSION['cart2'][$id]=1;
	}
	redirect(BASE_URL."gio-hang.html");
?> 
