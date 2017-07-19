<?php

$mpagehtml = new Models_MPagehtml;
$id = intval(varGetPost("id"));

if(isset($_POST['editnew']))
{
	$data = array(
		"title_vn" 		      => varPost("title_vn"),
		"title_en" 		      => varPost("title_en"),
		'description_vn' 	  => addslashes(varPost('description_vn','')),
		'description_en' 	  => addslashes(varPost('description_en','')),
		"content_vn" 	      => addslashes(varPost("content_vn",'',1)),
		"content_en" 	      => addslashes(varPost("content_en",'',1)),
		"ticlock"		      => varPost("ticlock","0"),
		'meta_description' 	  => addslashes(varPost('meta_description','',1)),
		'meta_keyword' 	      => addslashes(varPost('meta_keyword','',1)),
	);
	
	$mpagehtml -> editPagehtml($data,$id);
	redirect(BASE_URL_ADMIN."pagehtml/list");
	return;
}

$data["info"] = $mpagehtml->getnewsid($id);

loadview("pagehtml/edit_view",$data);
?>