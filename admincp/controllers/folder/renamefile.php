<?php
	function create_path($path_folder)
	{
		//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
		return WEB_ROOT."/".$path_folder;
	}
	$current_path_folder = urldecode($_GET["current_path_folder"]);
	$file = $_GET["file"];
	$error = 0;
	$message = "";
	if(isset($_POST["filername"])) {
		$new_file_name = str_replace(" ","-",$_POST["filername"]);
		if (is_file(create_path($current_path_folder)."/".$new_file_name))
		{
			$error = 1;
			$message = "- Đã tồn file có tên <strong>$new_file_name</strong>";
		}else{	
			rename(create_path($current_path_folder).'/'.$file, 
			create_path($current_path_folder).'/'.$new_file_name);
			$message = "- Đổi tên file thành công.";
			header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&error=".$error."&message=".$message."&current_path_folder=".$current_path_folder);
			
		}
	}
	$data["file"] = $file;
	$data["error"] = $error;
	$data["message"] = $message;
	$data["current_path_folder"] = $current_path_folder;
	loadview("folder/formrenamefile",$data);
?>