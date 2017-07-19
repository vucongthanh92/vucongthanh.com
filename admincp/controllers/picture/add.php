<?php
$db = new Models_MPicture;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn')).rand_string(20);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Picture/",$error);
	}else{
		$hinh = '';
	}
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'idcat' 		=> varPost('idcat'),
		'images'		=> $hinh,
		'sort'			=> varPost('sort'),
	);

	if($db-> addNew($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "picture/list",
			'add'	=> "picture/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = "";
}

loadview('picture/add_view',$data);
?>