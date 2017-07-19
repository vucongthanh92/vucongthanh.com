<?php

$db = new Models_MWorks;

if(isset($_POST['check_list'])){

	$db -> del_allcheck($_POST['check_list']);

	redirect(BASE_URL_ADMIN. "works/list");

	return;

	

}

else{

	$id = varGetPost('id');

	$pro = $db->getOneProduct($id);

	if(file_exists("../data/Product/".$pro['images'])){

		unlink("../data/Product/".$pro['images']);

	}

	$db -> del_onecheck($id);



	if($idcat>0){

		redirect(BASE_URL_ADMIN. "works/list/".$idcat);

		return;

	}else{

		redirect(BASE_URL_ADMIN. "works/list");

		return;

	}

}

?>