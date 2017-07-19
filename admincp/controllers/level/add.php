<?php
$mcatnews = new Models_MLevel;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Capdo/",$error);
	}else{
		$hinh = '';
	}
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'images'		=> $hinh,
		'date'			=> date('Y-m-d'),
	);
	
	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		redirect(BASE_URL_ADMIN."level/list");
		exit();
	}
}else{
	$data = '';
}

loadview('level/add_view',$data);
?>