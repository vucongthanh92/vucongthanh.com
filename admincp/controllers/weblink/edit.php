<?php
$db = new Models_MWeblink;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array
	(
		'title_vn' 			 => addslashes(varPost('title_vn')),
		'title_en' 			 => addslashes(varPost('title_en')),
		'description_vn'	 => addslashes(varPost('description_vn','')),
		'description_en'	 => addslashes(varPost('description_en','')),
		'content_vn'		 => addslashes($_POST['content_vn']),
		'content_en'		 => addslashes($_POST['content_en']),
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
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/KhoaHoc/",$error);
		if($hinh!="") $data['images'] = $hinh;
	}
	
	if(varPost('alias')=="")
	{
		$data['alias'] = strtoseo(varPost('title_vn'));
	}
	else {$data['alias'] = varPost('alias');}
	
	$db -> editWeblink($data,$id);
	redirect(BASE_URL_ADMIN."weblink/list");
	return;
}

$data['info'] = $db -> getOneWeblink($id);
loadview("weblink/edit_view",$data);
?>