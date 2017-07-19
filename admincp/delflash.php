<?php

include ('header.php');
$table = varGet('table');
$colum = varGet('colum');
$id = varGet('id');
$value = varGet('value');
switch($table)
{
	case ''.TBL_PRODUCT.'':			$db = new Models_MProduct(); $dir = 'Product'; break;
	case ''.TBL_CATELOG.'':			$db = new Models_MCatelog(); $dir = 'Catelog'; break;
	case ''.TBL_MANUFACTURER.'':	$db = new Models_MManufacturer(); $dir = 'Theme'; break;
	case ''.TBL_FLASH.'':			$db = new Models_MFlash(); $dir = 'Flash'; break;
	case ''.TBL_PICTURE.'':			$db = new Models_MPicture(); $dir = 'Works'; break;
	case ''.TBL_WORKS.'':			$db = new Models_MWorks(); $dir = 'Works'; break;
}
if(file_exists('../data/'.$dir.'/'.$value)) unlink('../data/'.$dir.'/'.$value);
$data = array($colum=>'');
$db->delFile($data,$id);
echo 'thanh cong';
?>