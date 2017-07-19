<?Php
		function create_path($path_folder)
		{
			//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
			return WEB_ROOT."/".$path_folder;
		}
		$db = new Models_MWebsite;
		$cimg = new uploadImg;
		$row = $db->getOneWebsite(1);
		$current_path_folder =  urldecode($_GET["current_path_folder"]);
		$file = $_FILES['image'];
		$file_name = str_replace(" ","-",strtolower(unicode_convert2($file["name"])));
		if (is_file(create_path($current_path_folder)."/".$file_name))
		{
			$message .= "- Đã tồn tại file có tên <strong>$file_name</strong>";
			$error = 1;
		}
		if ($error == 0)
		{
			if($row["stamp"]==1) {
				$cimg->Upload_dongdau($file,$file_name,"../".$current_path_folder."/",$loi);
			}
			elseif($row["stamp"]==0){
				$cimg->Upload_NoReSize($file,$file_name,"../".$current_path_folder."/",$loi);
			}
			if($loi=="") {
			$message .= "Upload thành công.";
			}else { $message = $loi;}
		}
			
		echo $row["stamp"];
		header("location: ".BASE_URL_ADMIN."index.php?mod=folder&act=list&error=".$error."&message=".$message."&current_path_folder=".$current_path_folder);
?>