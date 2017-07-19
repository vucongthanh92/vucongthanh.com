<?php

$db = new Models_MCatelog;
$id = varGetPost("id");
if(isset($_POST['editnew']))
{	
	$data = array
	(
		'title_vn' 		    => varPost('title_vn'),
		'title_en' 		    => varPost('title_en'),
		'parentid'		    => varPost('parentid'),
		'sort'			    => varPost('sort'),
		'description_vn'	=> varPost('description_vn','',1),
		'meta_title' 		=> varPost('meta_title'),
		'meta_description'	=> addslashes(varPost('meta_description','',1)),
		'meta_keyword'		=> addslashes(varPost('meta_keyword','',1)),
		'description_vn'	=> varPost('description_vn','',1),
		'ticlock'		    => varPost('ticlock','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	$db -> editCatelog($data,$id);
	redirect(BASE_URL_ADMIN."catelog/list");
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("catelog/edit_view",$data);
?>