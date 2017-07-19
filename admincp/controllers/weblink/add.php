<?php

$db = new Models_MWeblink;
if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/KhoaHoc/",$error);
	}else{ $hinh = "";}
	
	$data = array
	(
		'title_vn' 			 => addslashes(varPost('title_vn')),
		'title_en' 			 => addslashes(varPost('title_en')),
		'description_vn'	 => addslashes(varPost('description_vn','')),
		'description_en'	 => addslashes(varPost('description_en','')),
		'content_vn'		 => addslashes($_POST['content_vn']),
		'content_en'		 => addslashes($_POST['content_en']),
		'images'			 => $hinh,
		'sort'				 => varPost('sort'),
		'date'				 => time(),
		'hot'				 => varPost('hot'),
		'ticlock'			 => varPost('ticlock','0'),
		'meta_description'	 => addslashes(varPost('meta_description','')),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','')),
		'view'				 => varPost('view'),
		'location' 			 => addslashes(varPost('location')),
		'link' 			     => addslashes(varPost('link')),
		'link_view' 	     => addslashes(varPost('link_view')),
		'giangvien' 	     => addslashes(varPost('giangvien')),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addWeblink($data) == 0)
	{
		$data['error'] = ERROR_ADD;
	}else{
		redirect(BASE_URL_ADMIN."weblink/list");
		return;
	}
}else{
	$data = '';
}

loadview('weblink/add_view',$data);

?>