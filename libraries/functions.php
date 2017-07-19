<?php
function smtpmailer($to, $from, $from_name="NOITHAT256.COM", $subject, $body) {
	global $error;
	$mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
	$mail->IsSMTP(); // bật chức năng SMTP
	$mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
	$mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
	$mail->SMTPSecure = "ssl"; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "noithat256.com@gmail.com";
	$mail->Password = "vanquyen";
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		//$error = "Gởi mail bị lỗi: ".$mail->ErrorInfo;
	return false;
	} else {
		//$error = "thư của bạn đã được gởi đi ";
	return true;
	}
}
function isValidEmail($email)

{

return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email		);

}

function get_date_parse($datetime)

{

	$dt = date_parse($datetime);

	$year = $dt['year'];

	$month = $dt['month'];

	$day = $dt['day'];

	return $year."-".$month."-".$day;

}

function check_valid_date($year, $month, $day)

{

	if ($year == 0) return false;

	if ($month == 0) return false;

	return true;

	//$num_day_of_month = self::num_day_of_month($year, $month);

	//return ($day >= 1) && ($day <= $num_day_of_month);

}

function getParam($query){

	parse_str(html_entity_decode($query), $get_array);

	return $get_array;

}

function rand_string($len = 32)

{

	$length = $len;

	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

	$string = "";    



	for ($p = 0; $p < $length; $p++)

	{

		$string .= $characters[mt_rand(0, strlen($characters)-1)];

	}



	return $string;

}

function strtoseo($value){ 

	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",

	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"

	,"ế","ệ","ể","ễ",

	"ì","í","ị","ỉ","ĩ",

	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"

	,"ờ","ớ","ợ","ở","ỡ",

	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",

	"ỳ","ý","ỵ","ỷ","ỹ",

	"đ",

	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"

	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",

	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",

	"Ì","Í","Ị","Ỉ","Ĩ",

	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"

	,"Ờ","Ớ","Ợ","Ở","Ỡ",

	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",

	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",

	"Đ",

	" ","?",":","\"","'",",",".","!","#","@","$","(",")","[","]","{","}","|","+","`","&","/","%","\\","<",">");



	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"

	,"a","a","a","a","a","a",

	"e","e","e","e","e","e","e","e","e","e","e",

	"i","i","i","i","i",

	"o","o","o","o","o","o","o","o","o","o","o","o"

	,"o","o","o","o","o",

	"u","u","u","u","u","u","u","u","u","u","u",

	"y","y","y","y","y",

	"d",

	"A","A","A","A","A","A","A","A","A","A","A","A"

	,"A","A","A","A","A",

	"E","E","E","E","E","E","E","E","E","E","E",

	"I","I","I","I","I",

	"O","O","O","O","O","O","O","O","O","O","O","O"

	,"O","O","O","O","O",

	"U","U","U","U","U","U","U","U","U","U","U",

	"Y","Y","Y","Y","Y",

	"D",

	"-","","","","","","","","","","","","","","","","","","","","","","","-","","");

	$value = str_replace($marTViet,$marKoDau,$value);

	$value = mb_strtolower(trim($value), "UTF-8"); 

	$value = str_replace(' ','-',$value);



	$value = str_replace('?','',$value);

	$value = str_replace('/','-',$value);	$value = str_replace('%','',$value);	

	$charaterA = '#(à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';     

	$replaceCharaterA = 'a';     

	$value = preg_replace($charaterA, $replaceCharaterA, $value);      	      	

	$charaterD = '#(đ)#imsU';      $replaceCharaterD = 'd';      

	$value = preg_replace($charaterD,$replaceCharaterD,$value);            

	$charaterE = '#(è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';      

	$replaceCharaterE = 'e';      

	$value = preg_replace($charaterE,$replaceCharaterE,$value);         

	$charaterI = '#(ì|ỉ|ĩ|í|ị)#imsU';      

	$replaceCharaterI = 'i';      

	$value = preg_replace($charaterI,$replaceCharaterI,$value);            

	$charaterO = '#(ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';      

	$replaceCharaterO = 'o';      

	$value = preg_replace($charaterO,$replaceCharaterO,$value);                  

	$charaterU = '#(ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';      

	$replaceCharaterU = 'u';      

	$value = preg_replace($charaterU,$replaceCharaterU,$value);            

	$charaterY = '#(ỳ|ỷ|ỹ|ý|ỵ)#imsU';      

	$replaceCharaterY = 'y';      

	$value = preg_replace($charaterY,$replaceCharaterY,$value); 

	$value = str_replace(',','',$value); 

	$value = str_replace('---','-',$value);   

	$value = str_replace('--','-',$value);   

	$value = str_replace('-–-','-',$value);    

	$value = str_replace('_','-',$value); 

	$value = str_replace('(','',$value); 

	$value = str_replace(')','',$value); 

	$value = str_replace('{','',$value); 

	$value = str_replace('&','',$value); 

	$value = str_replace('}','',$value); 

	$value = str_replace('.','-',$value); 

	$value = str_replace('--','-',$value);    

	$value = str_replace('ỏ','o',$value); 

	$value = preg_replace('/[^\p{L}\p{N}]/u', '-', $value);

	$value = str_replace("--",'-',$value);	

	return $value;	

}





// ranh thi ngoi code doi tien

function bsVndDot($strNum)

{

    $result = number_format($strNum,0,',','.');

    return $result;

}



function bsVndDot2($strNum)

{

    $result = number_format($strNum,1,',','.');

    return $result;

}



//id max

function idMax($table)

{

	$sql_idMax = mysql_query("select MAX(Id) from $table") or die (mysql_error());

	if($rows_idMax = mysql_fetch_array($sql_idMax))

		return $rows_idMax['MAX(Id)'];

	else

		return false;	

}



//config fckeditor



//cat chuoi 

function limit_text($text,$maxlen){

  $sentenceSymbol=array(".","!","?"," ");  // di?m k?t thúc câu

  $text=strip_tags($text,"<br /><br/><br><b><i>"); // nh?ng tag mu?n gi? l?i

  for ($i=$maxlen; $i>0; $i--)  {

      $ch=substr($text,$i,1);

      if (in_array($ch,$sentenceSymbol)){

         $pos=$i;

         $i=0;

      }

  }

  $temp=substr($text,0,$pos+1);

  return $temp;

}



function getError($data)

{

	if(is_array($data))

	{

		foreach($data as $item)

		{

			$mess_error .= "<li>- ".$item."</li>";

		}

	}

	else

	{

		$mess_error = "<li>- ".$data."</li>";

	}

	

	return $mess_error;

}



// lay gia tri bien post

function varPost($var_name, $value_default = "", $origin = false)

{

	if (isset($_POST[$var_name])){

		$value = $_POST[$var_name];

	}

	else {

		$value = $value_default;

	}

	

	if ($origin == false)

		$value = trim(strip_tags($value));

	//$value  = mysql_real_escape_string($value);	

	return $value;

}



// lay gia tri bien get

function varGet($var_name, $value_default = "", $origin = false)

{

	if (isset($_GET[$var_name])){

		$value = $_GET[$var_name];

	}

	else {

		$value = $value_default;

	}

	

	if ($origin == false)

		$value = trim(strip_tags($value));

	//$value  = mysql_real_escape_string($value);	

	return $value;

}



function varGetPost($var_name, $value_default = "", $origin = false)

{

	if (isset($_POST[$var_name])){

		$value = $_POST[$var_name];

	}

	elseif (isset($_GET[$var_name])){

		$value = $_GET[$var_name];

	}

	else

		$value = $value_default;

	

	if ($origin == false)

		$value = trim(strip_tags($value));

	//$value  = mysql_real_escape_string($value);	

	return $value;

}

// lay id nhom cha catelog

function pParentID($id){

	$mcatelog = new Models_MCatelog();

	$sub = $mcatelog->getOneCatelog($id);

	if($sub['parentid']==0){

		$tb =  $id;

	} else{

		$tb = pParentID($sub['parentid']);

	}

	return $tb;

}

//lay danh sach cac option cua danh sach chu de tin da cap

function TreeCat($data,$pid,$tcat,$id,$text,$colum = "title_vn")

{

	if(!empty($data))

	{

		foreach($data as $item)

		{

			if($pid == $item['parentid']){

				if($id == $item['Id']){

					$str = '<option value = "'.$item['Id'].'" selected>'.$text.$item[$colum].'</option>';

				}else{

					$str = '<option value = "'.$item['Id'].'">'.$text.$item[$colum].'</option>';

				}

				$tcat .= TreeCat($data,$item['Id'],$str,$id,$text." --- ");

			}

		}

	}

	return $tcat;

}



function getSubCatlogId($id)

{

	$allid="";

	$mcatlog = new Models_MCatelog();

	$rows = NULL;

	$rows = $mcatlog->listdata("*","ticlock='0' AND parentid = '".$id."'","Id desc");

	if(!empty($rows)){

		foreach($rows as $item)

		{

			$allid .= $item['Id'].",";

			$allid .= getSubCatlogId($item['Id']);

		}

	}

	

	return $allid;

}





?>