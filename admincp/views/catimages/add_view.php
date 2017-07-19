<?php include('submenu_tintuc.php');?>

<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
          <td width="25"><img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px"></td>
          <td> Quản lý nội dung / Chủ đề hình ảnh </td>
       </tr>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN;?>catimages/add' method='post' enctype="multipart/form-data">
<table>
   <tr>
      <td width="800" valign="top">
        <table>
        <?php foreach($config_lang as $klang => $vlang) { ?>
        <tr>
            <td class = 'title_td'><?=TITLE;?> (<?=$vlang;?>)</td>
            <td><input type = 'text' name = 'title_<?=$vlang;?>' size = '90'></td>
        </tr>
        <?php } ?>
        <tr>
            <td class = 'title_td'><?=IMAGES;?></td>
            <td><input type = 'file' name='images'></td>
        </tr>
        <tr>
            <td class = 'title_td'> Alias</td>
            <td><input type = 'text' name = 'alias' size = '70'></td>
        </tr>           
        <tr>
            <td class = 'title_td'><?=SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '10'></td>
        </tr>
        <tr>
            <td class = 'title_td'><?=TICLOCK;?></td>
            <td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
        </tr>
        <tr>
            <th colspan = '2' align = 'center'>
                <input type = 'submit' value = '<?=G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = 'reset' value = '<?=G_BUTTON_RESET;?>'>
            </th>
        </tr>	
     </table>
     </td>

    <td valign="top">
    <table class="right_new" >
        <tr>
            <td class = 'title_td'>Title Page</td>
            <td><input type='text' name='meta_title' size = '50'></td>
        </tr>
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td><textarea name="meta_keyword" style="width:320px; height:100px;"></textarea></td>
        </tr>
        <tr>
            <td class = 'title_td'> Meta Description</td>
            <td><textarea name="meta_description" style="width:320px; height:100px;"></textarea></td>
        </tr>
    </table>
    </td>
</tr>
</tbody>
</table>
</form>
</div>
</div>
