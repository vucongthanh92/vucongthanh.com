<?php
$mcatnews = new Models_MCatNews;

if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo(varPost('title_vn'))."-".time();
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/Catnews/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catnews/",$error);
		}
	}
	else
	{ 
	    $hinh = "";
	}
	
	$data = array
	(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'parentid'		     => varPost('parentid'),
		'sort'			     => varPost('sort'),
		'ticlock'		     => varPost('ticlock','0'),
		'meta_keyword' 	     => varPost('keyword'),
		'meta_description' 	 => varPost('description'),
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else{
		$data['alias'] = varPost('alias');
	}
	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."catnews/list");
		return;
	}
}else{
	$data = '';
}

loadview('catnews/add_view',$data);
?>