<?php include('submenu_sanpham.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
      <tr>
         <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px;height:23px"></td>
         <td>Quản lý Giao Diện / Danh Mục / Sửa </td>
      </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN."manufacturer/edit/".$data['info']['Id']?>' method='post' enctype="multipart/form-data">
<table>
<tr>
    <td width="780" valign="top">
    <table>
    <?php foreach($config_lang as $klang => $vlang){ ?>
    <tr>
        <td class = 'title_td'><strong>Tiêu Đề</strong></td>
        <td><input type='text' name='title_<?=$vlang;?>' value='<?=$data['info']['title_'.$vlang];?>' size='80'></td>
    </tr>
    <tr>
        <td class = 'title_td'><strong> Mô tả (<?=$vlang ?>)</strong></td>
        <td> <textarea name="description_<?=$vlang?>" style="width:640px; height:100px;"><?=$data['info']['description_'.$vlang];?></textarea></td> 
    </tr>
    <tr>
        <td class = 'title_td'><strong>Chi tiết </strong></td>
        <td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>"><?=$data['info']['content_'.$vlang];?></textarea></td>
    </tr>
    <?php } ?>
    </table>
    </td>

    <td valign="top">
	<table class="right_new">
    <tr>
        <td class='title_td'><strong>Alias </strong></td>
        <td><input type='text' name='alias' value='<?=$data['info']['alias']?>' placeholder="nên để trống" size = '50'></td>
    </tr>
    
    <tr>
       <td class = 'title_td'>Hình Đại Diện</td>
       <td><input type='file' name='images' size="50"></td>
    </tr>
    <?php if($data['info']['images'] != ""){?>
	<tr>
	   <td>&nbsp;</td>
	   <td>
		  <div id = "images">
		  <img src="<?=BASE_URL."/data/Theme/".$data['info']['images']?>" height="50">
		  <a href="javascript:delFlash('<?=TBL_MANUFACTURER;?>','images',<?=$data['info']['Id']?>,'<?=$data['info']['images'];?>','images','
		  <?=BASE_URL_ADMIN?>')"><img src="<?=ADMIN_PATH_IMG;?>b_drop.png"></a></div>
	   </td>
	</tr>
	<?php } ?>

    <tr>
        <td class = 'title_td'><?=SORT;?></td>
        <td><input type='text' name='sort' size='30' value="<?=$data['info']['sort']?>"></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Ngày đăng</td>
        <td><input type='text' name='date' size='30' value="<?=date("Y-m-d h:m:s");?>" ></td>
    </tr>
    
    <tr>
        <td class = 'title_td'>Hot</td>
        <td>
        <select name="hot">
            <option <?php if($data['info']['hot'] == 0) echo "selected";?> value="0" >Tắt</option>
            <option <?php if($data['info']['hot'] == 1) echo "selected";?> value="1" >Bật</option>
        </select>
        </td>
    </tr>

    <tr>
        <td class = 'title_td'>Khóa</td>
        <td>
        <select name="ticlock">
            <option <?php if($data['info']['ticlock'] == 0) echo "selected";?> value="0" >Tắt</option>
            <option <?php if($data['info']['ticlock'] == 1) echo "selected";?> value="1" >Bật</option>
        </select>
        </td>
    </tr>

    <tr>
        <td class = 'title_td'> Meta Keyword</td>
        <td><textarea name="meta_keyword" style="width:320px; height:100px;"><?=$data['info']['meta_keyword'];?></textarea></td>
    </tr>
    
    <tr>
        <td class = 'title_td'> Meta Description</td>
        <td><textarea name="meta_description" style="width:320px; height:100px;"><?=$data['info']['meta_description'];?></textarea></td>
    </tr>
    
    <tr>
        <th colspan="2" align='center'>
            <input class="button" type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="button" type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
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