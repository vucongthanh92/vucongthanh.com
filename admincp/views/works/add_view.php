<script type = 'text/javascript'>
function checkform()
{
	var frm = document.frm1;
	if(frm.idcat.value == 0)
	{
		alert("Vui lòng chọn chủ đề");
		return false;
	}
	if(frm.title_vn.value == "")
	{
		alert("Vui lòng nhận tiêu đề ");
		frm.title_vn.focus();
		return false;
	}
}
</script>

<?php include('submenu_duan.php'); ?>
<div class="main_area">
     <div class="breakcrumb">
     <table border="0">
        <tr>
           <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG;?>icon-48-pro.png" style="width:23px;height:23px"></td>
           <td> Quản lý nội dung / Seo / Thêm mới </td>
        </tr>
     </table>
     </div>
</div>

<div class="content">
<div class="content_i">
<form name="frm1" action='<?=BASE_URL_ADMIN;?>works/add' method='post' enctype="multipart/form-data" onsubmit="return checkform();">
<table>
   <tr>
      <td width="780" valign="top">
      <table>
         <?php foreach($config_lang as $klang => $vlang){?>
	     <tr>
    	    <td class='title_td'><strong>Tiêu đề (<?=$vlang ?>)</strong></td>
 		    <td><input type='text' name='title_<?=$vlang;?>' value='' size='80'></td>
	     </tr>
         <tr>
            <td class = 'title_td'><strong> Mô tả (<?=$vlang ?>)</strong></td>
            <td> <textarea name="description_<?=$vlang?>" style="width:640px; height:100px;"></textarea></td> 
         </tr>
         <tr>
    	    <td class='title_td'><strong>Chi tiết (<?=$vlang ?>)</strong></td>
		    <td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>" ></textarea></td>
	     </tr>
         <?php } ?>
      </table>
      </td>

      <td valign="top">
	  <table class="right_new" >
        <tr>
           <td class = 'title_td' ><strong>Chủ đề</strong></td>
           <td>
           <select name = 'idcat'>
              <option value = ''>- - Chọn chủ đề - -</option>
              <?php
                 $mcatelog = new Models_MCatworks;
                 $ldata = $mcatelog->listdata();
                 echo $tmenu = TreeCat($ldata,0,"","","--");
              ?>
           </select>
           </td>
        </tr>
        <tr>
    	    <td class = 'title_td'><strong>Alias </strong></td>
		    <td><input type = 'text' name = 'alias' value = '' placeholder="nên để trống" size = '50'></td>
	    </tr>
        <tr>
		    <td class = 'title_td'>Hình đại diện</td>
		    <td><input type = 'file' name = 'images' size = "50"></td>
	    </tr>
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '30' value=""></td>
        </tr>
        <tr>
            <td class = 'title_td'>Ngày đăng</td>
            <td><input type = 'text' name = 'date' size = '30' value="<?=date("Y-m-d h:m:s")?>" ></td>
        </tr>
        <tr>
            <td class='title_td'>Lượt Xem</td>
            <td><input type='text' name='view' size='30' value="" ></td>
        </tr>
        <tr>
            <td class = 'title_td'>Home</td>
            <td>
            <select name="hot">
                <option value="0" >Tắt</option>
                <option value="1">Bật</option>
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
            <td>
            	<textarea name="meta_keyword" style="width:320px; height:100px;"></textarea>
            </td>
        </tr>
        
        <tr>
            <td class = 'title_td'> Meta Description</td>
            <td><textarea name="meta_description" style="width:320px; height:100px;"></textarea></td>
        </tr>
        <tr>
    	    <td></td>
		    <th align = 'center'>
		       <input type='submit' value='<?=G_BUTTON_ADD;?>' name='addnew' class="button" style="margin-left:50px;">&nbsp;&nbsp;&nbsp;&nbsp;
			   <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
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