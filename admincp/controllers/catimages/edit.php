<?php

$db = new Models_MCatimages;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{	
	$data = array
	(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'description_vn'     => varPost('description_vn',''),
		'description_en'     => varPost('description_en',''),
		'meta_title' 		 => varPost('meta_title'),
		'meta_description'	 => addslashes(varPost('meta_description','',1)),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','',1)),
		'sort'			     => varPost('sort'),
		'ticlock'		     => varPost('ticlock','0'),
	);

	if(varPost('alias')=="")
	{
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	if($_FILES['images']['name'] != '')
	{
		$tenhinh = strtoseo(varPost('title_vn'))."-".rand_string(10);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/NhomAlbum/",$error);
		if($hinh !="") $data['images'] = $hinh;
	}

	$db -> editCatelog($data,$id);
	redirect(BASE_URL_ADMIN."catimages/list");
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("catimages/edit_view",$data);

?>