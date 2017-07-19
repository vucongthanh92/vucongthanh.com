<?php
		
		function create_breabcrum($current_path_folder = 0)
		{
			$breabcrums = array();
			
			$folders = explode("/", $current_path_folder);
			
			if (count($folders) > 0 )
			{
				$breabcrums[0] = array("folder_name"=>$folders[0],"current_path_folder"=>$folders[0]);
				
				for($i = 1; $i<count($folders); $i++)
				{
					$breabcrum = array();
					$breabcrum["folder_name"] = $folders[$i];
					$breabcrum["current_path_folder"] = $breabcrums[$i-1]["current_path_folder"]."/".$folders[$i];
					$breabcrums[] = $breabcrum;
				}
			}
			
			return $breabcrums;
		}
		function create_path($path_folder)
		{
			//return WEB_ROOT."/".APPLICATION_FOLDER."/".$path_folder;
			return WEB_ROOT."/".$path_folder;
		}
		$folder = $_GET["current_path_folder"];
		if($folder=="" ){
			$folder = "data";
		}
		$current_path_folder = urldecode($folder);	
		$photos = array();
		$folders = array();

		$dirs = dir(create_path($current_path_folder));
		while($entry = $dirs->read())
		{
			
			if ($entry == '.' or $entry =='..')
				continue;
				
			$entry_path = create_path($current_path_folder) .'/'.$entry;
			
			if ( ! is_dir($entry_path))
			{
				$photo = array();
				$filetype = strtolower(substr($entry, strrpos($entry,'.')+1));
				$filesize = filesize($entry_path);
				$photo["name"] = $entry;
				$photo["type"] = '.'.$filetype;
				$photo["size"] = $filesize;
				
				$photos[] =  $photo;
			}else{ // folder
				if (strcmp($entry, "mcith") !=0 )
					$folders[] = $entry;
			}
		}
		$image_folder = BASE_URL;
		$image_folder .= $current_path_folder;
		
		$data["error"] = $error;
		$data["message"] = urldecode($message);
		$data["image_folder"] = $image_folder;
		$data["photos"] = $photos;
		$data["folders"] = $folders;
		$data["current_path_folder"] = $current_path_folder;
		$data["breabcrums"] = create_breabcrum($current_path_folder);
	loadview("folder/list_view",$data);

?>