<?php
$db = new Models_MManufacturer;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
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
		'meta_description'	 => addslashes(varPost('meta_description','')),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','')),
		'date'				 => time(),
		'hot'				 => varPost('hot'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	if($_FILES['images']['name'] != ""){
		$cimg = new uploadImg;
		$tenhinh = rand_string(10);
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Theme/",$error);
		if($hinh!="") {$data['images']=$hinh;}
	}
	
	$db -> editManufacturer($data,$id);
	redirect(BASE_URL_ADMIN."manufacturer/list");
	return;
}

$data['info'] = $db -> getOneManufacturer($id);
loadview("manufacturer/edit_view",$data);
?>