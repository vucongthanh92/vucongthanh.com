<?php 

$mpagehtml = new Models_MPagehtml;

if(isset($_POST['addnew'])){
	
	
	$data = array(
		'title_vn' 		        => varPost('title_vn'),
		'title_en' 		        => varPost('title_en'),
		'description_vn' 	    => addslashes(varPost('description_vn','',1)),
		'description_en' 	    => addslashes(varPost('description_en','',1)),
		'content_vn' 	        => addslashes(varPost('content_vn','',1)),
		'content_en' 	        => addslashes(varPost('content_en','',1)),
		'meta_description' 	    => addslashes(varPost('meta_description','',1)),
		'meta_keyword' 	        => addslashes(varPost('meta_keyword','',1)),
		'ticlock'		        => varPost('ticlock','0'),
	);

	if($mpagehtml-> addPagehtml($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."pagehtml/list");
		return;
	}
	
}else{
	$data = '';
}

loadview("pagehtml/add_view",$data);

?>