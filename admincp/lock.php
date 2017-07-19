<?php
include ('header.php');

$table = varGet('table');
$colum = varGet('colum');
$id = varGet('id');
$value = varGet('value');

switch($table){ //kiem tra update thuoc bang nao

	case ''.TBL_WEBLINK.'':			$db = new Models_MWeblink; break;
	case ''.TBL_PAGEHTML.'':		$db = new Models_MPagehtml; break;
	case ''.TBL_PICTURE.'': 		$db = new Models_MPicture; break;
	case ''.TBL_PRODUCT.'': 		$db = new Models_MProduct; break;
	case ''.TBL_CATELOG.'': 		$db = new Models_MCatelog; break;
	case ''.TBL_EMAIL.'':			$db = new Models_MEmail;	break;
	case ''.TBL_NEWS.'':			$db = new Models_MNews;	break;
	case ''.TBL_CATNEWS.'':			$db = new Models_MCatnews; break;
	case ''.TBL_COMMENT.'':			$db = new Models_MComment(); break;
	case ''.TBL_COMMENTCAT.'':			$db = new Models_MCommentcat(); break;
	case ''.TBL_ADMIN.'':			$db = new Models_Muser(); break;
	case ''.TBL_FLASH.'':			$db = new Models_MFlash(); break;
}

$data = array($colum=>$value);
$db->ticlockactive($data,$id);

if($value == 1){
	echo '<div id = "'.$id.'"><a href = "javascript:ticlockactive(\''.$table.'\',\'ticlock\','.$id.',\'0\',\''.BASE_URL_ADMIN.'\');" title = "Bỏ khóa"><img src = "'.ADMIN_PATH_IMG.'icon-16-remove.png"></a></div>';
}else{
	echo '<div id = "'.$id.'"><a href = "javascript:ticlockactive(\''.$table.'\',\'ticlock\','.$id.',\'1\',\''.BASE_URL_ADMIN.'\');" title = "Khóa tin"><img src = "'.ADMIN_PATH_IMG.'icon-16-tick.png"></a></div>';
}

?>