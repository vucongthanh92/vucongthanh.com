<?php
$db = new Models_MImages;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array
	(
		'idcat' 		=> varPost('idcat'),
		'sort'			=> varPost('sort'),
	);
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo($_POST['title_vn'])."-".rand_string(10);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Album/",$error);
		if($hinh !="") { $data['images'] = $hinh; }
	}
	
	$db -> editNews($data,$id);
	redirect(BASE_URL_ADMIN.'images/list');
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("images/edit_view",$data);
?>