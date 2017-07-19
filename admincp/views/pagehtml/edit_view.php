<?php include('submenu_khac.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Bài viết mở rộng / Sửa bài viết</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">

<?php
if(!empty($data['error']))
{
	echo "<div id = 'error'>";
	echo "<h2>Lỗi!</h2>";
	echo "<ul>";
	echo getError($data['error']);
	echo "</ul>";
	echo "</div>";
}
?>

<form action = '<?php echo BASE_URL_ADMIN;?>pagehtml/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
    <?php foreach($config_lang as $klang => $vlang) { ?>
	<tr>
		<td class='title_td'><?=TITLE;?> (<?=$vlang;?>)</td>
		<td><input type='text' name='title_<?=$vlang;?>' size='100' value='<?=$data['info']["title_".$vlang];?>'></td>
	</tr>
	<tr>
		<td class='title_td'><?=CONTENT;?> (<?=$vlang;?>)</td>
		<td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>"><?=stripcslashes($data['info']["content_".$vlang]); ?></textarea></td>
	</tr>
    <?php } ?>
    <tr>
        <td class = 'title_td'><?=TICLOCK;?></td>
        <td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
    </tr>
    <tr>
        <th></th>
        <th align = 'center'>
            <input type = 'submit' name = 'editnew' value = '<?php echo G_BUTTON_EDIT;?>' class="button">
            <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
            <input type = 'button' value = '<?php echo G_BUTTON_BACK;?>' onclick = "javascript:history.go(-1);" class="button" >
        </th>
    </tr>	
</table>
</form>
</div>
</div>

<script type="text/javascript">
if (typeof CKEDITOR == 'undefined') {
	document.write('CKEditor');
}
else 
{
	var editorContent_vn = CKEDITOR.replace('editor_vn'); 
	editorContent_vn.config.width = 650;
	editorContent_vn.config.height = 200;
	CKFinder.setupCKEditor(editorContent_vn,'<?=BASE_URL;?>public/ck/ckfinder/');
	
	var editorContent_en = CKEDITOR.replace('editor_en'); 
	editorContent_en.config.width = 650;
	editorContent_en.config.height = 200;
	CKFinder.setupCKEditor(editorContent_en,'<?=BASE_URL ?>public/ck/ckfinder/');
}
</script>