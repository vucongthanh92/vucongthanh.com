<?php
$db = new Models_MPicture;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'idcat' 		=> varPost('idcat'),
		'sort'			=> varPost('sort'),
	);
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn')).rand_string(20);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Picture/",$error);
		if($hinh !="") { $data['images'] = $hinh; }
	}
	
	
	$db -> editNews($data,$id);
	$link = array(
		'list'	=> "picture/list",
		'add'	=> "picture/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("picture/edit_view",$data);
?>