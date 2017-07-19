<?php
$db = new Models_MFlash;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'width' 		=> varPost('width'),
		'height' 		=> varPost('height'),
		'style' 		=> varPost('style'),
		'location' 		=> varPost('location'),
		'color' 		=> varPost('color'),
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'video'		=> varPost('video','',1),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if($_FILES['file_vn']['name']!=""){	
		$choUpload = array("gif","jpeg","png","jpg");
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		if (in_array($ext,$choUpload)) { 
			$data['file_vn'] = rand_string(5).time().".".$ext;
			move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$data['file_vn']);
		}else{
			$error = 1;
		}
	}

	
	$db -> editflash($data,$id);
	redirect(BASE_URL_ADMIN."flash/list");
	return;
}

$data['info'] = $db -> getOneflash($id);
loadview("flash/edit_view",$data);
?>