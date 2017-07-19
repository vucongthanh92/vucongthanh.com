<?php

$db = new Models_MImages;
if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != '')
	{
		$tenhinh = strtoseo($_POST['title_vn'])."-".rand_string(10);
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Album/",$error);
	}else{$hinh = '';}
	
	$data = array
	(
		'idcat' 		=> varPost('idcat'),
		'images'		=> $hinh,
		'sort'			=> varPost('sort'),
	);

	if($db-> addNew($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
	}
	redirect(BASE_URL_ADMIN.'images/list');
}else{
	$data = "";
}

loadview('images/add_view',$data);
?>