<?php
	function create_path($path_folder)
	{
		//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
		return WEB_ROOT."/".$path_folder;
	}
	$current_path_folder = urldecode($_GET["current_path_folder"]);
	$folder = $_GET["folder"];
	$error = 0;
	$message = "";
	if(isset($_POST["foldername"])) {
		$new_folder_name = str_replace(" ","-",unicode_convert2($_POST["foldername"]));
		if (is_dir(create_path($current_path_folder)."/".$new_folder_name))
		{
			$error = 1;
			$message = "- Đã tồn thư mục có tên <strong>$new_folder_name</strong>";
		}else{	
			rename(create_path($current_path_folder).'/'.$folder, 
			create_path($current_path_folder).'/'.$new_folder_name);
			$message = "- Đổi tên thư mục thành công.";
			header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&error=".$error."&message=".$message."&current_path_folder=".$current_path_folder);
			
		}
	}
	$data["folder"] = $folder;
	$data["error"] = $error;
	$data["message"] = $message;
	$data["current_path_folder"] = $current_path_folder;
	loadview("folder/formrenamefolder",$data);
?>