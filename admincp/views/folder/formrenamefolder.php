<?php include('submenu2.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý media / Data Upload / Đổi tên thư mục </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i" >
<?php
	if($data["error"]==1){
		echo "<div class='error'>".$data["message"]."</div>";	
	}
?>
<form action="<?php echo BASE_URL_ADMIN;?>index.php?mod=folder&act=rename_folder&folder=<?=$data['folder']?>&current_path_folder=<?=$data['current_path_folder'] ?>" method="post">
<table class="view2">
<tr>
    <td class = 'title_td'>Tên thư mục: </td>
    <td><input type = 'text' name = 'foldername' size="50" value="<?=$data["folder"] ?>"></td>
</tr>
<tr>
    <th colspan = '2' align = 'center'>
    <input  type = 'submit' value = 'Lưu lại' name = 'addnew'>&nbsp;&nbsp;
    <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
    </th>
</tr>
</table>
</form>
</div>
</div>
</div>