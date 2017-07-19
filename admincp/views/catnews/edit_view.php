<?php include('submenu_tintuc.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Chủ đề nhiếp ảnh / Sửa</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN;?>catnews/edit/<?=$data['info']['Id']?>' method='post' enctype="multipart/form-data">
<table>
  <?php foreach($config_lang as $klang => $vlang) { ?>
  <tr>
      <td class='title_td'>Tiêu Đề (<?=$vlang;?>)</td>
      <td><input type='text' name='title_<?=$vlang;?>' size='50' value='<?=$data['info']['title_'.$vlang];?>'></td>
  </tr>
  <?php } ?>
  
  <tr>
      <td class='title_td'><?=PARENTID;?></td>
      <td>
          <select name='parentid'>
              <option value=''>- - Là chủ đề gốc - -</option>
          <?php
             $mcatnews = new Models_MCatnews;
             $ldata = $mcatnews->listdata();
             echo $tmenu = TreeCat($ldata,0,"",$data['info']['parentid'],"--");
          ?>
          </select>&nbsp;<i style = 'color:red;'>(<?=LUUYCHUDE;?>)</i>
      </td>
  </tr>  
  
  <tr>
      <td class='title_td'>Alias (<?=$vlang;?>)</td>
      <td><input type='text' name='alias' size='50' value='<?=$data['info']['alias'];?>'></td>
  </tr>
  
  <tr>
      <td class = 'title_td'><?php echo SORT;?></td>
      <td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'] ?>'></td>
  </tr>
  <tr>
      <td class = 'title_td'><?php echo TICLOCK;?></td>
      <td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
  </tr>
     <tr>
      <td class = 'title_td'> Meta Keyword</td>
      <td><textarea name="keyword" style="width:400px; height:100px;" ><?php echo $data['info']['meta_keyword'] ?></textarea></td>
  </tr>
  <tr>
      <td class = 'title_td'> Meta Description</td>
      <td><textarea name="description" style="width:400px; height:100px;"  ><?php echo $data['info']['meta_description'] ?></textarea></td>
  </tr>
  <tr>
      <th></th>
      <th align = 'center'>
          <input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'  class="button">
      </th>
  </tr>	
</table>
</form>
</div>
</div>