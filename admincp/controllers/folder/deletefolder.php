<?php
		function create_path($path_folder)
		{
			//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
			return WEB_ROOT."/".$path_folder;
		}
		$current_path_folder = urldecode($_GET["current_path_folder"]);
		$folder_name = $_GET["folder"];
		$dirs = dir(create_path($current_path_folder)."/".$folder_name);
		
		// kiem tra thu muc co rong hay khong
		$n = 0;
		while($entry = $dirs->read())
		{
			if ($entry == '.' or $entry =='..')
				continue;
				
			$n++;
		}
		
		$error = 0;
		if ($n > 0 ) { // thu muc khong rong
			$error = 1;
			header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&error=".$error."&message=Thư mục không trống <b>".$folder_name."</b>&current_path_folder=".$current_path_folder);
		}
		else {
			
			rmdir(create_path($current_path_folder).'/'.$folder_name);	
			header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&message=Xóa thành công <b>".$folder_name."</b>&current_path_folder=".$current_path_folder);
				
		}
		
		
?>