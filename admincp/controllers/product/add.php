<?php

$db = new Models_MProduct;
if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn'))."-".time();
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/Product/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Product/",$error);
		}
		if($hinh !=""){
			$cimg->processThumb("../data/Product/".$hinh,"../data/Product/150x150/".$hinh,300,300);
		}
	} else {$name_img = '';} 
	
	$data = array
	(
		'title_vn' 			 => addslashes(varPost('title_vn')),
		'title_en' 			 => addslashes(varPost('title_en')),
		'description_vn'	 => addslashes(varPost('description_vn','')),
		'description_en'	 => addslashes(varPost('description_en','')),
		'content_vn'		 => addslashes($_POST['content_vn']),
		'content_en'		 => addslashes($_POST['content_en']),
		'idcat' 			 => varPost('idcat'),
		'price'				 => str_replace(".","",varPost('price')),
		'sale_price'		 => str_replace(".","",varPost('sale_price')),
		'images'			 => $hinh,
		'sort'				 => varPost('sort'),
		'date'				 => time(),
		'hot'				 => varPost('hot'),
		'ticlock'			 => varPost('ticlock','0'),
		'codepro'			 => varPost('codepro','0'),
		'meta_description'	 => addslashes(varPost('meta_description','')),
		'meta_keyword'		 => addslashes(varPost('meta_keyword','')),
		'view'				 => varPost('view'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	if($db-> addProduct($data) == 0){
		$data['error'] = ERROR_ADD;
	}
	else
	{
		$idcat = $_POST['idcat'];
		if($idcat>0){
			redirect(BASE_URL_ADMIN. "product/list/".$idcat);
			return;
		}else{
			redirect(BASE_URL_ADMIN. "product/list");
			return;
		}
		return;
	}
}
else
{	
	$data = "";
}
loadview('product/add_view',$data);

?>