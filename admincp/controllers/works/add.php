<?php

$db = new Models_MWorks;
$mpicture = new Models_MPicture;

   if(isset($_POST['addnew']))
   {
		if($_FILES['images']['name'] != ''){
			$tenhinh = strtoseo(varPost('title_vn'));
			$cimg = new uploadImg;
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Seo/",$error);
		}else{$hinh = '';}
		
		$data = array
		(
			'title_vn' 			  => addslashes(varPost('title_vn')),
			'title_en' 			  => addslashes(varPost('title_en')),
			'description_vn'	  => addslashes(varPost('description_vn','')),
			'description_en'	  => addslashes(varPost('description_en','')),
			'content_vn'		  => addslashes($_POST['content_vn']),
			'content_en'		  => addslashes($_POST['content_en']),
			'idcat' 			  => varPost('idcat'),
			'images'			  => $hinh,
			'sort'				  => varPost('sort'),
			'date'				  => time(),
			'hot'				  => varPost('hot','0'),
			'ticlock'			  => varPost('ticlock','0'),
			'meta_description'	  => addslashes(varPost('meta_description','',1)),
			'meta_keyword'		  => addslashes(varPost('meta_keyword','',1)),
			'view'				  => varPost('view'),
		);
	
		if(varPost('alias')=="")
		{
			$data['alias'] = strtoseo(varPost('title_vn'));
		}else {$data['alias'] = varPost('alias'); }

		$id = $db-> addProduct($data);
		redirect(BASE_URL_ADMIN. "works/list");
		return;
}
else
{
	$data = "";
}
loadview('works/add_view',$data);

?>