<script type="text/javascript">
function checkform(){
	var frm = document.frm;
	if(frm.idcat.value == ""){
		alert("Vui lòng chọn chủ đề");
		return false;
	}
	if(frm.title_vn.value == ""){
		alert("Vui lòng nhận tiêu đề tin");
		frm.title_vn.focus();
		return false;
	}
}
</script>
<?php include('submenu_tintuc.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
      <tr>
        <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG;?>icon-48-square.png" style="width:23px; height: 23px"></td>
        <td> Quản lý nội dung / Bài viết nhiếp ảnh / Thêm mới</td>
      </tr>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form name="frm" action='<?=BASE_URL_ADMIN;?>news/add' method='post' enctype="multipart/form-data" onsubmit="return checkform();">
<table>
   <tr>
     <td width="780"><h2><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">Thông tin bài viết</h2>
     <table>
        <?php foreach($config_lang as $klang => $vlang) { ?>
	    <tr>
    	    <td class = 'title_td'><strong>Tiêu đề (<?=$vlang ?>)</strong></td>
		    <td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '100'></td>
	    </tr>
	    <tr>
    	    <td class = 'title_td'><strong> Mô tả (<?=$vlang ?>)</strong></td>
            <td> <textarea name="description_<?=$vlang?>" style="width:640px; height:100px;"></textarea></td> 
        </tr>
	    <tr>
    	    <td class = 'title_td'><strong>Nội dung (<?=$vlang ?>)</strong></td>
            <td> <textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>" ></textarea></td> 
        </tr>
        <?php } ?>
     </table>
     </td>

     <td valign="top"><h2><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">Thông tin thiết lập</h2>
	 <table class="right_new">
        <tr>
    	    <td class = 'title_td'>Chủ đề</td>
		    <td><select name = 'idcat'>
                <option value = ''>- - Chọn chủ đề - -</option>
                <?php
                   $mcatnews = new Models_MCatnews;
                   $ldata = $mcatnews->listdata();
                   echo $tmenu = TreeCat($ldata,0,"","","--");
                ?>
                </select>
		    </td>
	    </tr>
         
        <tr>
            <td class = 'title_td'>Alias</td>
            <td><input type='text' name='alias' size='40'></td>
        </tr>
        
        <tr>
            <td class = 'title_td'><?php echo IMAGES;?></td>
            <td><input type = 'file' name = 'images'></td>
        </tr>
        
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '40'></td>
        </tr>
        
        <tr>
            <td class='title_td'>Số lần xem</td>
            <td><input type='text' name='view' size='40'></td>
        </tr>
        
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0">Bật</option>
                    <option value="1">Tắt</option>
            	</select>
            </td>
        </tr>
        
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td>
            	<textarea name="meta_keyword" style="width:320px; height:100px;"></textarea>
            </td>
        </tr>
        
        <tr>
            <td class = 'title_td'> Meta Description</td>
            <td>
            	<textarea name="meta_description" style="width:320px; height:100px;"></textarea>
            </td>
        </tr>
        <tr>
		  <th align='center' colspan="2" colspan="2">
			<input type='submit' value='<?=G_BUTTON_ADD;?>' name='addnew' class="button" style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='reset' value='<?=G_BUTTON_RESET;?>' class="button" style="float:none" >
		  </th>
	    </tr>	
    </table>
</td>
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