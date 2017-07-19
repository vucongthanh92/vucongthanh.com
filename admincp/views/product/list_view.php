<?php include('submenu_sanpham.php'); ?>
<div class="main_area">
   <div class="breakcrumb">
     <table border="0">
        <tbody>
        <tr> 
           <td width="25"><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height:23px"></td>
           <td> Quản lý nội dung / Sản phẩm </td>
        </tr>
        </tbody>
     </table>
   </div>
</div>

<div class="content">
<div class="list_button"><a href='<?=BASE_URL_ADMIN?>product/add' class="button"><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'>Thêm mới</a></div>
<div class="list_button" style="margin-top:0px;">
<form action="<?=BASE_URL_ADMIN ?>" method="get">
<input type="hidden" name="mod" value="product" />
<input type="hidden" name="act" value="list" />

<table cellpadding="0" style="float:left">
<tbody>
    <td> 
       <select name = 'id' id="idcat">
          <option value = '0'>- - Chọn chủ đề - -</option>
          <?php echo $tmenu = TreeCat($data['cat'],0,"",$_GET['id'],"--");?>
       </select>
       <input type="text"  placeholder="Tìm tiêu đề" size="40" name="tukhoa" value="<?=$_GET['tukhoa'] ?>" />
    </td>
    <td><input type="submit" value="Tìm kiếm" name="btntimkiem" class="button" /></td>
</tbody>
</table>
</form>
</div>

<?php $mproduct = new Models_MProduct; ?>
<form action='<?=BASE_URL_ADMIN;?>product/del' method='post'  name="rowsForm" id="rowsForm">

<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
        <th>Chủ Đề</th>
		<th><?php echo IMAGES; ?></th> 
		<th width="50">Hot</th>
        <th>Lượt Xem</th>
        <th width="100">Ngày đăng </th>
		<th><?php echo SORT; ?></th>
		<th width="50"><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php if(empty($data['info'])) { ?>
	<tr>
		<td colspan = '15' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php } else { foreach($data['info'] as $item) { ?>
	<tr>
        <td align='center'><input type="checkbox" id='check_list' name="check_list[]" value="<?=$item['Id'];?>"><br></td>
        <td><?=$item['Id']; ?></td>
        <td align="center"><a href='<?=BASE_URL_ADMIN;?>product/edit/<?=$item['Id'];?>' title='Sửa'><?=$item['title_vn'];?></a></td>
        <td>
		<?php
		    $idcat=$item['idcat'];
			$sql="select * from mn_catelog where Id='$idcat'";
			$ds=mysql_query($sql) or die(mysql_error());
			$row=mysql_fetch_assoc($ds);
			echo $row['title_vn'];
        ?></td>
        <td><img src = '<?php echo BASE_URL;?>data/Product/<?php echo $item['images']; ?>' width = '60'></td>
        <td align = 'center'>
        <?php 
        if($item['hot'] == "1"){
           echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_PRODUCT."\",\"hot\",\"".$item['Id']."\",\"0\",\"hot".$item['Id']
		   ."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
        }
		else
		{
           echo "<div id='hot".$item['Id']."'><a href='javascript:hideshow(\"".TBL_PRODUCT."\",\"hot\",\"".$item['Id']."\",\"1\",\"hot".$item['Id']
		   ."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
        }
        ?>
        </td>	

        <td align = 'center'><?=$item['view'];?></td>	
        <td align="center"><?=date('d-m-Y',$item['date']);?></td>
        <td align='center'><input type='text' size='5' name='sort[<?=$item['Id'];?>]' value="<?=$item['sort'];?>" style='text-align:center;' /></td>		
        <td align = 'center'>
        <?php 
        if($item['ticlock'] == "1"){
            echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['Id']."\",\"0\",\""
			.BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
        }
		else{
            echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['Id']."\",\"1\",\""
			.BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
        }
        ?>
        </td>

        <td align='center' width="30"><a href='<?=BASE_URL_ADMIN;?>product/edit/<?=$item['Id'];?>' title='Sửa'><img src='<?=ADMIN_PATH_IMG;?>b_edit.png'>
        </a></td>
        <td align='center' width="30"><a href='<?=BASE_URL_ADMIN."product/del/".$item['Id'];?>' title='Xóa' onclick='javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src='<?=ADMIN_PATH_IMG;?>b_drop.png'></a></td>
    </tr>
    <?php }} ?>
</table>

<?php echo "<p style = 'color:blue;font-weight:bold; text-align:left; margin-left:10px; '>Tổng số:&nbsp;".$data['total']."</p> ";
if(isset($data['page']) && $data['page'] != "")
{
	echo "<div class='page'>";
	echo "<span>Trang : </span> ";
	echo $data['page'];
	echo "</div>";
}
?>

<div class="list_button">
<a href='<?=BASE_URL_ADMIN;?>product/add' class="button"><span class='them'> <img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button">
   <img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>product/save')" class="button" >
   <img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</div>
</form>
</div>