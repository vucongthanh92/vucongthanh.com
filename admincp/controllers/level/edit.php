<?php
$mcatnews = new Models_MLevel;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	if(isset($_FILES['images']['name']) && $_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Capdo/",$error);
		if($hinh != "") $data['images'] = $hinh;
			
	}
	$mcatnews -> editCatnews($data,$id);
	redirect(BASE_URL_ADMIN."level/list");
	exit();
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("level/edit_view",$data);
?>