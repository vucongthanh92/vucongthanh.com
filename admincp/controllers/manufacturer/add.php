<?php
$db = new Models_MManufacturer;

if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != "")
	{
		$cimg = new uploadImg;
		$tenhinh = rand_string(10);
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Theme/",$error);
	}else $hinh = "";
		
	$data = array
	(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'description_vn'	 => addslashes(varPost('description_vn','')),
		'description_en'	 => addslashes(varPost('description_en','')),
		'content_vn'		 => addslashes($_POST['content_vn']),
		'content_en'		 => addslashes($_POST['content_en']),
		'ticlock'		     => varPost('ticlock','0'),
		'sort'				 => varPost('sort'),
		'images'		     => $hinh,
		'images1'		     => $hinh1,
		'images2'		     => $hinh2,
		'images3'		     => $hinh3,
		'images4'		     => $hinh4,
		'meta_description'	 => addslashes(varPost('meta_description','')),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','')),
		'date'				 => time(),
		'hot'				 => varPost('hot'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addManufacturer($data) == 0){
		$data['error'] = ERROR_ADD;
	}
	else{
		redirect(BASE_URL_ADMIN."manufacturer/list");
		return;
	}
}else{
	$data = '';
}

loadview('manufacturer/add_view',$data);
?>