<div class="wap_main">
<h1 class="yhu">Tìm kiếm đơn hàng</h1>
<div class="wap_product" style=" min-height:600px;">
	<div class="mform-serach">
        <form action="" method="post">
		<input type="text" name="sdt" value="" placeholder="Nhập số điện thoại để kiểm tra tình trạng đơn hàng">
        <button name="btnsubmit" type="submit"><img src="public/template/images/search.png" border="0"></button>
        </form>
        </div>
     <div class="content-search ">
     <?php if($data['error']==1) echo '<div class="error">'.$data['message'].'</div> <div class="space_10"></div>'; ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr style="background:#f2f2f2; color:#000">
                <td>ID</td>      
                <td>Chi tiết đơn hàng</td>                
                <td width="80">Trạng thái</td>    
                <td width="95">Ngày đặt hàng</td> 
                <td width="70">Tổng cộng</td>                   
              </tr>
              <?php
			  $mproduct = new Models_MProduct;
			  if(!empty($data['info'])){
				  foreach($data['info'] as $item){
			  ?>
              <tr>
                <td><?=$item['id'] ?></td>
                <td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <tbody><tr style="background:#10609E; color:#fff">
                            <td>Sản phẩm</td>      
                            <td width="70">Giá tiền</td>  
                            <td width="20">SL</td>  
                                              
                          </tr>
                	   <?php
					   $sql = "select * from mn_customer_cart where idcustomer = '".$item['Id']."'";
					   $kq = mysql_query($sql);
					   while($row = mysql_fetch_assoc($kq)){
						   $pro  =  $mproduct ->getOneProduct($row['idpro']);
					   ?>             	
                       	 <tr>
                             <td><?=$pro['title_vn'] ?></td>                           
                             <td><?=bsVndDot($row['price']) ?> <sup>đ</sup></td>  
                             <td><?=$row['amount'] ?></td>  
                               
                        </tr>
                        <?php } ?>
                     </tbody>
                     </table>
                 </td>        
                <td valign="middle">
                <?php 
					if($item['status']==1) echo "<span style='color:#000'>Chưa xử lý</a>";
					if($item['status']==2) echo "<span style='color:#F00'>Đã xác nhận</a>";
					if($item['status']==3) echo "<span style='color:#07665c'> Đã hoàn thành </a>";
					if($item['status']==4) echo "<span style='color:#F00'>Đơn hàng thất bại</a>";
				?>
				</td>    
                <td><?=date('d/m/Y',strtotime($item['date'])); ?></td> 
                <td><?=bsVndDot($item['tongthanhtoan']) ?> <sup>đ</sup></td>                   
              </tr>
               <?php }} ?>             
            </tbody>
            </table>
       </div>
       <div class="space_10"></div>
       <div class="right">
                <a class="cart-back" href="<?=BASE_URL ?>"><i class="ico-cart-prev"></i>Trở về trang chủ</a>
            </div>
             <div class="space_10"></div>
</div>
</div>