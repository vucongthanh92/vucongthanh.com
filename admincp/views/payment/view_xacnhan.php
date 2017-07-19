<?php include('submenu_sanpham.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Đơn hàng </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="list_button">
<form method="post" action = "" > 
	
	<input type="text" placeholder="Mã Đơn hàng / Họ tên / Số điện thoại " name="tukhoa" size="50" style="float:left; margin-bottom:-5px; margin-top:2px;" /> 
    <input type="text" placeholder="Bắt đầy từ ngày" value="" name="begindate" style="float:left; margin-bottom:-5px; margin-top:2px; margin-left:5px;"  onclick="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd'})" size="30" />
     <input type="text" placeholder="Kết thúc vào ngày" value="" name="enddate" style="float:left; margin-bottom:-5px; margin-top:2px; margin-left:5px; margin-right:5px;" onclick="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd'})" size="30"  />
    <input type="submit" value="Tìm kiếm" name="btntimkiem"  class="button"   />
</form>

</div>
<div class="list_button" style="margin-top:5px;">
<a href = '<?php echo BASE_URL_ADMIN;?>payment/list'  class="button <?php if($_GET['act']=='list') echo 'actives'; ?>" >Tất cả đơn hàng</a>
<a href = '<?php echo BASE_URL_ADMIN;?>payment/today'  class="button <?php if($_GET['act']=='today') echo 'actives'; ?>" > Đơn hàng hôm nay</a>
<a href = '<?php echo BASE_URL_ADMIN;?>payment/xacnhan'  class="button <?php if($_GET['act']=='xacnhan') echo 'actives'; ?>" >Đơn hàng đã xác nhận</a>
<a href = '<?php echo BASE_URL_ADMIN;?>payment/chuaxacnhan'  class="button <?php if($_GET['act']=='chuaxacnhan') echo 'actives'; ?>" >Đơn hàng chưa xác nhận</a>
<a href = '<?php echo BASE_URL_ADMIN;?>payment/thanhcong'  class="button <?php if($_GET['act']=='thanhcong') echo 'actives'; ?>" >Đơn hàng thành công</a>
<a href = '<?php echo BASE_URL_ADMIN;?>payment/dahuy'class="button <?php if($_GET['act']=='dahuy') echo 'actives'; ?>" >Đơn hàng đã hủy</a>
</div>
<form action = '<?php echo BASE_URL_ADMIN;?>payment/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>STT</th>
        <th>Mã DH</th>
		<th><?php echo PM_HOTEN; ?></th>
		<th><?php echo PM_DIACHI; ?></th>
		<th>Email</th>
		<th>Tel</th>
		<th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
		<th colspan = '3'><?php echo G_ACTION; ?></th>
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
		$mpayment = new Models_MPayment;
		foreach($data['info'] as $item)
		{
			$i++;
		?>
		<tr <?php if($item["view"] == 0) echo "style='font-weight:bold'"; ?>>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td ><?php echo $i; ?></td>  
            <td align="center"><?php echo $item['zipcode']; ?></td>
			<td><?php echo $item['fullname']; ?></td>
            
			<td><?php echo $item['address']; ?></td>
			<td><?php echo $item['email']; ?></td>
			<td><?php echo $item['tel'];?></td>
          
			<td><?php echo date("d-m-Y",strtotime($item['date']));?></td>
              <td><?php 
				if($item['status']==0) echo "<span style='color:#000'>Chưa xử lý</a>";
				if($item['status']==1) echo "<span style='color:#000'>Đã xác nhận</a>";
				if($item['status']==2) echo "<span style='color:#07665c'> Đã hoàn thành </a>";
				if($item['status']==3) echo "<span style='color:#F00'>Đơn hàng thất bại</a>";
			?></td>
            <td align = 'center'><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-comment.gif' align="Click để xem chi tiết" style="cursor:pointer" onClick="return popitup('<?=BASE_URL_ADMIN ?>orderdetail.php?id=<?=$item['Id'] ?>')" /></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>payment/edit/<?php echo $item['Id'];?>' title = 'Chi tiết'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."payment/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
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
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</A>
</div>
</form>
</div>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'chitietdonhang','height=480,width=360,top=100,left=250');
	if (window.focus) {newwindow.focus()}
	return false;
}
// -->
</script>
