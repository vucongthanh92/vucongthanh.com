<?php

include ('header.php');



$table = varGet('table');

$colum = varGet('colum');

$id = varGet('id');

$value = varGet('value');



switch($table){ //kiem tra update thuoc bang nao

			

	case ''.TBL_DOWNLOAD.'':			$db = new Models_MDownload(); break;
	case ''.TBL_WORKS.'':			$db = new Models_MWorks(); break;

}



if(file_exists('../data/download/'.$value))

	unlink('../data/download/'.$value);



$data = array($colum=>'');

$db->delFile($data,$id);



echo 'thanh cong';

?>