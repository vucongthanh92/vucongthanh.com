<?php include('submenu_sanpham.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Xuất đơn hàng ra Excel </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="list_button">
<form method="post" action = "<?=BASE_URL."xuatexcel/order_excel.php" ?>" class="formnamecla" > 
	<select name="stastus" style="float:left; margin-right:5px;">
    	<option value="-1">Tình trạng</option>
        <option value="0"  >Chưa xác nhận</option>
        <option value="1"  >Đã xác nhận</option>
        <option value="2" >Đã hoàn thành</option>
        <option value="3" >Đơn hàng thất bại</option>
    </select>
    <input type="text" placeholder="Bắt đầy từ ngày" value="" name="begindate" style="float:left; margin-bottom:-5px; margin-top:2px; margin-left:5px;"  onclick="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd'})" size="30" />
     <input type="text" placeholder="Kết thúc vào ngày" value="" name="enddate" style="float:left; margin-bottom:-5px; margin-top:2px; margin-left:5px; margin-right:5px;" onclick="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd'})" size="30"  />
    <input type="submit" value="Download" name="btntimkiem"  class="button"   />
</form>
<?php $db = new Models_MProduct; ?>
<a href = '<?php echo BASE_URL?>xuatexcel/order_excel.php' target="_blank" class="button" style="float:right"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-excel.png'>  Xuất File Excel</a>
</div>
<form action = '<?=BASE_URL ?>xuatexcel/excel_sces.php' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>STT</th>
        <th>MÃ ĐH</th>
		<th><?php echo PM_HOTEN; ?></th>
		<th>Tổng số SP</th>
        <th>Tổng thanh toán</th>
		<th>Tel</th>      
		<th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	$mthanhvien = new Models_MThanhvien;
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '13' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		$i=0;
		foreach($data['info'] as $item)
		{
			$i++;
		?>
		<tr <?php if($item["view"] == 0) echo "style='font-weight:bold'"; ?>>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['id'];?>"><br></td>
			<td ><?php echo $i; ?></td>  
            <td align="left"><?php echo $item['zipcode']; ?></td>  
			<td align="left"><a href = '<?php echo BASE_URL_ADMIN;?>payment/edit/<?php echo $item['id'];?>' title = 'Chi tiết'><?php echo $item['realname']; ?></a></td>
            <td><?=$item['quantity'] ?></td>
            <td><?=bsVndDot($item["origin"])?></td>
			<td><?php echo $item['mobile'];?></td>
			<td><?php echo date("d-m-Y",$item['create_time']);?></td>
              <td><?php 
				if($item['status']==0) echo "<span style='color:#000'>Chưa xác nhận</a>";
				if($item['status']==1) echo "<span style='color:#07665c'> Đã xác nhận </a>";
				if($item['status']==2) echo "<span style='color:#076a02'>Đã hoàn thành</a>";
				if($item['status']==3) echo "<span style='color:#F00'>Đơn hàng thất bại</a>";
			?></td>
          
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>payment/edit/<?php echo $item['id'];?>' title = 'Chi tiết'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."payment/del/".$item['id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
echo "<p style = 'color:blue;font-weight:bold; text-align:left; margin-left:10px; '>Tổng số:&nbsp;".$data['total'] . "</p> ";
if(isset($data['page']) && $data['page'] != "")
{
	echo "<div class='page'>";
	echo "<span>Trang : </span> ";
	echo $data['page'];
	echo "</div>";
}
?>
<div class="list_button">
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmExcel('Xuất Excel',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/icon-16-xls.png" alt="Xuất Excel" title="Xuất Excel" /> Xuất Excel</A>
</div>
</form>
</div>