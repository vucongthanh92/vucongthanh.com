<?php
		function create_path($path_folder)
		{
			//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
			return WEB_ROOT."/".$path_folder;
		}
		$current_path_folder = urldecode($_GET["current_path_folder"]);
		echo $folder_name = $_POST["foldername"];
		
		$error = 0;
		$message = "";
		echo create_path($current_path_folder);
		if (is_dir(create_path($current_path_folder)."/".$folder_name))
		{
			$message .= "- Đã tồn tại thư mục thư mục <strong>$folder_name</strong>.";
			$error = 1;
		}
		
		if ($error == 0)
		{
			mkdir(create_path($current_path_folder)."/".$folder_name);
			$message .= "- Tạo thư mục thành công.";
		}
		
		header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&error=".$error."&message=".$message."&current_path_folder=".$current_path_folder);
?>