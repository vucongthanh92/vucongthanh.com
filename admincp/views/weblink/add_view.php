<?php include('submenu_duan.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
         <td width="25"><img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px"></td>
         <td> Quản lý nội dung / Khóa Học Online / Thêm mới</td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN;?>weblink/add' method='post' enctype="multipart/form-data">
<table>
<tbody>
<tr>
    <td width="780" valign="top">
    <table>
    <?php foreach($config_lang as $klang => $vlang){ ?>
    <tr>
        <td class = 'title_td'><strong>Tiêu Đề</strong></td>
        <td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '' size = '80'></td>
    </tr>
    <tr>
        <td class = 'title_td'><strong> Mô tả (<?=$vlang ?>)</strong></td>
        <td> <textarea name="description_<?=$vlang?>" style="width:640px; height:100px;"></textarea></td> 
    </tr>
    <tr>
        <td class = 'title_td'><strong>Chi tiết </strong></td>
        <td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>" ></textarea></td>
    </tr>
    <?php } ?>
    </table>
    </td>

    <td valign="top">
	<table class="right_new">
    <tr>
        <td class = 'title_td'>Location</td>
        <td><input type='text' name='location' value='' placeholder="Trung tâm" size = '40'></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Giảng Viên</td>
        <td><input type='text' name='giangvien' value='' placeholder="Giảng Viên" size = '40'></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Link</td>
        <td><input type='text' name='link' value='' placeholder="Link Affiliate" size = '50'></td>
    </tr>
    
    <tr>
        <td class='title_td'>Alias</td>
        <td><input type='text' name='alias' value='' placeholder="nên để trống" size = '50'></td>
    </tr>
    
    <tr>
       <td class = 'title_td'><?=IMAGES;?></td>
       <td><input type = 'file' name = 'images' size = "50"></td>
    </tr>

    <tr>
        <td class = 'title_td'><?=SORT;?></td>
        <td><input type = 'text' name = 'sort' size = '30' value=""></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Ngày đăng</td>
        <td><input type='text' disabled="disabled" name='date' size='30' value="<?=date("Y-m-d h:m:s")?>" ></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Số lần xem</td>
        <td><input type='text' name='view' size='30' value="1"></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Hot</td>
        <td>
        <select name="hot">
            <option value="0" >Tắt</option>
            <option value="1" >Bật</option>
        </select>
        </td>
    </tr>

    <tr>
        <td class = 'title_td'>Khóa</td>
        <td>
        <select name="ticlock">
            <option value="0" >Tắt</option>
            <option value="1" >Bật</option>
        </select>
        </td>
    </tr>

    <tr>
        <td class = 'title_td'> Meta Keyword</td>
        <td><textarea name="meta_keyword" style="width:240px; height:100px;"></textarea></td>
    </tr>
    
    <tr>
        <td class = 'title_td'> Meta Description</td>
        <td><textarea name="meta_description" style="width:240px; height:100px;"></textarea></td>
    </tr>
    
    <tr>
        <th colspan="2" align='center'>
        <input type='submit' value='<?=G_BUTTON_ADD;?>' name='addnew' class="button" style="margin-left:0px;">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
        </th>
    </tr>	
    </table>
</td>
</tr>
</tbody>
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