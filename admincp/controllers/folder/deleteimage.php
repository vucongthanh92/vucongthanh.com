<?php
	function create_path($path_folder)
	{
		//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
		return WEB_ROOT."/".$path_folder;
	}
	 $current_path_folder = urldecode($_GET["current_path_folder"]);
		$file_name = $_GET["file_name"]; 
		// Xoa thanh cong nhung co the Yii van bao loi
		 unlink(create_path($current_path_folder).'/'.$file_name);
	header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&message= - Xóa thành công file <b>".$file_name."</b>&current_path_folder=".$current_path_folder);
?>