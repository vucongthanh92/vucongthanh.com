<?php
$db = new Models_MSupport;

if(isset($_POST['addnew'])){
		
	$data = array(
		//'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'nick_vn' 		=> varPost('nick_vn'),
		//'nick_en' 		=> varPost('nick_en'),
		'name_vn' 		=> varPost('name_vn'),
		//'name_en' 		=> varPost('name_en'),
		//'phone_vn' 		=> varPost('phone_vn'),
		//'phone_en' 		=> varPost('phone_en'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'style'			=> varPost('style','0'),
	);

	if($db-> addsupport($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "support/list",
			'add'	=> "support/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('support/add_view',$data);
?>