<?php
$mpayment = new Models_MPayment;
if(isset($_POST['hoten']))
{
	$to = $data['email_admin'];
	$mpayment = new Models_MPayment;
	$error =0;
	$hoten = varPost('hoten');
	$email = varPost('email');
	$address = varPost('address');
	$payment = varPost('payment');
	$note = varPost('note');
	$email = varPost('email');
	$tel  =varPost('tel');
	if($hoten ==""){
		$error = 1;
		$message .= "Bạn  chưa nhập họ tên <br>";
	}
	if($email ==""){
		$error =1;
		$message .= "Bạn  chưa nhập Email <br>";
	}
	if( isValidEmail($email) == false){
		$error =1;
		$message .= "Email không hợp lệ <br />"; 	
	}
	if($address ==""){
		$error = 1;
		$message .= "Bạn chưa nhập địa chỉ <br>";
	}
	if($payment ==0){
		$error = 1;
		$message .= "Bạn chưa chọn phương thức thanh toán <br>";
	}
	else if ($error == 0)
	{
		if($payment == 1) $pt ="Giao hàng thu tiền tận nơi";
		else $pt = "Mua và thanh toán tại cửa hàng";
		//-----------------------------
		$i =1;
		$dongdonhang = 0;
		foreach($_SESSION["cart2"] as $k=>$v) 
		{
			if($k>0){
				$sql = "SELECT * FROM mn_product WHERE Id = '$k'";
				$rw= mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_assoc($rw);	
				if($row['sale_price']>0) $price = $row['sale_price'];
				else $price = $row['price'];
				$dongdonhang = $dongdonhang + ($price *$v);
			 
			  $sanpham .= '<tr>
				<td>'.$i.'</td>
				
				<td>'.$row["title_".lang].'</td>
				<td>'.$v.'</td>
				<td style="color:#FF0000; font-size:12px; font-weight:bold;">'. number_format($price,0,",",".").' VNĐ</td>
				
			  </tr>';
			}
       } 
	   ///--------------------------------
	   ob_start();
	   echo file_get_contents("mail/emaidathang_admin.html");
	   $noidung = ob_get_clean();
	   $noidung =str_replace("{thongtinsanpham}", $sanpham ,$noidung);
	   $noidung = str_replace("{tongdonhang}", $dongdonhang , $noidung);
	   $noidung = str_replace("{email}", $email, $noidung);
	   $noidung = str_replace("{dienthoai}", $tel , $noidung);
	   $noidung =str_replace("{noidung}", $thongtin , $noidung);
	   $noidung =str_replace("{phuongthucthanhtoan}", $pt , $noidung);
	   $noidung =str_replace("{diachigiaohang}", $address , $noidung);
	   $noidung =str_replace("{diachi}", $address , $noidung);
	   $noidung =str_replace("{hoten}", $hoten , $noidung);
	   $tieude = "Thông tin đơn đặt hàng từ Noithat256.com";
	   smtpmailer($email,$user['email'],$tieude,$hoten,$noidung);
	   // end goi mail admin
	   ob_start();
	   echo file_get_contents("mail/emaidathang_khachhang.html");
	   $noidung1 = ob_get_clean();
	   $noidung1 =str_replace("{thongtinsanpham}", $sanpham ,$noidung1);
	   $noidung1 = str_replace("{tongdonhang}", $dongdonhang , $noidung1);
	   $noidung1 = str_replace("{email}", $email, $noidung1);
	   $noidung1 = str_replace("{dienthoai}", $tel , $noidung1);
	   $noidung1 =str_replace("{noidung}", $thongtin , $noidung1);
	   $noidung1 =str_replace("{phuongthucthanhtoan}", $pt , $noidung1);
	   $noidung1 =str_replace("{diachigiaohang}", $address , $noidung1);
	   $noidung1 =str_replace("{diachi}", $address , $noidung1);
	   $noidung1 =str_replace("{hoten}", $hoten , $noidung1);
	   $tieude = "Thông tin đơn đặt hàng từ Noithat256.com";
	   smtpmailer($to,$email,$tieude,'Noithat256.com',$noidung1);
			
	   $idmax = idMax(TBL_CUSTOMER) + 1;
	   $infokh = array();
	   $infokh['Id'] = $idmax;
	   $infokh['fullname'] = $hoten;
	   $infokh['email'] = $email;
       $infokh['address'] = $address;
	   $infokh['deliveryaddress'] = $address;
	   $infokh['tel'] = $tel;
	   $infokh['methodpay'] = $pt;
	   $infokh['tongdonhang'] = $dongdonhang;
	   $infokh['tongthanhtoan'] = $tongthanhtoan;
	   $infokh['note'] = $note;
	   $infokh['status'] = 1;
	   $infokh['date'] = date("Y-m-d H:i:s");
	   $mpayment->addCustomer($infokh);
	
	   //them vao gio hang
	   foreach($_SESSION['cart2'] as $k => $v)
	   {
			$infocart[] = array(
				"idcustomer"	=> $idmax,
				"idpro"			=> $k,
				"amount"		=> $v,
			);
	   }
	   $mpayment->addCustomerCart($infocart);
	   unset($_SESSION["cart2"]);
	   redirect(BASE_URL."info-customer.html");
	}
}
?>

<script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery-1.9.1.min.js"></script>
<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'];?></div></div>
<div id="cart_main">
<div class="conten_maing"> 
   <form action="<?=BASE_URL."payment/editcart.html";?>" method="post" class="tbleloack" >
      <table id="table_cart" class="table-style" cellpadding="0" cellspacing="0" width="100%">
         <tr class="bg_tren" style="text-align: left">
             <th><?=TENSANPHAM?></th>
             <th><?=HINHANH?></th>
             <th style="width: 15%"><?=DONGIA?></th>
             <th style="width: 15%"><?=SOLUONG?></th>
             <th style="width: 15%" class="title_td"><?=THANHTIEN?></th>
             <th style="width: 10%"><?=XOA?></th>
         </tr>
         <?php
		    if(!empty($_SESSION["cart2"])){
            $i = 1;
            $mproduct = new Models_MProduct;
            $tongdonhang = 0;
            foreach($_SESSION["cart2"] as $k => $v) 
            {
               $t++; 
               $pro = $mproduct->getOneProduct($k);
               $tong = $tong+$pro['sale_price']*$v;
               $soluong = $soluong + $v;
         ?>
         <tr class="border"> 
             <td><a class="product-link" href="<?=BASE_URL."san-pham/".$pro['alias'].".html";?>"><?=$pro['title_'.lang];?></a></td>
             <td class="product-img"><img src="<?=BASE_URL.PATH_IMG_PRODUCT.$pro['images'];?>" width="50" ></td>
             <td style="color:#FF0000;"><?=bsVndDot($pro['sale_price'])." VNĐ"?></td>
             <td><select name="soluong[<?php echo $k ?>]" class="ddl_quan">
                 <?php for($i=1;$i<=10;$i++){ ?>
                    <option value="<?php echo $i ?>" <?php if($i==$v) echo "selected";?>><?=$i;?></option>
                 <?php } ?>
                 </select>
             </td>
             <td class="border-right" style="color:#FF0000;" class="title_td"><?=bsVndDot($pro['sale_price']*$v);?> VNĐ</td>
             <td><a href="<?=BASE_URL."payment/delcart-".$k.".html";?>" class="delete-cart-item" title="Xóa sản phẩm này?">
                 <img src="public/template/images/icon_delete.png" align="delete" border="0"></a>
             </td>
         </tr>
         <?php } ?>
         <tr class="noborder">
             <td colspan="3"></td>
                <td><label style="font-size:14px;"><?=THANHTIEN?>:</label></td>
                <td colspan="2"><label class="sum-price" id="total-payment-here"><?=bsVndDot($tong) ?> VNĐ</label></td>
             </tr>
         <?php }else{ ?>
            <tr ><td colspan="6" class="empty"><?=CHUACOSANPHAM?></td></tr>
         <?php } ?>
   </table>
   </form>

   <div class="order_box">
   <h2 class="page-title" ><?=THONGTINKHACHHANG?></h2>
       <form action="" method="post" id="form_submit_cart">
       <?php if($error ==1) echo '<div class="error">'.$message.'</div>'; ?>
       <table id="order_table" border="0" cellspacing="0" cellpadding="0">
          <tr>
	         <td class="title_td"><?=HOTEN?></td>
             <td><input type="text" class="form-control" name="hoten" placeholder="<?=NHAPHOTEN?>" value="<?=$hoten; ?>" /></td>
          </tr>
          <tr>
	         <td class="title_td"><?=ADDRESS?></td>
             <td><input type="text" class="form-control" name="address" placeholder="<?=NHAPDIACHI?>" value="<?=$address; ?>"/></td>
          </tr> 
          <tr>
	         <td class="title_td"><?=DIENTHOAI?></td>
             <td><input class="form-control"  type="text" name="tel" placeholder="<?=NHAPSODIENTHOAI?>" value="<?=$tel;?>" /></td>
          </tr>
          <tr>
	         <td class="title_td"><?=PHUONGTHUCTHANHTOAN?></td>
             <td>
             <select name="payment" class="form-control" >
                <option value="0" <?php if($payment==0) echo 'selected';?>><?=PHUONGTHUCTHANHTOAN?></option>
                <option value="1" <?php if($payment==1) echo 'selected';?>><?=GIAOHANGTHUTIEN?></option>
                <option value="2" <?php if($payment==2) echo 'selected';?>><?=MUAVATHANHTOANTAICUAHANG?></option>	
             </select> 
             </td>
          </tr>
          <tr>
	         <td class="title_td">Email</td>
             <td><input type="text" name="email" class="form-control" placeholder="<?=NHAPEMAIL?>" value="<?=$email;?>"/></td>
          </tr>
          <tr>
	         <td class="title_td"><?=NOTE?></td>
             <td><textarea name="note" class="form-control"><?=NOTE;?></textarea></td>
          </tr> 
          <tr>
	         <td class="title_td"></td>
             <td><button type="submit" class="btn btn-primary"><?=DATHANG?></button></td>
          </tr>        
       </table>
   </form>
   </div>
   </div>
<div class="space_10"></div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
	$('.change_order_info').click(function()
	{
		$('.block-update-order').toggle(500)
	});

	$('.ddl_quan').change(function()
	{
		$('.tbleloack').submit();
	});

	$('#btn-submit-cart').click(function()
	{
		$('#form_submit_cart').submit();
	});
})
</script>

