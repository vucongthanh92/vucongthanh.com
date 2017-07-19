<?php

$db = new Models_MCatimages;
if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != '')
	{
		$tenhinh = strtoseo(varPost('title_vn'))."-".rand_string(10);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/NhomAlbum/",$error);
	}else{$hinh = '';}

	$data = array
	(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'description_vn'     => varPost('description_vn',''),
		'description_en'     => varPost('description_en',''),
		'images'		     => $hinh,
		'meta_title' 		 => varPost('meta_title'),
		'meta_description'	 => addslashes(varPost('meta_description','',1)),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','',1)),
		'sort'			     => varPost('sort'),
		'ticlock'		     => varPost('ticlock','0'),
	);

	if(stripcslashes(varPost('alias'))=="")
	{
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addCatelog($data) == 0)
	{
		$data['error'] = ERROR_ADD;
	}
	else
	{
		redirect(BASE_URL_ADMIN."catimages/list");
		return;
	}
}
else
{
	$data = '';
}
loadview('catimages/add_view',$data);

?>