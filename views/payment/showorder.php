<div class="wap_main">
<div class="in_wap_main">
<div class="space_10"></div>
<?php /* ?>
<div class="process-co">
  <ul class="step">
    <li class="step_done"> <span>Chọn hàng</span></li>
    <li class="step_done"> <span>Nhập thông tin thanh toán</span></li>
    <li class="step_todo"> <span>Xác nhận đơn hàng</span></li>
  </ul>
</div>
<? */ ?>
<form action="" method="post" id="formdathang">
<div class="notify-bar notify-bar-success">
	<div class="notify-bar-icon"><img alt="success" src="<?=USER_PATH_IMG ?>success.png"></div>
	<div class="notify-bar-button"><a title="close" onclick="javascript:$(this).parent().parent().fadeOut();" href="javascript:void(0);"><img border="0" alt="close" src="<?=USER_PATH_IMG ?>close-btn.png"></a></div>
	<div class="notify-bar-text">
									<p>Sản phẩm bạn chọn đã thêm vào giỏ hàng</p>
										</div>
</div>

<div id="summary-checkout">
    <div class="payment-info">
    <?php if($error==1) echo '<div class="error" style="margin-bottom:10px">'.$message.'</div>';?>
      <h3>Thông tin thanh toán</h3>
      <div class="form_content">
        <?php if($_SESSION['login_id']!=1){ ?>
                    <span class="link-log">Bạn đã là thành viên ? <a href="javascript:;" class="btnlogincart">Đăng nhập</a></span>
            <div style="display: none" class="pouplogin">
                <p class="loginresult"></p>
                <input type="text" placeholder="Email" value="" name="fuser" id="fuser">
                <input type="password" placeholder="Mật khẩu" value="" name="fpassword" id="fpassword">
                <input type="button" value="Đăng nhập" name="btncartlogin" id="btncartlogin" class="button">
            </div>
        <?php } ?>
        <label>Họ và tên<span class="note-span">(Bắt buộc)</span> </label>
        <input type="text" placeholder="Họ tên của bạn để in hóa đơn" value="<?=$fullname ?>" name="ffullname" id="ffullname">
        <label>Email<span class="note-span"> (Bắt buộc)</span> :</label>
        <input type="text" placeholder="Email của bạn (để nhận thông tin về đơn hàng)" value="<?=$email ?>" name="femail" id="femail">
        <label>Số điện thoại <span class="note-span">(Bắt buộc)</span> </label>
        <input type="text" placeholder="SĐT của bạn (để dealxinh.com liên lạc)" value="<?=$fphonenumber ?>" name="fphonenumber" id="fphonenumber">
        <label>Tỉnh/Thành và Quận/Huyện <span class="note-span">(Bắt buộc)</span></label>
        <select class="province" id="fcity" name="myregion">
            <?php
			$sql = "select * from mn_provinces where ticlock = '0'";
			$kq = mysql_query($sql) or die(mysql_error());
			while($row= mysql_fetch_assoc($kq)){
			?>
            <option value="<?=$row['Id'] ?>"><?=$row['title_vn'] ?></option>
            <?php } ?>
        </select>
        <select class="province" name="fdistrict" id="fdistrict" onchange="distrist(1,0)">
          <option value="">---Quận/Huyện---</option>
        
        </select>
      
        <label>Địa chỉ <span class="note-span"> (Bắt buộc)</span></label>
        <textarea placeholder="Số nhà, đường, phường, xã" name="faddress" id="faddress" rows="3"> <?=$faddress ?></textarea>
        <label>Ghi chú <span class="note-span"> (Không bắt buộc)</span></label>
        <textarea placeholder="" name="renmark" id="renmark" rows="3"> <?=$renmark ?></textarea>
              <?php if($_SESSION['login_id']!=1){ ?>
                <div class="add-log">
          <label><input type="checkbox" value="1" class="check-log" name="fregister">
          Đăng ký làm thành viên </label></div>
          		<?php } ?>
               </div>
    </div>
    <div class="payment-way">
      <h3>Hình thức thanh toán</h3>
      <ul>
        <li>
          <label>
          <input type="radio" checked="checked" value="Giao hàng thu tiền tận nơi" name="fpaymentmethod" class="radiopm">
          <div class="pm-txt"> <i class="ic-delivery"></i>
            <h5> <a> Thanh toán khi nhận hàng COD</a></h5>
            <span>Bạn sẽ thanh toán tiền cho nhân viên giao hàng, sau khi nhận và kiểm tra hàng hóa</span> </div>
          </label>
        </li>
        <li>
          <label>
          <input type="radio" value="CHuyển khoản ngân hàng" name="fpaymentmethod" class="radiopm">
          <div class="pm-txt"> <i class="ic-bank"></i>
            <h5><a> Chuyển khoản ngân hàng</a></h5>
          
          </div>
          </label>
        </li>
      </ul>
    </div>
    <div class="payment-confirm">
      <h3>Xác nhận đơn hàng</h3>
      <div class="cart-bg">
      <?php 
	  $mproduct = new Models_MProduct;
	  if(!empty($_SESSION['cart2'])){
		  foreach($_SESSION['cart2'] as $k=>$v){
			  $row = $mproduct->getOneProduct($k);
			  $dongdonhang = $dongdonhang + ($row["sale_price"] *$v);
	  ?>
        <div class="r-row">
        <div class="clearcart"><a href="<?=BASE_URL ?>payment/delcart/<?=$row['Id'] ?>-gio-hang.htm" title="Xóa">x</a></div>
          <div class="tt-pro"><a  href="<?=BASE_URL."shop/".$row['alias'] ?>" target="_blank">
          <?=$row['title_vn'] ?></a></div>
          <div class="image-co"><a target="_blank" href="<?=BASE_URL."shop/".$row['alias'] ?>">
          <img width="90"  src="<?=PATH_IMG_PRODUCT.$row['images'] ?>"></a></div>
          <div id="62263" class="txt-info">
            <p class="number">Số lượng:
             <select name="soluong2[<?=$k ?>]" class="inputnumber cartquantity">
               <?php $i=0; for($i==0;$i<=10;$i++) {?>
        	<option value="<?=$i ?>" <?php if($i==$v) echo 'selected'; ?> ><?=$i ?></option>
           <?php } ?>
                             </select>                            ×  <?=bsVndDot($row['sale_price'])." đ"  ?>
                                                

                 </p>

            <p style="margin-top: 5px">Thành tiền: <span class="red"><?=bsVndDot($row['sale_price']*$v); ?>đ</span></p>
          </div>
                              
                </div>     

      
      <?php }} ?>
      <input type="hidden" id="tdongdonhang" value="<?=$dongdonhang ?>" />
      </div>
      <div id="totalfeebox" style="clear: both;" class="r-row"><br>
        <h4 style="float: left;">THÀNH TIỀN:</h4>
        <span style="float: right;" id="totalfee" class="red"><?=bsVndDot($dongdonhang) ?>đ</span>
      </div>
      <div class="lofd-payment">
      <div style="clear: both; display:none" id="shippingfeebox" class="r-row">
        <h4 style="float: left;">PHÍ VẬN CHUYỂN:</h4>
        <span style="float: right;" id="shippingfee" class="red">0đ</span>
      </div>
     
      <div style="margin-right: 10px;" class="Total-co"> Tổng cộng: <span id="totalfinalfees" class="red1"><?=bsVndDot($dongdonhang) ?>đ</span> </div>
      </div>
      
      <p class="note"><span style="display:none" class="notespan"><em>Lưu ý:</em> Giá trị đơn hàng trên chưa bao gồm chi phí giao hàng (nếu có). Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn và thông báo chi phí cụ thể. Rất xin lỗi bạn vì sự bất tiện này.</span></p>
      <input type="submit" value="Đặt mua" class="btn-pay submitform" id="btncheckout" name="btncheckout" >            
      <div class="cont-shopping"><a href="<?=BASE_URL ?>">Thêm sản phẩm khác</a></div>
    </div>

  </div>
 </form>
<div class="space_10"></div>
<!--------------->
</div>
</div>