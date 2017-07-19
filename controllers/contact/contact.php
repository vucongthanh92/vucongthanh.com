<?php
   if(isset($_POST['btngui']))
   {
		$to=$title['emaillienhe_vn'];
	 	$ten=$_POST['hoten'];
		$email=$_POST['email'];
		$add=$_POST['diachi'];
		$tell=$_POST['dienthoai'];
		$cont=$_POST['noidung'];
		$codecaptcha = $_POST['codecapcha'];
		if (get_magic_quotes_gpc()== false) 
		{
			$ten=trim(mysql_real_escape_string($ten));
			$email=trim(mysql_real_escape_string($email));
			$add=trim(mysql_real_escape_string($add));
			$tell=trim(mysql_real_escape_string($tell));
			$cont=trim(mysql_real_escape_string($cont));
			$codecaptcha=trim(mysql_real_escape_string($codecaptcha));
		}
		$cont=str_replace("NOIDUNG*: ","",$cont);
		if($ten==""||$email==""||$cont==""||$add=="")
		{
			$error= 1;
			$mesage .= "Nhập thông tin chưa đầy đủ <br />"; 
		}

		if( isValidEmail($email) == false)
		{
			$error = 1;
			$mesage .= "Email không hợp lệ <br />"; 	
		}

		if($error==0)
		{
			$from=$email;
			$tieude="Liên hệ";
			ob_start();
			echo file_get_contents("mail/emaillienhetukhachhang.html");
			$noidung = ob_get_clean();
			$noidung =str_replace("{hoten}", $ten ,$noidung);
			$noidung = str_replace("{diachi}", $add , $noidung);
			$noidung = str_replace("{email}", $email, $noidung);
			$noidung = str_replace("{dienthoai}", $tell , $noidung);
			$noidung =str_replace("{noidung}", $cont , $noidung);
			$noidung1 .="Chào <b>$ten</b>! Cảm ơn bạn đã liên hệ với chúng tôi.<br>";
			$noidung1 .="Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!<br> ";

			smtpmailer($to,$from,$ten,$tieude,$noidung);
			smtpmailer($from,$to,"noithat256.com",$tieude,$noidung1);
			echo '<script>alert("Gửi liên hệ thành công !")</script>';
		}

		$ct["error"] =$error;
		$ct["mesage"] = $mesage;
		$ct["hoten"] = $ten;
		$ct["email"] = $email;
		$ct["add"] = $add;
		$ct["tell"] = $tell;
		$ct["cont"] = $cont;
   }

   $mcontact = new Models_MPagehtml;
   $ct['lienhe'] = $mcontact -> getpagehtmlid('2');
   $ct['googlemap'] = $mcontact -> getpagehtmlid('3');
   $ct['map_title'] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
						   $map_title.'<meta itemprop="position" content="1"/>'.
						   $arrowmap.
					  '</li>'.
					  '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
						   '<a itemprop="item" href="'.BASE_URL.'lien-he.html"><span itemprop="name">'.MN_LIENHE.'</span></a>'.
						   '<meta itemprop="position" content="2"/>'.
					  '</li>';
   $ct["adv"] = $mflash->getOneflashLocation(4);
	
	loadview("contact/contact",$ct);

?>