<?php
$mcatnews = new Models_MCatnews;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'parentid'		     => varPost('parentid'),
		'sort'			     => varPost('sort'),
		'meta_keyword' 	     => varPost('keyword'),
		'meta_description' 	 => varPost('description'),
		'ticlock'		     => varPost('ticlock','0'),
		'alias'              =>varPost('alias'),
	);
	
	if(varPost('alias')=="")
	{
		$data['alias'] = strtoseo(varPost('title_vn'));
	}
	else
	{
		$data['alias'] = varPost('alias');
	}
	
	if($_FILES['images']['name'] != "")
	{
		$cimg = new uploadImg;
		$tenhinh = strtoseo(varPost('title_vn'))."-".time();
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/Catnews/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catnews/",$error);
		}
		if($hinh!="") {
			$data['images'] = $hinh;
		}
	}
	
	$mcatnews -> editCatnews($data,$id);
	redirect(BASE_URL_ADMIN."catnews/list");
	return;
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("catnews/edit_view",$data);

?>