<?php

$db = new Models_MCatimages;



if(isset($_POST['check_list'])){

	$db -> del_allcheck($_POST['check_list']);

}

else{

	$id = varGetPost('id');


		$db -> del_onecheck($id);



	

}
redirect(BASE_URL_ADMIN."catimages/list");
?>