<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tbody>
          <tr>
             <td width="25">
                 <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
             </td>
             <td> Hệ thống/ Cấu hình site  </td>
          </tr>
       </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN."website/edit/".$data['info']['id']?>' method='post' enctype="multipart/form-data">
   <table>
      <tr>
         <td width="600">
         <table>
            <?php foreach($config_lang as $klang => $vlang){ ?>
	        <tr>
		       <td class = 'title_td'>Tiêu đề (<?=$vlang?>) </td>
		       <td><input type='text' name='title_<?=$vlang?>' size='60' value='<?=$data['info']['title_'.$vlang];?>'></td>
	        </tr>
            
            <tr>
		       <td class='title_td'>Meta Keyword (<?=$vlang?>)</td>
		       <td><textarea  style="width:400px;height:100px;" name="keyword_<?=$vlang?>"><?=$data['info']['keyword_'.$vlang];?></textarea></td>
	        </tr>
            
            <tr>
		       <td class = 'title_td'>Meta Description (<?=$vlang?>)</td>
		       <td><textarea  style="width:400px;height:100px;" name="description_<?=$vlang?>"><?=$data['info']['description_'.$vlang];?></textarea></td>
	        </tr>
            <?php } ?>
         </table>
         </td>
   
         <td valign="top">
         <table>
            <tr>
               <td class = 'title_td'>Bật/ tắt Webite</td>
               <td> 
               <select name="enable">
                      <option value="1" <? if($data['info']['enable']==1) echo 'selected="selected"'; ?> > Bật </option>
                      <option value="0" <? if($data['info']['enable']==0) echo 'selected="selected"'; ?> > Tắt </option>
               </select>
               </td>
            </tr>
            
            <tr>
               <td class = 'title_td'>Đóng dấu ảnh</td>
               <td> 
               <select name="stamp">
                      <option value="1" <? if($data['info']['stamp']==1) echo 'selected="selected"'; ?> > Bật </option>
                      <option value="0" <? if($data['info']['stamp']==0) echo 'selected="selected"'; ?> > Tắt </option>
               </select>
               </td>
            </tr>
            
            <tr>
		       <td class = 'title_td'>Google analytics</td>
		       <td><textarea style="width:500px; height:150px;" name="google"><?=$data['info']['googleanalytics'];?></textarea></td>
	        </tr>
            
            <tr>
		       <th colspan="2" align = 'center'>
			       <input type = "hidden" >
			       <input type = 'submit' value = '<?=G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
		 	       <input type = 'reset' value = '<?=G_BUTTON_RESET;?>' class="button" >
		       </th>
	        </tr>	
            
         </table>
         </td>
       </tr>
   </table>
</form>
</div>
</div>