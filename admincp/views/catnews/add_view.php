<?php include('submenu_tintuc.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tbody>
         <tr>
            <td width="25"><img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px"></td>
            <td> Quản lý nội dung / Thêm chủ đề nhiếp ảnh / </td>
         </tr>
       </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action='<?=BASE_URL_ADMIN;?>catnews/add' method='post' enctype="multipart/form-data">
<table>
    <?php foreach($config_lang as $klang => $vlang) { ?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>
	</tr>
    <?php } ?>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name='parentid'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
			    $mcatnews = new Models_MCatnews;
			    $ldata = $mcatnews->listdata();
			    echo $tmenu = TreeCat($ldata,0,"","","--");
			?>
			</select>&nbsp;<i style = 'color:red;'>(<?=LUUYCHUDE;?>)</i>
		</td>
	</tr>
    
    <tr>
		<td class='title_td'>Alias</td>
		<td><input type='text' name='alias' size='50'></td>
	</tr>

	<tr>
		<td class = 'title_td'><?=SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>
    <tr>
		<td class = 'title_td'> Meta Keyword</td>
		<td><textarea name="keyword" style="width:400px; height:100px;" ></textarea></td>
	</tr>
    <tr>
		<td class = 'title_td'> Meta Description</td>
		<td><textarea name="description" style="width:400px; height:100px;"  ></textarea></td>
	</tr>
	<tr>
    	<th></th>
		<th  align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div>
</div>