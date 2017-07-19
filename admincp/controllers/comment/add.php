<?php

$db = new Models_MComment;
$id = varGetPost("id");

if(isset($_POST['addnew']))
{
	$data = array
	(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'description_vn' 	 => addslashes(varPost('description_vn')),
		'description_en' 	 => addslashes(varPost('description_en')),
		'content_vn'	     => addslashes($_POST['content_vn']),
		'content_en'	     => addslashes($_POST['content_en']),
		'date'				 => time(),
		'hot'				 => varPost('hot'),
		'view'				 => varPost('view'),
		'ticlock'		     => varPost('ticlock','0'),
		'sort'				 => varPost('sort'),
		'meta_description'	 => addslashes(varPost('meta_description','')),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','')),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	if(isset($_FILES['images']['name']) && $_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo($_POST['title_vn'])."-".time();
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/SaiGon/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/SaiGon/",$error);;
		}
		if($hinh != "") $data['images'] = $hinh;
	}
	
	$db -> addNew($data);
	redirect(BASE_URL_ADMIN."comment/list");
	return;
}
else {$data = '';}

$data['info'] = $db -> getOneNew($id);
loadview("comment/add_view",$data);
?>