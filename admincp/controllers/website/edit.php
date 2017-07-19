<?php
$db = new Models_Mwebsite;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array
	(
		"title_vn"          => varPost('title_vn'),
		"title_en"          => varPost('title_en'),
		'description_vn'	=> addslashes(varPost('description_vn','',1)),
		'description_en'	=> addslashes(varPost('description_en','',1)),
		'message'	        => addslashes(varPost('message','',1)),
		'keyword_vn'	    => addslashes(varPost('keyword_vn','',1)),
		'keyword_en'	    => addslashes(varPost('keyword_en','',1)),
		'googleanalytics'	=> addslashes($_POST['google']),
		'enable'			=> varPost('enable'),
		'stamp'				=> varPost('stamp'),
	);
	$db -> editwebsite($data,$id);
	redirect(BASE_URL_ADMIN."website/edit/1");
	return;
}

$data['info'] = $db -> getOnewebsite($id);
loadview("website/edit_view",$data);
?>