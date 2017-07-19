<style type="text/css">
.cart { border-collapse:collapse; border: solid 1px #DDDDDD;}
.cart td { border: solid 1px #DDDDDD; padding:5px;}
.cart th {
	background: -moz-linear-gradient(100% 100% 90deg, #F0F0F0, #F8F8F8) repeat scroll 0 0 transparent;
    border-bottom: 1px solid #DDDDDD;
    border-top: 1px solid #DDDDDD;
	padding:5px;
}
</style>
<?php include('submenu_sanpham.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Đơn hàng / Chi tiết </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<form action="<?=BASE_URL_ADMIN ?>payment/edit/<?=$data['cus']['Id'] ?>" method="post"> 
<table>
<tr>
<td style="text-align:left" width="500" valign="top">
     <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin khách hàng
    </h2>
<table>
	<tr>
		<td class = 'title_td'><?php echo BG_HOTEN;?></td>
		<td><?php echo $data['cus']['fullname'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Số lượng sản phẩm</td>
		<td><?php echo $data['cus']['soluong'];?></td>
	</tr>
    	<tr>
		<td class = 'title_td'>Thanh toán</td>
		<td><?php echo bsVndDot($data['cus']['tongdonhang']);?> đ</td>
	</tr>
	<tr>
		<td class = 'title_td'>Tel</td>
		<td><?php echo $data['cus']['tel'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ngày đặt hàng</td>
		<td><?php echo date("d-m-Y",strtotime($data['cus']['date']));?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><?php echo $data['cus']['email'];	
		?></td>
	</tr>
    <tr>
		<td class = 'title_td'>Phương thức thanh toán</td>
		<td><?php echo $data['cus']['methodpay'];	
		?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ghi chú</td>
		<td><?php echo trim($data['cus']['note']);?></td>
	</tr>
</table>
</td>
<td valign="top" style="text-align:left">
	  <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Xác nhận đơn hàng
    </h2>
    
    	<p> <b style="padding-right:20px;">Tình trạng:</b>
        <select name="tinhtrang">
        	<option value="1" <?php if($data['cus']['status']==1 ) echo 'selected'; ?> >Chưa xác nhận</option>
            <option value="2" <?php if($data['cus']['status']==2 ) echo 'selected'; ?> >Đã xác nhận</option>
            <option value="3" <?php if($data['cus']['status']==3 ) echo 'selected'; ?> >Đã hoàn thành</option>
            <option value="4" <?php if($data['cus']['status']==4 ) echo 'selected'; ?>>Đơn hàng thất bại</option>
    	</select></p>
      
         <p style="padding-left:80px;"><input type="submit" value="Cập nhật" name="btnupdate" style="cursor:pointer" /></p>
     
     <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin giỏ hàng
    </h2>
  </form>
<form action="<?=BASE_URL_ADMIN ?>payment/soluong/<?=$data['cus']['id'] ?>" method="post">
<table class="cart">
	<tr>
		<th>STT</th>
		<th>Tên sản phẩm</th>
		<th>Hình sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Tổng giá</th>
	</tr>
	<?php
	$mpro = new Models_MProduct;
	$i=0;
	if(!empty($data['cart']))
	{
		$tongcong = 0;
		foreach($data['cart'] as $item)
		{
			
			
			
			$pro = $mpro->getOneProduct($item['idpro']);
			$price = $pro['sale_price'];
			$tong = $price *$item['amount'];
			$tongcong += $tong;
			$i++;
		?>
		<tr>
			<td align = 'center'><?php echo $pro['Id'];?></td>
			<td><?php echo $pro['title_vn'];?></td>
			<td><img src = '<?php echo BASE_URL;?>/data/Product/<?php echo $pro['images']; ?>' width = '60'></td>
			<td align = 'center'><input type="text" size="5" value="<?php echo $item['amount'];?>" name="soluong[<?=$item['Id'] ?>]" /></td>
			<td align = 'right'><?php echo bsVndDot($price);?></td>
			<td align = 'right'><?php echo bsVndDot($tong);?></td>
		</tr>
		<?php 
		} 
	}
	?>
	<tr>
		<td colspan = '5' align = 'right'><b>Tổng cộng</b></td>
		<td align = 'right'><b><?php echo bsVndDot($tongcong);?> VNĐ</b></td>
	</tr>
</table>
</form>
</td>
</tr>
</table>

<div class="backlink"><a href="<?=BASE_URL_ADMIN ?>payment/list"> <img src="<?=ADMIN_PATH_IMG ?>back.png" border="0" />Trở lại</a></div>
</div>