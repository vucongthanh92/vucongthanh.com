<?php include('submenu2.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý media / Data Upload / </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">


<?php 

 
	$image_folder= $data["image_folder"];
	$photos = $data["photos"];
	$folders = $data["folders"];
	$current_path_folder = $data["current_path_folder"];
	$breabcrums= $data["breabcrums"];
?>

<style>
div.box{
	float:left; 
	width:102px; 
	height:100px; 
	padding:2px 5px 2px 5px;

}
div.inside{
	width:100px; 
	height:90px; 
	padding:2px;
	border:1px solid #79cbff;
	background-color:#bbe4ff;
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	border-radius:5px;
}
div.inside:hover{
	width:100px; 
	height:90px; 
	padding:2px;
	border:1px solid #79cbff;
	background-color:#def2ff; 
}
div.image{
	width:95px; 
	height:67px;
	padding-top:2px;
	margin:0 auto;
}
div.image_folder{
	width:65px; 
	height:67px;
	padding-top:2px;
	margin:0 auto;
}
p.image{
	text-align:center;
	padding:0;
	margin:0 auto;
	margin-top:1px;
}
div.bar{
	width:100%;
	height:30px;
	padding:1px;
	border:1px solid #ccc;
	background-color:#e7eaeb;
	clear:both;
	width:99%;
	margin-left:5px;
}
a.folder_name{
	text-decoration:none;
	color:#111;
}
a.folder_name:hover{
	text-decoration:underline;
	color:#f00;
}
a.breabcrum{
	text-decoration:none;
	font-weight:bold;
	color:#069;
}
a.breabcrum:hover{
	text-decoration:underline;
	font-weight:bold;
	color:#f00;
}
hr{
	border:1px solid #ccc;
	border-collapse:collapse;
}
.content{ overflow:hidden;}
.box a {
    color: #111111;
    text-decoration: none;
	font-size:11px;
}
</style>
	<div class="content" style="margin-top:0px; padding-bottom:0px;">
    <?php
		if ($data["error"] == 1)
		{
			echo "<div style='width:80%; padding:5px; min-height:15px; background-color:#fedfe3; 
				border-top: 1px solid #fa6378; border-bottom: 1px solid #fa6378; margin-top:5px;'>";
			echo $data["message"] ;
			echo "</div>";
			
		}else{
			if (strlen($data["message"]))
			{
				echo "<div style='padding:5px; width:80%;  height:15px; background-color:#d8e9ff; 
					border-top: 1px solid #3474c2; border-bottom: 1px solid #3474c2;margin-top:5px;'>";
				echo $data["message"] ;
				echo "</div>";
			}
		}
	?>
    <?php
		//breabcrums
		//echo $breabcrums;
		if (! is_null($breabcrums))
		{
			echo "<div class='breabcrums'>";
			echo "<img src='".ADMIN_PATH_IMG."icon-16-star.png' />";
			foreach($breabcrums as $breabcrum)
			{
				
				echo "<a href=".BASE_URL_ADMIN."index.php?mod=folder&act=list&current_path_folder=".$breabcrum["current_path_folder"].">"
					.$breabcrum["folder_name"]."</a>/";
					
			}
			echo "</div>";
			
		}
	?>
    <?php
		// folders
		if (count($folders))
		{
			foreach($folders as $folder)
			{
				echo "<div class='box'>";
					echo "<div class='inside'>";
						
						echo "<div class='image_folder'>";
						
							echo "<img src='".ADMIN_PATH_IMG."icon-65-folder.png' />";
							
						echo "</div>";
						
						echo "<div style='margin: 0 auto; width:100%'>";
							echo "<table width='100%'>";
							echo "<tr>";
								echo "<td align='center'>";
									echo "<a href='".BASE_URL_ADMIN."index.php?mod=folder&act=list&current_path_folder=".$breabcrum["current_path_folder"]."/".$folder."'>".$folder."</a>";
											
								echo "</td>";
								echo "<td width='32'>";	
									echo "<a href='".BASE_URL_ADMIN."index.php?mod=folder&act=rename_folder&folder=".$folder."&current_path_folder=".$breabcrum['current_path_folder']."'>";
									echo "<img src='".ADMIN_PATH_IMG."icon-16-tick.png' />";
						
									echo "</a>";
								
									echo "<a href='".BASE_URL_ADMIN."index.php?mod=folder&act=delete_folder&folder=".$folder."&current_path_folder=".$breabcrum['current_path_folder']." '>";
									echo "<img src='".ADMIN_PATH_IMG."icon-16-remove.png' />";
									echo "</a>";
									
								echo "</td>";
							echo "</tr>";
							echo "</table>";
							
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
			}
		}
		
	?>
<?php
if (count($photos))
		{
			foreach($photos as $photo)
			{
				echo "<div class='box'>";
					echo "<div class='inside'>";
						
						echo "<div class='image'>";
							$file_type = strtolower(substr($photo["name"], strrpos($photo["name"],'.')+1));     
							$website["image_type"] = "jpg|png|gif";
							if (strpos($website["image_type"], $file_type) === false)
							{
								$file_iamges = array(
									"doc"=>"icon-48-doc.png",
									"docx"=>"icon-48-doc.png",
									"xls"=>"icon-48-xls.png",
									"xlsx"=>"icon-48-xls.png",
									"pdf"=>"icon-48-pdf.png",
									"ppt"=>"icon-48-ppt.png",
									"pptx"=>"icon-48-ppt.png",
									"file"=>"icon-48-file.png",
								);
								if (array_key_exists($file_type, $file_iamges))
								{
									echo "<img src='".ADMIN_PATH_IMG.$file_iamges[$file_type]."' style ='width:95px; height:65px;' />";
									
								}
								else
								{
									echo "<img src='".ADMIN_PATH_IMG.$file_iamges['file']."' style ='width:95px; height:65px;' />";
									
								}
							}
							else
							{
								echo "<img src='".$image_folder."/".$photo["name"]."' style ='width:95px; height:65px;' />";
							}
						echo "</div>";
						
						echo "<div style='margin: 0 auto; width:100%'>";
							echo "<table width='100%' border='0'>";
							echo "<tr>";
								echo "<td align='center'>";
									$file_type = strtolower(substr($photo["name"], strrpos($photo["name"],'.')+1));
									$file_name = strtolower(substr($photo["name"],0,strpos($photo["name"],'.')+1));
									if (strlen($file_name)>6)
										echo substr($file_name,0,6)."...";
									else
										echo $photo["name"];
								echo "</td>";
								
								echo "<td width='32'>";	
									echo "<a href='".BASE_URL_ADMIN."index.php?mod=folder&act=rename_file&file=".$photo["name"]."&current_path_folder=".$breabcrum['current_path_folder']." '>";
									echo "<img src='".ADMIN_PATH_IMG."icon-16-tick.png' />";
						
									echo "</a>";
								
									echo "<a href='".BASE_URL_ADMIN."index.php?mod=folder&act=delete_image&file_name=".$photo["name"]."&current_path_folder=".$breabcrum['current_path_folder']." '>";
									echo "<img src='".ADMIN_PATH_IMG."icon-16-remove.png' />";
									echo "</a>";
								echo "</td>";
							echo "</tr>";
							echo "</table>";
							
						echo "</div>";
					echo "</div>";
			
				echo "</div>";
			}
		}
?>
<div class="bar">
    	<table width="99%" border="0">
        <tr>
        	<form action="<?=BASE_URL_ADMIN ?>index.php?mod=folder&act=upload&current_path_folder=<?=$breabcrum["current_path_folder"] ?>" method="post" enctype="multipart/form-data">
        	<td width="80" align="center">File Upload</td>
            <td width="300"><input type="file" name="image"  size="40"/></td>
            <td align="left"><input type="submit" name="btnupload" value="Upload" /></td>
             </form>
            <td>|</td>
            
          <form action="<?=BASE_URL_ADMIN ?>index.php?mod=folder&act=create_folder&current_path_folder=<?=$breabcrum["current_path_folder"] ?>" method="post">
        	<td width="80" align="center">Tên thư mục</td>
            <td width="80" ><input type="text" name="foldername" value="" /></td>
            <td align="left"><input type="submit" name="btntaohumuc" value="Tạo thư mục" /></td>
            </form>
            
        </tr>
        </table>
 </div><!-- end div bar -->
 
</div>
</div>