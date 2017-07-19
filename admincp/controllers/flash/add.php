<?php
$db = new Models_MFlash();

if(isset($_POST['addnew'])){
		
	if($_FILES['file_vn']['name']!=""){
		$choUpload = array("gif","jpeg","png","jpg");
		$kieuFile = $_FILES['file_vn']["type"];
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		if (in_array($ext,$choUpload)) { 
			$name_file_vn = rand_string(5).time().".".$ext;
			move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$name_file_vn);
		}else{
			$error = 1;
		}
	}else{
		$name_file_vn = "";
	}

	$data = array(
		'width' 		=> varPost('width'),
		'height' 		=> varPost('height'),
		'style' 		=> varPost('style'),
		'color' 		=> varPost('color'),
		'location' 		=> varPost('location'),
		'video'		=> varPost('video','',1),
		'file_vn'		=> $name_file_vn,
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		//'file_en'		=> $name_file_en,
	);

	if($db-> addflash($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."flash/list");
		return;
	}
}else{
	$data = '';
}

loadview('flash/add_view',$data);
?>