<?php include('submenu_duan.php'); ?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
          <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px;height:23px"></td>
          <td> Quản lý nội dung / Sửa Chủ Đề Seo </td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN."catworks/edit/".$data['info']['Id']?>' method='post' enctype="multipart/form-data">
<table>
   <tr>
      <td width="700" valign="top">
      <table>
         <?php foreach($config_lang as $klang => $vlang){?>
	     <tr>
		    <td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		    <td><input type='text' name='title_<?=$vlang;?>' size='90' value='<?=$data['info']['title_'.$vlang];?>'></td>
	     </tr>
         <?php } ?>
	     <tr>
		    <td class = 'title_td'>Alias</td>
		    <td><input type = 'text' name = 'alias' size = '90' value = '<?php echo $data['info']['alias'];?>'></td>
	     </tr>
         <tr>
		    <td class = 'title_td'><?php echo SORT;?></td>
		    <td><input type='text' name='sort' size='10'  value='<?=$data['info']['sort'];?>' ></td>
	     </tr>
	     <tr>
		    <td class = 'title_td'><?php echo TICLOCK;?></td>
		    <td><input type='checkbox' name='ticlock' value='1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
	     </tr>
	     <tr>
    	    <td></td>
		    <th align = 'center'>
			    <input type="hidden" >
			    <input type='submit' value='<?=G_BUTTON_EDIT;?>' name='editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			    <input type='reset' value='<?=G_BUTTON_RESET;?>' class="button">
		    </th>
	     </tr>	
      </table>
      </td>
      
      <td valign="top">
	  <table class="right_new" >
     	 <tr>
            <td class = 'title_td'>Title Page</td>
            <td><input type='text' name='meta_title' size='32' value="<?=$data['info']['meta_title'];?>"></td>
         </tr>
         <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td><textarea name="meta_keyword" style="width:220px; height:100px;"><?=$data['info']['meta_keyword'];?></textarea></td>
         </tr>
         <tr>
            <td class = 'title_td'> Meta Description</td>
            <td><textarea name="meta_description" style="width:220px; height:100px;"><?php echo $data['info']['meta_description'];?></textarea></td>
        </tr>
      </table>
      </td>
   </tr>
</table>
</form>
</div>
</div>
