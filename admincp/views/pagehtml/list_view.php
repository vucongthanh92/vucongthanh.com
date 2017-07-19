<?php include('submenu_khac.php'); ?>

<div class="main_area">

    <div class="breakcrumb">

    <table border="0">

    <tbody>

    <tr>

    <td width="25">

    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">

    </td>

    <td> Quản lý nội dung / Bài viết mở rộng / </td>

    </tr>

    </tbody>

    </table>

    </div>

</div>

        



<div class="content">

<div class="list_button">

<a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/add' class="button" ><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></a>

</div>



<form action = '<?php echo BASE_URL_ADMIN;?>pagehtml/del' method = 'post'  name="rowsForm" id="rowsForm">

<table class="view">

	<tr>

		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>

		<th width="50">ID</th>

		<th><?php echo TITLE; ?></th>



		<th width="100">Bật / Tắt</th>

		<th width="100"><?php echo G_ACTION; ?></th>

	</tr>

	<?php

	if(empty($data)){ //neu khong co du lieu

	?>

	<tr>

		<td colspan = '6' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>

	</tr>

	<?php

	}

	else //neu co du lieu xuat du lieu ra

	{

		foreach($data as $item)

		{

	?>

		<tr>

			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>

			<td><?php echo $item['Id']; ?></td>

			<td align="left"><a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/edit/<?php echo $item['Id'];?>'><?php echo $item['title_vn']; ?></a></td>



			<td align = 'center'>

			<?php 

			if($item['ticlock'] == "1"){

				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_PAGEHTML."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";

			}else{

				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_PAGEHTML."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 

			}

			?>

			</td>

			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/edit/<?php echo $item['Id'];?>'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>

			<!--<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."pagehtml/del/".$item['Id'];?>' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>-->

		</tr>

	<?php

		}

	}

	?>

</table>

<div class="list_button">

<a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></span></a>

<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Delete item selected" /> Delete</a>

</div>

</form>

</div>

