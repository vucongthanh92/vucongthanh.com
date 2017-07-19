<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PICTURE_EDIT_TITLE; ?></h1>
<br/>
<hr/>

<?php

if($data['error'] != "")
{
	echo 'div id = "error">';
	echo '<h2>Lỗi!</h2>';
	echo '<ul>';
	echo getError($data['error']);
	echo '</ul>';
	echo '</div>';
}
?>

<form action = '<?php echo BASE_URL_ADMIN;?>picture/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
<tr>
		<td class = 'title_td'>Chủ đề</td>
		<td>
			<select name = 'idcat'>
				<option value = ''>- -  chủ đề  - -</option>
			<?php
			$mcatelog = new Models_MCatelog;
			$ldata = $mcatelog->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
			?>
			</select>
		</td>
	</tr>
<?php
/*
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo $data['info']['title_'.$vlang];?>' size = '50'></td>
	</tr>
<?php
} */
?>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images'></td>
	</tr>
    <?php if($data['info']['images'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td><div id = "images">
		<p><img src="<?=BASE_URL."/data/Picture/".$data['info']['images']; ?>" height="60" /></p>
		&nbsp;&nbsp;&nbsp;
		<a href = "javascript: delFlash('<?php echo TBL_ALBUMIMAGE?>','images',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['images'];?>','images','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a></div>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
