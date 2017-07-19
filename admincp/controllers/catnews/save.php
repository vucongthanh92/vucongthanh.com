<?php

$mcatnews = new Models_MCatnews;

//cap nhat thu tu sap xep
if(isset($_POST['sort'])){
	$data = $_POST['sort'];
	$mcatnews->sortData($data);
}

redirect(BASE_URL_ADMIN."catnews/list");

?>