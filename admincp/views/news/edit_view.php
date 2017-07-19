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
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Bài viết nhiếp ảnh / Sửa bài viết</td>
    </tr>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form name="frm" action='<?=BASE_URL_ADMIN;?>news/edit/<?=$data['info']['Id'];?>' method='post' enctype="multipart/form-data" 
onsubmit="return checkform();">
<table>
<tbody>
<tr>
   <td width="780">
   <table>
	  <?php foreach($config_lang as $klang => $vlang){?>
	  <tr>
    	 <td class = 'title_td'><strong>Tiêu đề (<?=$vlang?>)</strong></td>
		 <td><input type='text' name='title_<?=$vlang;?>' value='<?=$data['info']['title_'.$vlang];?>' size='70'></td>
	  </tr>
      <tr>
    	 <td class='title_td'><strong>Mô tả (<?=$vlang;?>)</strong></td>
		 <td><textarea name="description_<?=$vlang?>" style="width:640px;height:100px;"><?=stripcslashes($data['info']["description_".$vlang]);?>
             </textarea></td>
	  </tr>
      <tr>
    	 <td class='title_td'><strong>Nội dung (<?=$vlang;?>)</strong></td>
		 <td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>"><?=stripcslashes($data['info']["content_".$vlang]);?></textarea></td>
	  </tr>
      <?php } ?>
   </table>
   </td>
   
   <td valign="top">
   <table class="right_new" >
      <tr>
    	 <td class = 'title_td'><strong>Chủ đề</strong></td>
		 <td>
			<select name = 'idcat'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
			$mcatnews = new Models_MCatnews;
			$ldata = $mcatnews->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
			?>
			</select>
		 </td>
	  </tr>
      
      <tr>
    	 <td class = 'title_td'><strong>Alias (<?=$vlang ?>)</strong></td>
		 <td><input type='text' name='alias' value='<?=$data['info']['alias'];?>' size='40'></td>
	  </tr>
      <?php if($data['info']['images'] !=""){ ?>
   	  <tr>
         <td class = 'title_td'></td>
         <td> <img src="<?=BASE_URL."data/NhiepAnh/".$data['info']['images'] ?>" height="100"  /></td>  
      </tr>
      <?php } ?>
      <tr>
         <td class = 'title_td'><?php echo IMAGES;?></td>
         <td><input type = 'file' name = 'images'></td>
      </tr>
      
      <tr>
         <td class = 'title_td'><?php echo SORT;?></td>
         <td><input type = 'text' name = 'sort' size = '30' value="<?=$data['info']['sort'] ?>"></td>
      </tr>
      
      <tr>
         <td class = 'title_td'>Ngày đăng</td>
         <td><input type = 'text' name = 'date' size = '30' value="<?php echo date("d-m-Y",$data['info']['date']); ?>" ></td>
      </tr>
      
      <tr>
         <td class = 'title_td'>Số lần xem</td>
         <td><input type='text' name='view' size='30' value="<?=$data['info']['view'] ?>"></td>
      </tr>
         
      <tr>
         <td class = 'title_td'>Bật / Tắt</td>
         <td>
            <select name="ticlock">
                <option value="0" <?php if($data['info']['ticlock']==0) echo 'selected="selected"';?>>Bật</option>
                <option value="1" <?php if($data['info']['ticlock']==1) echo 'selected="selected"';?>>Tắt</option>
            </select>
         </td>
      </tr>
      
      <tr>
         <td class = 'title_td'> Meta Keyword</td>
         <td><textarea name="meta_keyword" style="width:320px;height:100px;"> <?=$data['info']['meta_keyword'];?></textarea></td>
      </tr>
      
      <tr>
         <td class = 'title_td'> Meta Description</td>
         <td><textarea name="meta_description" style="width:320px;height:100px;"><?=$data['info']['meta_description'];?></textarea></td>
      </tr>
        
      <tr>
		 <th align = 'center' colspan="2">
			<input type='submit' value='<?=G_BUTTON_EDIT;?>' name='editnew' class="button" style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='reset' value='<?=G_BUTTON_RESET;?>' class="button" style="float:none">
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